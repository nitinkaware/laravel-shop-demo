<template>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><a href="javascript:void(0)">{{ product.name }}</a></h4>
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

                if (variants.isNotEmpty()) {
                    let min = variants.min('price');
                    let max = variants.max('price');
                    return (min === max) ? min : `${min} - ${max}`;
                }

                return 0;
            }
        },
    }
</script>