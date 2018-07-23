<template>
    <a href="javascript:void(0)"
       class="icon d-none d-md-inline-block ml-3 pull-right mb-2"
       :class="isWishlisted ? 'red' : '' "
       @click="toggleWishList"
    >
        <i :class="heartClass"></i>
    </a>
</template>

<script>
    export default {
        props: ['propIsWishlisted', 'productId'],
        data: function () {
            return {
                isWishlisted: this.propIsWishlisted
            }
        },
        methods: {
            toggleWishList: function () {
                let originalAction = this.isWishlisted;
                this.isWishlisted = !this.isWishlisted;

                axios.post(route('api.wishlist.store'), {
                    'product_id': this.productId
                }).catch((error) => {

                    if (error.response.status) {

                        this.$modal.show('login', {
                            callback: this.toggleWishList
                        });
                    }

                    this.isWishlisted = originalAction;
                });
            }
        },
        computed: {
            heartClass: function () {
                return this.isWishlisted ? 'fa fa-heart' : 'fe fe-heart'
            }
        },
    }
</script>