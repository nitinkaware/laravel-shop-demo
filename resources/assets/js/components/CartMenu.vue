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
                <span v-if=" !!itemsInCartCount" class="badge badge-primary rounded-full relative">
                    {{ itemsInCartCount }}
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
                itemsInCartCount: this.propCount,
                isLoading: false,
            }
        },
        created(){
            this.$root.$on(['addedToCart', 'removedFromCart'], (data) => {
                this.itemsInCartCount = data.itemsInCartCount;
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