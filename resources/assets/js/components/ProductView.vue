<template>
    <div>
        <login></login>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <wishlist :propIsWishlisted="product.is_wish_listed"
                                  :productId="product.id"
                        ></wishlist>
                        <div class="mb-4 text-center">
                            <img src="https://picsum.photos/400/300?image=0" alt="Apple iPhone 7 128GB"
                                 class="img-fluid">
                        </div>
                        <h4 class="card-title"><span>{{ product.name }}</span></h4>
                        <variant :product-id="product.id"
                                 :prop-items-in-cart="product.items_in_cart.data"
                                 :variants="product.variants"
                                 :order-count="product.statistics.order_count"
                                 :shares="product.statistics.shares">
                        </variant>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <product v-for="product in topProducts.data" :key="product.id" :product="product"></product>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Variant from './Variant.vue';
    Vue.component('variant', Variant);

    import Product from './Product.vue';
    Vue.component('product', Product);

    import Wishlist from './WishList.vue';
    Vue.component('wishlist', Wishlist);

    import Login from './Login.vue';
    Vue.component('login', Login);

    export default {
        props: ['product', 'topProducts'],
        data: function () {
            return {}
        },
        mounted() {

        },
        computed: {},
    }
</script>