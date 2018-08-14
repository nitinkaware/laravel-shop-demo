<template>
    <div class="row-cards row-deck">
        <loading :active.sync="isLoading"
                 :can-cancel="false"
                 :is-full-page="true">
        </loading>
        <address-modal></address-modal>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <checkout-address v-for="address in addresses"
                                      :prop-address="address"
                                      :key="address.id">
                    </checkout-address>

                    <label class="col-lg-4 pointer" @click="showAddressModal">
                        <div class="card rounded-full badge-pill address-row">
                            <div class="card-body d-flex flex-column">
                                <div style="margin-left: 5rem !important; margin-top: 5rem !important;">
                                    <i class="fe fe-plus-circle fa-3x"></i>
                                </div>
                                <p class="font-weight-bold text-center">Add new address</p>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="border-0 card">
                    <div class="card-body d-flex flex-column">
                        <div class="border-bottom">
                            <p class="font-weight-bold text-uppercase mb-2">{{ cart.length }} Item(s)</p>
                        </div>
                        <div class="mt-2">
                            <span class="pull-left text-dark">Order Total:</span>
                            <span class="pull-right text-dark">Rs. {{ order.sum }}</span>
                        </div>
                        <div class="mt-2 border-bottom">
                            <span class="pull-left text-dark">Estimated Tax:</span>
                            <span class="pull-right text-dark mb-2">Rs. {{ order.tax }}</span>
                        </div>
                        <div class="mt-2 font-weight-bold">
                            <span class="pull-left text-dark">Total Payable</span>
                            <span class="pull-right text-dark">Rs. {{ order.payable }}</span>
                        </div>
                    </div>
                    <div class="card-footer border-top-0">
                        <button class="btn btn-block btn-lg btn-pr btn-primary">CONTINUE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Loading from 'vue-loading-overlay';
    import Address from './Address.vue';
    import AddressModal from './Models/Address.vue';

    Vue.component('loading', Loading);
    Vue.component('checkout-address', Address);
    Vue.component('address-modal', AddressModal);

    export default {
        props: ['propAddresses', 'propCart'],
        data: function () {
            return {
                isLoading: false,
                addresses: this.propAddresses.data,
                cart: this.propCart.data,
                order: this.propCart.order
            }
        },
        created(){
            this.$root.$on('newAddressAdded', addresses => {
                this.addresses.push(addresses);
            });
        },
        computed: {},
        methods: {
            showAddressModal() {
                this.$modal.show('address');
            }
        }
    }
</script>

<style>
    .address-row {
        height: 296px;
        width: 275px;
    }
</style>