<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4 text-center">
                            <img src="https://picsum.photos/400/300?image=0" alt="Apple iPhone 7 128GB"
                                 class="img-fluid">
                        </div>
                        <h4 class="card-title"><span>{{ product.name }}</span></h4>
                        <variant :variants="product.variants"
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