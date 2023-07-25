<template>
  <section class="top-rated container">
    <div class="top-rated__top-section">
      <div class="section__title">Recommended Products</div>
    </div>
    <div class="top-rated__products" v-if="hasInitialized">
      <div class="product--main" v-for="item in data" :key="item.id">
        <div class="product">
          <router-link class="product__image" :to="`/product-detail-type${item.template}/${item.slug}`">
            <img :src="`${PRODUCT_IMG_URL}/${item.image}`">
          </router-link>
          <div class="product__texts">
            <div class="product__title">{{ item.name }}</div>
            <div class="product__price"> $ {{ item.price }} </div>
          </div>
          <router-link class="button" :to="`/product-detail-type${item.template}/${item.slug}`">
            Buy Now
          </router-link>

          <div class="product__text-highlighted">
            <div class="product__price"> $ {{ item.price }} </div>
            <router-link class="button" :to="`/product-detail-type${item.template}/${item.slug}`">
              Buy Now
            </router-link>
          </div>
          <router-link class="product__link" :to="`/product-detail-type${item.template}/${item.slug}`">
            <div class="icon-cart"></div>
          </router-link>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios'
import { BASE_URL, RECOMMENDED_PRODUCTS_CATEGORY_ID, PRODUCT_IMG_URL } from '../../../constant'

export default {
  name: "RecommendedProducts",
  data() {
    return {
      data: [],
      hasInitialized: false,
      PRODUCT_IMG_URL
    }
  },
  mounted() {
    this.init();
  },
  methods: {
    async init() {
      await axios
        .get(`${BASE_URL}/list-products/${RECOMMENDED_PRODUCTS_CATEGORY_ID}`)
        .then(response => (this.data = response.data.data))
      this.hasInitialized = true;
    }
  }
}
</script>