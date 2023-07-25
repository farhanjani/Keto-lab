<template>
    <section class="collection-slider container">
        <h2 class="section__title">top rated products</h2>
        <div class="horizontal-slider__inner">
            <div class="horizontal-slider swiper-container-initialized swiper-container-horizontal">
                <div class="horizontal-slider-wrapper" v-if="hasInitialized">
                    <VueSlickCarousel v-bind="settings">
                        <div v-for="item in data" :key="item.id">
                            <div class="product--main swiper-slide-active">
                                <div class="product">
                                    <router-link class="product__image" :to="`/product-detail-type${item.template}/${item.slug}`">
                                        <img :src="`${PRODUCT_IMG_URL}/${item.image}`">
                                    </router-link>
                                    <div class="product__texts">
                                        <div class="product__title">{{ item.name  }}</div>
                                        <div class="product__price"> ${{ item.price }} </div>
                                    </div>
                                    <div class="product__text-highlighted">
                                        <div class="product__price"> ${{ item.price }} </div>
                                    </div>
                                    <router-link class="product__link" :to="`/product-detail-type${item.template}/${item.slug}`">
                                        <div class="icon-cart"></div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </VueSlickCarousel>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </section>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
import axios from 'axios'
import { BASE_URL, TOP_RATED_CATEGORY_ID, PRODUCT_IMG_URL } from '../../../constant'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

export default {
  name: "TopRated",
  components: { VueSlickCarousel },
  data () {
    return {
      data: [],
      hasInitialized: false,
      PRODUCT_IMG_URL,
      BASE_URL,
        settings: {
            dots:true,
            slidesToShow: 4,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        }
    }
  },
  mounted () {
    this.init();
  },
  methods: {
    async init () {
        await axios
        .get(`${BASE_URL}/list-products/${TOP_RATED_CATEGORY_ID}`)
        .then(response => (this.data = response.data.data))
         this.hasInitialized = true;
    }
  }
}
</script>
