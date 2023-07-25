<template>
  <section class="popular-items-sliders container" v-if="hasInitialized">
    <div class="popular-products last-items-slider">
      <div class="popular-products__top">
        <h3 class="popular-products__title">last items</h3>
      </div>
      <div class="slider__container swiper-container-initialized swiper-container-horizontal">
        <div class="slider__wrapper">
          <VueSlickCarousel :arrows="true" :dots="true">
            <div v-for="(item, index) in data" :key="item.id" :class="`slider__slide ${index==0 ? 'swiper-slide-active' : index==0 ? 'swiper-slide-next' : ''}`" style="width: 583px;">
              <div class="product-wrapper">
                <div class="popular-products__left">
                  <router-link class="hero-product" :to="`/product-detail-type${item.parent.template}/${item.parent.slug}`">
                    <div class="image-container">
                      <img :src="`${PRODUCT_IMG_URL}/${item.parent.image}`">
                    </div>
                    <div class="texts">
                      <div class="product__title">{{ item.parent.name }}</div>
                      <div class="formatted__price">$ {{ item.parent.price }}</div>
                    </div>
                  </router-link>
                </div>
                <div class="popular-products__right">
                  <router-link v-for="(childItem, index) in item.children" :key="childItem.id" class="popular-product" :to="`/product-detail-type${childItem.template}/${childItem.slug}`">
                    <img :src="`${PRODUCT_IMG_URL}/${childItem.image}`">
                    <div class="texts">
                      <div class="product__title">{{ childItem.name }}</div>
                      <div class="formatted__price">$ {{ childItem.price }}</div>
                    </div>
                  </router-link>
                </div>
              </div>
            </div>
          </VueSlickCarousel>
        </div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
      </div>
    </div>
    <div class="popular-products best-sellers-slider">
      <div class="popular-products__top">
        <h3 class="popular-products__title">Best sellers</h3>
      </div>
      <div class="slider__container swiper-container-initialized swiper-container-horizontal">
        <div class="slider__wrapper">
          <VueSlickCarousel :arrows="true" :dots="true">
            <div v-for="(item, index) in data" :key="item.id" :class="`slider__slide ${index==0 ? 'swiper-slide-active' : index==0 ? 'swiper-slide-next' : ''}`" style="width: 583px;">
              <div class="product-wrapper">
                <div class="popular-products__left">
                  <router-link class="hero-product" :to="`/product-detail-type${item.parent.template}/${item.parent.slug}`">
                    <div class="image-container">
                      <img :src="`${PRODUCT_IMG_URL}/${item.parent.image}`">
                    </div>
                    <div class="texts">
                      <div class="product__title">{{ item.parent.name }}</div>
                      <div class="formatted__price">$ {{ item.parent.price }}</div>
                    </div>
                  </router-link>
                </div>
                <div class="popular-products__right">
                  <router-link v-for="(childItem, index) in item.children" :key="childItem.id" class="popular-product" :to="`/product-detail-type${childItem.template}/${childItem.slug}`">
                    <img :src="`${PRODUCT_IMG_URL}/${childItem.image}`">
                    <div class="texts">
                      <div class="product__title">{{ childItem.name }}</div>
                      <div class="formatted__price">$ {{ childItem.price }}</div>
                    </div>
                  </router-link>
                </div>
              </div>
            </div>
          </VueSlickCarousel>
        </div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios'
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
import { BASE_URL, BEST_SELLER_PRODUCTS_CATEGORY_ID, PRODUCT_IMG_URL } from '../../../constant'

export default {
  name: "LastTimeAndBestSellers",
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
        .get(`${BASE_URL}/list-products/${BEST_SELLER_PRODUCTS_CATEGORY_ID}/best-seller`)
        .then(response => (this.data = response.data.data))
      this.hasInitialized = true;
    }
  }
}
</script>
