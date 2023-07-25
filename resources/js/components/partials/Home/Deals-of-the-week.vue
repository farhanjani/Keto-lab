<template>
  <div class="container" v-if="hasInitialized">
    <section class="weekly-deals ">
      <h2 class="weekly-deals__title">Deal of the week</h2>
      <div class="weekly-deals__products">
        <div class="weekly-deals__product">
          <div class="left"><img :src="`${PRODUCT_IMG_URL}/${data[0].image}`"></div>
          <div class="right">
            <div class="product__title">{{ data[0].name }}</div>
            <div class="texts">
              <div class="weekly-deals__price">$ {{ data[0].price }}</div>
              <router-link class="button button--blue" :to="`/product-detail-type${template}/${data[0].slug}`">Buy Now</router-link>
            </div>
          </div>
        </div>
        <div class="weekly-deals__product">
          <div class="left"><img :src="`${PRODUCT_IMG_URL}/${data[1].image}`"></div>
          <div class="right">
            <div class="product__title">{{ data[1].name }}</div>
            <div class="texts">
              <div class="weekly-deals__price">$ {{ data[1].price }}</div> 
                <router-link class="button button--blue" :to="`/product-detail-type${template}/${data[1].slug}`">Buy Now</router-link>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="weekly-deals2">
      <div class="weekly-deals2__products">
        <div class="weekly-deals2__product">
          <div class="left"><img :src="`${PRODUCT_IMG_URL}/${data[2].image}`"></div>
          <div class="right">
            <div class="weekly-deals2__product__title">{{ data[2].name }}</div>
            <div class="texts">
              <div class="weekly-deals2__price">$ {{ data[2].price }}</div> 
                <router-link class="button" :to="`/product-detail-type${template}/${data[2].slug}`">Buy Now</router-link>
            </div>
          </div>
        </div>
        <div class="weekly-deals2__product">
          <div class="left"><img class="img-width" :src="`${PRODUCT_IMG_URL}/${data[3].image}`"></div>
          <div class="right">
            <div class="weekly-deals2__product__title">{{ data[3].name }}</div>
            <div class="texts btn-align">
              <div class="weekly-deals2__price">$ {{ data[3].price }}</div> 
              <router-link class="button" :to="`/product-detail-type${template}/${data[3].slug}`">Buy Now</router-link>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import axios from 'axios'
import { BASE_URL, DEAL_PRODUCTS_CATEGORY_ID, PRODUCT_IMG_URL } from '../../../constant'

export default {
  name: "DealsOfTheWeek",
  data() {
    return {
      data: [],
      hasInitialized: false,
      PRODUCT_IMG_URL,
      template: ''
    }
  },
  mounted() {
    this.init();
  },
  methods: {
    async init() {
      await axios
        .get(`${BASE_URL}/list-products/${DEAL_PRODUCTS_CATEGORY_ID}`)
        .then(response => (this.data = response.data.data))
        this.template = this.data[0].template
      this.hasInitialized = true;
    }
  }
}
</script>
