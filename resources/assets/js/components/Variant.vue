<template>
    <div>
        <div class="form-group">
            <label class="form-label">Select Color:</label>
            <div class="selectgroup selectgroup-pills" v-for="variant in variants" :key="variant.id">
                <label class="selectgroup-item">
                    <input type="radio" name="color" class="selectgroup-input"
                           :value="variant.id" v-model="selectedColor">
                    <span class="selectgroup-button">{{ variant.color }}</span>
                </label>
            </div>
        </div>
        <label v-if="hasSize" class="form-label">Select Size:</label>
        <div class="selectgroup selectgroup-pills" v-if="hasSize">
            <div class="form-group" v-for="(size, index) in sizes" :key="index">
                <label class="selectgroup-item">
                    <input type="radio" name="size" :value="size" v-model="selectedSize"
                           class="selectgroup-input">
                    <span class="selectgroup-button selectgroup-button-icon"> {{ size }} </span>
                </label>
            </div>
        </div>
        <div class="product-price">
            <div class="pull-left">
                <strong v-if="!! price">&#8377; {{ price }} </strong>
                <span v-if="!! orderCount"> Sold: {{ orderCount }}</span>
                <span v-if="!! shares">| Shares: {{ shares }}</span>
            </div>
            <div class="pull-right">
                <a v-if="!! price" href="javascript:void(0)" class="btn btn-primary"><i class="fe fe-plus"></i>
                    Add to cart</a>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['variants', 'orderCount', 'shares'],
        data: function () {
            return {
                selectedColor: null,
                selectedSize: null
            }
        },
        mounted() {
            this.selectedColor = this.variants[0].id;
            this.selectedSize = this.sizes.length ? this.sizes[0] : null;
        },
        methods: {
            addToCart() {
                this.$root.$emit('addedToCart', {});
            }
        },
        computed: {
            sizes: function () {
                return collect(this.variants).unique('size').pluck('size').filter().sort().all();
            },
            hasSize: function () {
                return this.sizes.length;
            },
            price: function () {
                let variant = collect(this.variants).firstWhere('id', this.selectedColor);
                return (!!variant) ? variant.price : 0;
            }
        }
    }
</script>
