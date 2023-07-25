<template>
  <section class="new-arrivals container" v-if="hasInitialized">
    <h2 class="section__title">New arrivals</h2>
    <div class="new-arrivals__products">
      <div class="container">
        <div class="row">
          <!-- <div class="col-lg-6 col-md-12">
            <router-link :to="`/product-detail-type${template}/${data[0].slug}`">
              <div class="products-card " style="width: 18rem;">
                <img class="img-fluid pred-img" :src="`${PRODUCT_IMG_URL}/${data[0].image}`">
                <div class="mobile-texts">
                  <div class="right">
                    <div class="new-arrivals__product__title">{{ data[0].name }}</div>
                    <div class="texts">
                      <div class="new-arrivals__price">$ {{ Math.trunc(data[0].price) }}</div>
                        <router-link class="button" :to="`/product-detail-type${template}/${data[0].slug}`">Buy Now</router-link>
                    </div>
                  </div>
                </div>
              </div>
            </router-link>
          </div> -->

          <div class="col-lg-6 col-md-12" v-for="product in data" :key="product.id">
            <router-link :to="`/product-detail-type${template}/${product.slug}`">
              <div class="products-card products-card-2">
                <div class="">
                  <div class="right">
                    <div class="new-arrivals__product__title">{{ product.name }}</div>
                    <div class="texts">
                      <div class="new-arrivals__price">$ {{ Math.trunc(product.price) }}</div>
                      <router-link class="button" :to="`/product-detail-type${template}/${product.slug}`">Buy Now</router-link>
                    </div>
                  </div>
                </div>
                <img class="img-fluid" :src="`${PRODUCT_IMG_URL}/thumb_${product.image}`">
              </div>
            </router-link>
          </div>

          <!-- <div class="col-lg-6 col-md-12">
            <router-link :to="`/product-detail-type${template}/${data[2].slug}`">
              <div class="test products-card products-card-2 bg-black">
                <div class="">
                  <div class="right">
                    <div class="new-arrivals__product__title">{{ data[2].name }}</div>
                    <div class="texts">
                      <div class="new-arrivals__price">$ {{ Math.trunc(data[2].price) }}</div>
                        <router-link class="button ffff" :to="`/product-detail-type${template}/${data[2].slug}`">Buy Now</router-link>
                    </div>
                  </div>
                </div>
                <img class="img-fluid" :src="`${PRODUCT_IMG_URL}/${data[2].image}`">
              </div>
            </router-link>
          </div>
          <div class="col-lg-6 col-md-12">
            <router-link :to="`/product-detail-type${template}/${data[3].slug}`">
              <div class="products-card " style="width: 18rem;">
                <img class="img-fluid" :src="`${PRODUCT_IMG_URL}/${data[3].image}`">
                <div class="">
                  <div class="right">
                    <div class="new-arrivals__product__title">{{ data[3].name }}</div>
                    <div class="texts">
                      <div class="new-arrivals__price">$ {{ Math.trunc(data[3].price) }}</div>
                      <router-link class="button" :to="`/product-detail-type${template}/${data[3].slug}`">Buy Now</router-link>
                    </div>
                  </div>
                </div>
              </div>
            </router-link>
          </div> -->
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios'
import { BASE_URL, NEW_ARRIVAL_PRODUCTS_CATEGORY_ID, PRODUCT_IMG_URL } from '../../../constant'

export default {
  name: "NewArrivals",
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
        .get(`${BASE_URL}/list-products/${NEW_ARRIVAL_PRODUCTS_CATEGORY_ID}`)
        .then(response => (this.data = response.data.data))
        this.template = this.data[0].template
      this.hasInitialized = true;
    }
  }
}
</script>
