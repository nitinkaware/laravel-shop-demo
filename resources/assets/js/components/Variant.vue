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
        <label v-if="hasSize" class="form-label">Select Size:</label>
        <div class="selectgroup selectgroup-pills" v-if="hasSize">
            <div class="form-group" v-for="(item, index) in sizes" :key="index">
                <label class="selectgroup-item">
                    <input type="radio" :value="item.id" v-model="selectedSizeId"
                           class="selectgroup-input">
                    <span class="selectgroup-button selectgroup-button-icon"> {{ item.size }} </span>
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
                <a v-if="!! price"
                   :href="itemAlreadyInCart ? cartRoute : 'javascript:void(0)'"
                   class="btn btn-primary" :class="isAdding ? 'disabled' : ''"
                   @click="addToCart">
                    <i :class="itemCartClass"></i>
                    &nbsp; {{ itemCartText }}
                </a>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['productId', 'variants', 'orderCount', 'shares', 'propItemsInCart'],
        data: function () {
            return {
                isAdding: false,
                selectedColorId: null,
                selectedSizeId: null,
                itemsInCart: collect(this.propItemsInCart)
            }
        },
        mounted() {
            this.selectedColorId = this.variants[0].id;
            this.selectedSizeId = this.sizes.length ? this.sizes[0].id : null;
        },
        methods: {
            addToCart() {
                if (this.itemAlreadyInCart) {
                    return;
                }

                this.isAdding = true;
                axios.post(route('api.checkout.cart.store'), {
                    product_id: this.productId,
                    size_id: this.selectedSizeId,
                    color_id: this.selectedColorId
                }).then((response) => {

                    this.isAdding = false;
                    // HTTP_ALREADY_REPORTED
                    if (response.status === 208) {
                        return;
                    }

                    this.itemsInCart = collect(response.data.data);

                    this.$root.$emit('addedToCart', {
                        itemsInCartCount: this.itemsInCart.count()
                    });

                }).catch(error => {
                    this.isAdding = false;
                    if (error.response.status === 401) {
                        this.$modal.show('login', {
                            callback: this.addToCart
                        });
                    }
                });
            }
        },
        computed: {
            itemCartClass: function () {
                if (this.isAdding) {
                    return 'fa fa-spinner fa-spin';
                }

                return {
                    'fe fe-arrow-right': this.itemAlreadyInCart,
                    'fe fe-shopping-bag': !this.itemAlreadyInCart,
                }
            },
            itemCartText: function () {
                if (this.isAdding) {
                    return 'ADDING';
                }

                return this.itemAlreadyInCart ? 'GO TO CART' : 'ADD TO CART';
            },
            cartRoute: function () {
                return route('checkout.cart.index');
            },
            itemAlreadyInCart: function () {
                return this.itemsInCart.contains((item) => {
                    if (!this.hasSize) {
                        return item.color.id === this.selectedColorId;
                    }

                    return item.color.id === this.selectedColorId
                        && item.size.id === this.selectedSizeId;
                });
            },
            sizes: function () {
                return collect(this.variants).unique('size').filter((item) => {
                    return !!item.size;
                }).sort().all();
            },
            hasSize: function () {
                return this.sizes.length;
            },
            price: function () {
                let variant = collect(this.variants).firstWhere('id', this.selectedColorId);
                return (!!variant) ? variant.price : 0;
            }
        }
    }
</script>
