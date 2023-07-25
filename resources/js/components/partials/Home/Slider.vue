<template>
  <section class="slider slider__main container">
    <div class="slider__container swiper-container-initialized swiper-container-horizontal">
      <div class="slider__wrapper main_slider" v-if="hasInitialized">
        <VueSlickCarousel :arrows="true" :dots="true">
          <div :class="`slider__slide swiper-slide${index == 0 ? 'prev' : 'active'}`" v-for="(item, index) in data" :key="item.id">
            <div class="slider__info">
              <div class="slider__info__column--left">
                <div class="slider__title">{{ item.name  }}</div>
                <div class="slider__text">{{ item.description }}</div>
                <div class="slider__pricing-block">
                  <div class="slider__price">$ {{ item.price }}</div>
                  <router-link class="button button--black slider__link" :to="`/product-detail-type${item.template}/${item.slug}`">Buy Now</router-link>
                </div>
              </div>
              <div :class="`slider__info__column--right item-${index == 0 ? '1' : '2'}`">
                <img :src="`${PRODUCT_IMG_URL}/${item.image}`" class="slider__img">
              </div>
            </div>
          </div>
        </VueSlickCarousel>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios'
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
import { BASE_URL, SLIDER_PRODUCTS_CATEGORY_ID, PRODUCT_IMG_URL } from '../../../constant'

export default {
  name: "Slider",
  components: { VueSlickCarousel },
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
        .get(`${BASE_URL}/list-products/${SLIDER_PRODUCTS_CATEGORY_ID}`)
        .then(response => (this.data = response.data.data))
      this.hasInitialized = true;
    }
  }
}
</script>
