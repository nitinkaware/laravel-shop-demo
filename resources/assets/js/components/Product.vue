<template>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><a
                        :href="productLink">{{ product.name }}</a></h4>
                <div class="mt-5 d-flex align-items-center">
                    <div class="product-price">
                        <strong>&#8377; {{ price }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Product from './Product.vue';
    Vue.component('product', Product);

    export default {
        props: ['product'],
        computed: {
            price: function () {
                let variants = collect(this.product.variants);

                if (variants.isEmpty()) {
                    return 0;
                }

                let min = variants.min('price');
                let max = variants.max('price');

                return (min === max) ? min : `${min} - ${max}`;
            },
            productLink: function () {
                return route('products.index', [this.product.category.slug, this.product.id]);
            }
        },
    }
</script>