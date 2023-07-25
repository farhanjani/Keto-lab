<template>
    <div class="container">
        <nav id="navbar">
            <div class="navigation">
                <div class="logo">
                    <img src="../../images/arrow-up.svg" alt="Logo" width="100px">
                </div>
                <div class="logo-text">
                    <h3>ONLYBESTGADGETS</h3>
                </div>
            </div>
        </nav>
        <div class="showcase-area" v-if="hasInitialized">
            <div class="thank-you-note">
                <h1>Thank You For Your Order!</h1>
            </div>
            <div class="Order-id">
                <h2>Your order id is: {{ orderId }}</h2>
            </div>
            <div class="thank-you-table">
                <table>
                    <thead>
                        <tr>
                            <th>SR#</th>
                            <th>Produce Name</th>
                            <th>Produce Quantity</th>
                            <th>Produce Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product, index) in bought_products" :key="index">
                            <td>{{ index+1 }}</td>
                            <td>{{ product.name }}</td>
                            <td>{{ product.quantity }}</td>
                            <td>${{ product.price }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer-area">
            <footer>Copyright © {{ new Date().getFullYear() }} onlybestgadgets. All Rights Reserved</footer>
        </div>


    </div>
</template>


<script>
import axios from 'axios'
import { BASE_URL} from '../constant'

export default {
  name: "thank-you",
  data() {
    return {
      bought_products: {},
      hasInitialized: false,
      orderId: ''
    }
  },
  mounted() {
    this.init()
    this.offerEndInterval()
  },
  methods: {
    async init() {
      await axios
        .get(`/list-bought-products`)
        .then((response) => {
           this.orderId = response.data.orderId
           this.bought_products = response.data.data
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
    async no_Thanks(){

        await axios
        .post(`/no-thanks`)
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
    footer {
        text-align: center;
        position: absolute;
        bottom: 0;
        right: 0;
        background-color: #f4f4f4;
        width: 100%;
        padding: 2rem;
    }
    .container {
        display: flex;
        flex-direction: column;
    }
    .showcase-area{
        text-align: center;
        position: relative;
        padding-top: 200px;
    }
    .showcase-area .thank-you-note{
        margin: 1rem 0;
    }
    table th, td {
        border: 1px solid;
        padding: 10px;
    }
    table{
        margin: auto;
    }
    .navigation{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    #navbar {

        background-color: #FFFFFF;
        color: #000;
        position: fixed;
        top: 0;
        left: 0;
        box-shadow: -14px -3px 13px #000;
        width: 100%;
    }
    #navbar .logo, #navbar .logo-text {
        padding: 1rem;
        margin: 0 3rem;
    }
</style>
