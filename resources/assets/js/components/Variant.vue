<template>
    <div>
        <div class="form-group">
            <label class="form-label">Select Color:</label>
            <div class="selectgroup selectgroup-pills" v-for="variant in variants" :key="variant.id">
                <label class="selectgroup-item">
                    <input type="radio" name="color" class="selectgroup-input"
                           :value="variant.id" v-model="selectedColorId">
                    <span class="selectgroup-button">{{ variant.color }}</span>
                </label>
            </div>
        </div>
        <label class="form-label">Select Size:</label>
        <div class="selectgroup selectgroup-pills" v-if="hasSize">
            <div class="form-group" v-for="variant in variants" :key="variant.id">
                <label class="selectgroup-item">
                    <input type="radio" name="size" :value="variant.size" v-model="selectedSize"
                           class="selectgroup-input">
                    <span class="selectgroup-button selectgroup-button-icon"> {{ variant.size }} </span>
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
                selectedColorId: null,
                selectedSize: null
            }
        },
        mounted() {
            this.selectedColorId = this.variants[0].id;
            this.selectedSize = this.variants[0].size;
        },
        methods: {
            addToCart() {
                this.$root.$emit('addedToCart', {});
            }
        },
        computed: {
            hasSize: function () {
                return !!this.variants[0].size;
            },
            price: function () {
                let variant = collect(this.variants).firstWhere('id', this.selectedColorId);
                return (!!variant) ? variant.price : 0;
            }
        }
    }
</script>
