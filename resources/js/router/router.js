export default [{
        path: '/',
        component: require('../components/Home.vue').default
    },
    {
        path: '/product-detail-type1/:slug',
        component: require('../components/Product-detail-and-checkout-type-1.vue').default
    },
    {
        path: '/product-detail-type2/:slug',
        component: require('../components/Product-detail-and-checkout-type-2.vue').default
    },
    {
        path: '/product-detail-type3/:slug',
        component: require('../components/Product-detail-and-checkout-type-3.vue').default
    },
    {
        path: '/product-detail-type4/:slug',
        component: require('../components/Product-detail-and-checkout-type-4.vue').default
    },
    {
        path: '/upsell/:slug',
        component: require('../components/upsell.vue').default
    },
    {
        path: '/thank-you/',
        component: require('../components/thank-you.vue').default
    }
];