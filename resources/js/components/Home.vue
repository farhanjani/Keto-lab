<template>
    <div class="comp-home">
        <div class="app show-bg">
            <!-- Navbar -->
            <Navbar />
            <div class="content">
                <!-- slider -->
                <Slider />
                <!-- Deal -->
                <DealsOfTheWeek />
                <!-- New arrivals -->
                <NewArrivals />
                <!-- top rated -->
                <TopRated />
                <!-- last items and best sellers -->
                <LastTimeAndBestSellers />
                <!-- Recommended Products -->
                <RecommendedProducts />
            </div>
            <!-- footer -->
            <Footer />
            <button type="button" class="scroll-top"></button>
            <div class="__cov-progress" style="background-color: rgb(255, 97, 120); opacity: 0; position: fixed; top: 0px; left: 0px; width: 0%; height: 4px; transition: opacity 0.6s ease 0s;"></div>
        </div>
    </div>
</template>

<script>
import Navbar from '../components/partials/Home/Navbar.vue'
import Slider from '../components/partials/Home/Slider.vue'
import DealsOfTheWeek from '../components/partials/Home/Deals-of-the-week.vue'
import NewArrivals from '../components/partials/Home/New-arrivals.vue'
import TopRated from '../components/partials/Home/Top-rated.vue'
import LastTimeAndBestSellers from '../components/partials/Home/Last-time-and-best-sellers.vue'
import RecommendedProducts from '../components/partials/Home/Recommended-products.vue'
import Footer from '../components/partials/Home/Footer.vue'


export default {
    name: "Home",
    components: { 
        Navbar,
        Slider,
        DealsOfTheWeek,
        NewArrivals,
        TopRated,
        LastTimeAndBestSellers,
        RecommendedProducts,
        Footer
    }
}
</script>


<style scoped>
@import '../../css/style.css';
</style>
