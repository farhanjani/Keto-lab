<template>
    <div v-if="hasInitialized">
        <nav>
            <p class="order-incomplete-text">Wait... Your Order Is Not Complete!</p>
        </nav>   
        <div class="timer">
            <div class="logo" v-if="upsell.image">
                <img :src="`${PRODUCT_IMG_URL}/${product_logo}`" width="100px">
            </div>
            <div class="timer-text"><span>Limited time offer</span> - ends soon!</div>
        </div>
        <form id="upsell-form" @submit.prevent="onSubmit">
            <div class="show-case-area">
                <div class="showcase-container">
                    <div class="showcase-left">
                        <div class="showcase-up">
                            <img :src="`${UPSELL_IMG_URL}/${upsell.image }`" :alt="`${upsell.title}`" width="400px">
                        </div>
                        <div class="showcase-down">
                            <span>ONLY 17 LEFT IN STOCK:</span> Don't wait to claim your offer!
                        </div>
                    </div>
                    <div class="showcase-right">
                        <div class="upsell-title">
                            <h2>Get {{upsell.title}}</h2>
                        </div>
                        <div class="upsell-price" v-if="(upsell.price != null) && (upsell.discounted_price != null)">
                            <s><em>${{upsell.price}}/pair </em></s> &nbsp;&nbsp; ${{upsell.discounted_price}}/pair
                        </div>
                        <div class="upsell-price" v-else>
                            &nbsp;&nbsp; ${{upsell.price}}/pair
                        </div>
                        <ul class="upsell-features" v-if="features">
                            <li class="feature" v-for="(feature, index) in features" :key="index">{{ feature.toUpperCase() }}</li>
                        </ul>
                        <button type="submit">
                            <h3>{{ upsell.btn_title }}</h3>
                            <small>TAKE ADVANTAGE OF THIS SPECIAL OFFER</small>
                        </button>
                        <div class="no-thanks-text" @click="no_Thanks">
                            <u>No thanks, I will pass on this DISCOUNTED one time offer for now realizing I will NEVER have this opportunity again.</u>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="footer-container">
            <footer>
                <div class="footer-logo">
                    <img src="../../images/brand-1.png" alt="">
                </div>
                <div class="footer-text">
                    Copyright © {{ new Date().getFullYear() }} onlybestgadgets. All Rights Reserved
                </div>
            </footer>
        </div>
    </div>
</template>


<script>
import axios from 'axios'
import { BASE_URL, UPSELL_IMG_URL, PRODUCT_IMG_URL } from '../constant'

export default {
  name: "upsell",
  data() {
    return {
      upsell: {},
      hasInitialized: false,
      UPSELL_IMG_URL: UPSELL_IMG_URL,
      PRODUCT_IMG_URL: PRODUCT_IMG_URL,
      features: {},
      product_logo:''
    }
  },
  mounted() {
    this.init()
    this.offerEndInterval()
  },
  methods: {
    async init() {
        await axios
        .get(`${BASE_URL}/list-upsells/${this.$route.params.slug}`)
        .then(async (response) => {
            this.upsell = response.data.data
            if(response.data.data.features){
                this.features = response.data.data.features.split("|")
            }
            document.title = response.data.data.title

            const secondResponse = await axios.get(`${BASE_URL}/list-main-product/${this.upsell.id}`)
            this.product_logo = secondResponse.data.data
        })
        this.hasInitialized = true;
    },

    offerEndInterval() {
      const countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();
      setInterval(() => {
        const now = new Date().getTime();

        // Find the distance between now and the count down date
        const distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        this.offerEndTime = minutes + ":" + seconds + "";

        // If the count down is over, write some text
        if (distance < 0) {
          clearInterval(x);
          this.offerEndTime = "EXPIRED";
        }
      }, 1000);
    },
    async onSubmit() {
      let formData = new FormData();
      formData.append('upsell_crm_id', this.upsell.upsell_crm_id)

      await axios
        .post(`${BASE_URL}/upsell-checkout`, formData)
        .then((response) => {
            if(response.data.status == 200){
                window.location.replace(response.data.redirect_url)
            }
            if(response.data.status == 400){
                this.$swal(response.data.error)
            }
        })
    },
    async no_Thanks(){

        await axios
        .post(`${BASE_URL}/no-thanks`)
        .then((response) => {
            if(response.data.status == 200){
                window.location.replace(response.data.redirect_url)
            }
        })
    }
  }
}
</script>


<style scoped>
    .order-incomplete-text {
        background-color: #E80000;
        color: #fff;
        text-align: center;
        padding: 2rem 0;
        font-size: 2rem;
        font-weight: bold;
    }

    .timer {
        background-color: #FFFFFF;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 2rem 6rem;
        color: #000;
    }

    .timer .timer-text span{
        font-weight: bold;
    }

    .show-case-area {
        background-color: #EFF4FF;
    }

    .show-case-area .showcase-container {
        width: 1100px;
        margin: 0 auto;
        display: flex;
        justify-content: space-evenly;
    }

    .show-case-area .showcase-container .showcase-left {
        flex-basis: 50%;
        margin-top: 2rem;
        margin-bottom: 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .show-case-area .showcase-container .showcase-right {
        flex-basis: 50%;
        margin-top: 2rem;
        margin-bottom: 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;

    }

    .show-case-area .showcase-down {
        border: 1px solid red;
        padding: 10px;
        margin-top: 2rem;
    }
    .show-case-area .showcase-down span {
        font-weight: bold;
    }

    .show-case-area .showcase-container .showcase-right .upsell-price, .show-case-area .showcase-container .showcase-right .upsell-features {
        font-size: 1.5rem;
        text-align: left;
        width: 100%;
    }

    .show-case-area .showcase-container .showcase-right .upsell-features {
        margin-top: 1.5rem;
    }

    .show-case-area .showcase-container .showcase-right button {
        background-color: #3CBC08;
        border: none;
        padding: 1rem;
        color: #fff;
    }

    .show-case-area .showcase-container .showcase-right .no-thanks-text {
        margin-top: 1.5rem;
        cursor: pointer;
    }

    .footer-container {
        background-color: #142834;
        height: 400px;
        margin-top: 10rem;
    }
    .footer-container footer {
        display: flex;
        justify-content: space-between;
        width: 1100px;
        margin: 0 auto;
        color: #fff;
        align-items: center;
        height: 100%;
    }
    .footer-container footer .footer-text {
        text-align: right;
    }
</style>