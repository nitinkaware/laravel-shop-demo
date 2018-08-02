<template>
    <div class="row-cards row-deck">
        <modal name="product-quantity" :width="200" :height="150" :pivotX="0.5" :pivotY="0.3">
            <div class="cart">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Quantity</label>
                                <select class="form-control custom-select"
                                        v-model="quantityToUpdate">
                                    <option v-for="quantity in availableQuantity"
                                            :value="quantity"
                                            :disabled="quantity === selectedQuantity">{{ quantity }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary btn-block" @click="updateCartQuantity"
                                        :disabled="updating">
                                    <i :class="updating ? 'fa fa-spinner fa-spin' : 'fe fe-save'"
                                       data-toggle="tooltip"
                                       title="" data-original-title="Save"></i>
                                    {{ updating ? '' : 'Save' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </modal>
        <modal name="product-size" :width="200" :height="150" :pivotX="0.5" :pivotY="0.3">
            <div class="cart">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Size</label>
                                <select class="form-control custom-select"
                                        v-model="selectedSizeId">
                                    <option v-for="size in availableProductSizes"
                                            :value="size.id"
                                            :disabled="size.id === selectedSizeId">{{ size.size }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary btn-block" @click="updateCartSize"
                                        :disabled="updating">
                                    <i :class="updating ? 'fa fa-spinner fa-spin' : 'fe fe-save'"
                                       data-toggle="tooltip"
                                       title="" data-original-title="Save"></i>
                                    {{ updating ? '' : 'Save' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </modal>
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
                                    {{ item.size.name }} <i class="fa fa-caret-down"></i>
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="cursor" @click="showQuantityModal(item.id)">
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
        </div>
    </div>
</template>

<script>

    export default {
        props: ['propItemsInCart'],
        data: function () {
            return {
                updating: false,
                itemsInCart: this.propItemsInCart.data,
                updatingCartId: null,
                quantityToUpdate: '',
                currentCartItem: null,
                selectedSizeId: null,
            }
        },
        created(){

        },
        computed: {
            availableProductSizes: function () {
                return this.currentCartItem
                    ? this.currentCartItem.product.variants
                    : [];
            },
            availableQuantity: function () {
                return [1, 2, 3, 4, 5];
            },
            selectedQuantity: function () {
                let cart = collect(this.itemsInCart).firstWhere('id', this.updatingCartId);

                return cart ? cart.quantity : null;
            },
            hasItemInCart: function () {
                return this.itemsInCart.length;
            },
            total: function () {
                return collect(this.itemsInCart).map(function (item) {
                    let productTotal = item.price * item.quantity;
                    let tax = ((productTotal * item.product.tax.value) / 100);
                    item['calculated_tax'] = tax;
                    item['calculated_price'] = (productTotal) + tax;
                    return item;
                }).sum('calculated_price');
            },
            totalItemsInCartCount: function () {
                return collect(this.itemsInCart).count();
            }
        },
        methods: {
            showQuantityModal(cartId) {
                this.updatingCartId = cartId;
                this.quantityToUpdate = this.selectedQuantity;
                this.$modal.show('product-quantity');
            },
            showSizeModal(cartItem) {
                this.selectedSizeId = cartItem.size.id;
                this.currentCartItem = cartItem;
                this.$modal.show('product-size');
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
            updateCartQuantity: function () {
                this.updating = true;
                axios.put(route('api.checkout.quantity.update', this.updatingCartId), {
                    'quantity': this.quantityToUpdate
                }).then((response) => {
                    collect(this.itemsInCart).firstWhere('id', this.updatingCartId).quantity = response.data.quantity;
                    this.$modal.hide('product-quantity');
                    this.updating = false;
                }).catch((error) => {
                    this.updating = false;
                    console.log(error);
                });
            },
            updateCartSize: function () {
                this.updating = true;
                axios.put(route('api.checkout.size.update', this.currentCartItem.id), {
                    'size_id': this.selectedSizeId
                }).then((response) => {
                    ///collect(this.itemsInCart).firstWhere('id', this.updatingCartId).quantity = response.data.quantity;
                    this.$modal.hide('product-size');
                    this.updating = false;
                }).catch((error) => {
                    this.updating = false;
                    console.log(error);
                });
            },
        }
    }
</script>

<style scoped>
    .cursor {
        cursor: pointer;
    }
</style>