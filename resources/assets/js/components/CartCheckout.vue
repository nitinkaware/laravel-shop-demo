<template>
    <div class="row-cards row-deck">
        <loading :active.sync="isLoading"
                 :can-cancel="false"
                 :is-full-page="true">
        </loading>
        <cart-quantity-size></cart-quantity-size>
        <div class="col-12" v-if="!hasItemInCart">
            <div class="alert alert-primary">
                Your cart is empty, add something <a href="/" class="alert-link"> here!!</a>
            </div>
        </div>
        <div class="col-12" v-else>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <h3>My Shopping Cart ({{ totalItemsInCartCount }})</h3>
                    </div>
                    <div class="pull-right">
                        <h4>Total: {{ total }}</h4>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                        <thead>
                        <tr>
                            <th class="text-center w-1"><i class="icon-people"></i></th>
                            <th class="text-left">Product</th>
                            <th class="text-center">Color</th>
                            <th class="text-center">Size</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Total</th>
                            <th class="text-center"><i class="icon-settings"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in itemsInCart" :key="item.id">
                            <td class="text-center">
                                <span class="avatar"
                                      style="background-image: url(https://picsum.photos/400/300?image=0)"></span>
                            </td>
                            <td class="text-left">
                                <div>
                                    {{ item.product.name }}
                                </div>
                                <div class="small text-muted">
                                    Tax: {{ item.calculated_tax }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div>{{ item.color.name }}</div>
                            </td>
                            <td class="text-center">
                                <span class="cursor" @click="showSizeModal(item)">
                                    {{ item.size.name }} <i v-if=" !!item.size.name" class="fa fa-caret-down"></i>
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="cursor" @click="showQuantityModal(item)">
                                    {{ item.quantity }} <i class="fa fa-caret-down"></i>
                                </span>
                            </td>
                            <td class="text-center">
                                <div>{{ item.price }}</div>
                            </td>
                            <td class="w-1"><a href="#" class="icon">
                                <i class="fe fe-trash" @click="removeItemFromCart(item.id)"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <button class="btn btn-primary pull-right text-uppercase" @click="goToAddress">
                    Place Order
                </button>
            </div>
        </div>
    </div>
</template>

<script>

    import CartQuantitySize from './Models/UpdateSizeQuantity.vue';
    Vue.component('cart-quantity-size', CartQuantitySize);

    import Loading from 'vue-loading-overlay';
    Vue.component('loading', Loading);

    export default {
        props: ['propItemsInCart'],
        data: function () {
            return {
                isLoading: false,
                itemsInCart: this.propItemsInCart.data,
            }
        },
        created(){

        },
        computed: {
            hasItemInCart: function () {
                return this.itemsInCart.length;
            },
            total: function () {
                return indian_format(collect(this.itemsInCart).map(function (item) {
                    let productTotal = item.price * item.quantity;
                    let tax = ((productTotal * item.product.tax.value) / 100);
                    item['calculated_tax'] = tax;
                    item['calculated_price'] = (productTotal) + tax;
                    return item;
                }).sum('calculated_price'));
            },
            totalItemsInCartCount: function () {
                return collect(this.itemsInCart).count();
            },
        },
        methods: {
            showQuantityModal(cart) {
                this.$modal.show('product-quantity-size', {
                    route: 'api.checkout.quantity.update',
                    requestParam: 'quantity',
                    label: 'Select Quantity',
                    cart: cart,
                    selected: cart.quantity,
                    type: 'quantity',
                    collection: collect([1, 2, 3, 4, 5]).map(function (item) {
                        return {
                            id: item,
                            value: item,
                        }
                    }).all(),
                });
            },
            showSizeModal(cart) {
                this.$modal.show('product-quantity-size', {
                    route: 'api.checkout.size.update',
                    requestParam: 'size_id',
                    label: 'Select Size',
                    cart: cart,
                    selected: cart.size.id,
                    type: 'size',
                    collection: collect(cart.product.variants).unique('size').map(function (item) {
                        return {
                            id: item.id,
                            value: item.size,
                        }
                    }).all(),
                });
            },
            removeItemFromCart: function (cartId) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove from the cart!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete(route('api.checkout.cart.destroy', cartId)).then((response) => {
                            this.itemsInCart = response.data.data;

                            this.$root.$emit('removedFromCart', {
                                itemsInCartCount: this.itemsInCart.length
                            });

                            swal(
                                'Removed!',
                                'Your item has been removed.',
                                'success'
                            );
                        }).catch((error) => {
                            swal(
                                'Oops!',
                                'Something went wrong!',
                                'error'
                            );
                        });
                    }
                })
            },
            goToAddress: function () {
                this.isLoading = true;
            }
        }
    }
</script>

<style scoped>
    .cursor {
        cursor: pointer;
    }
</style>