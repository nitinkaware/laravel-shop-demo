<template>
    <div class="dropdown">
        <loading :active.sync="isLoading"
                 :can-cancel="false"
                 :is-full-page="true">
        </loading>
        <div class="nav-item d-none d-md-flex">
            <button class="btn btn-md btn-outline-primary" @click="redirectToCart" :disabled="isLoading">
                <i class="fe fe-shopping-cart" data-toggle="tooltip" title="fe fe-shopping-cart"></i>
                Cart
                <span v-if=" !!numberOfItemsInCart" class="badge badge-primary rounded-full relative">
                    {{ numberOfItemsInCart }}
                </span>
            </button>
        </div>
    </div>
</template>

<script>

    import Loading from 'vue-loading-overlay';
    Vue.component('loading', Loading);

    export default {
        props: ['propCount'],
        data: function () {
            return {
                numberOfItemsInCart: this.propCount,
                isLoading: false,
            }
        },
        created(){
            this.$root.$on('addedToCart', (data) => {
                this.numberOfItemsInCart += 1;
                //this.numberOfItemsInCart = data.cart_count;
            });
        },
        methods: {
            redirectToCart() {
                this.isLoading = true;
                window.location = route('checkout.cart.index');
            }
        }
    }
</script>

<style>
    .relative {
        position: relative !important;
    }

    .rounded-full {
        border-radius: 12px;
    }
</style>