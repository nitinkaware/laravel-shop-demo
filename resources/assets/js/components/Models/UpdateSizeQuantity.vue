<template>
    <div>
        <modal name="product-quantity-size" :width="200" :height="150" :pivotX="0.5" :pivotY="0.3"
               @before-open="beforeOpen">
            <div class="cart">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">{{ label }}</label>
                                <select class="form-control custom-select"
                                        v-model="selected">
                                    <option v-for="{id, value} in collection"
                                            :value="id"
                                            :disabled="id === selected">{{ value }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary btn-block" @click="handleSubmit"
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
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                label: '',
                collection: [{
                    id: '',
                    value: ''
                }],
                cart: {},
                updating: false,
                selected: null,
                route: '',
                requestParam: '',
                type: []
            }
        },
        computed: {},
        methods: {
            beforeOpen: function (event) {
                collect(['label', 'collection', 'cart', 'selected', 'requestParam', 'route', 'type'])
                    .each((item) => {
                        this[item] = event.params[item];
                    });
            },
            handleSubmit: function () {
                this.updating = true;
                axios.put(route(this.route, this.cart.id), {[this.requestParam]: this.selected})
                    .then((response) => {
                        if (this.type === 'quantity') {
                            this.cart.quantity = response.data.quantity;
                        } else {
                            let variant = collect(this.cart.product.variants).firstWhere('id', this.selected);
                            this.cart.size.name = variant.size;
                            this.cart.size.id = variant.id;
                        }

                        this.$modal.hide('product-quantity-size');
                        this.updating = false;
                    }).catch((error) => {
                    this.updating = false;
                    console.log(error);
                });
            }
        }
    }
</script>