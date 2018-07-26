<template>
    <div class="row-cards row-deck">
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
                                    Tax: {{ item.price }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div>{{ item.color.name }}</div>
                            </td>
                            <td class="text-center">
                                <div>{{ item.size.name }}</div>
                            </td>
                            <td class="text-center">
                                <span class="cursor">
                                    1 <i class="fa fa-caret-down"></i>
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
                itemsInCart: this.propItemsInCart.data
            }
        },
        created(){

        },
        computed: {
            hasItemInCart: function () {
                return this.itemsInCart.length;
            },
            total: function () {
                return collect(this.itemsInCart).sum('price');
            },
            totalItemsInCartCount: function () {
                return collect(this.itemsInCart).count();
            }
        },
        methods: {
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
            }
        }
    }
</script>

<style>
    .cursor {
        cursor: pointer;
    }
</style>