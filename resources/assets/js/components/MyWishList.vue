<template>
    <div>
        <div class="form-group">
            <label class="form-label">Filter By:</label>
            <div class="selectgroup selectgroup-pills">
                <filter-by-category v-for="category in categories"
                                    :key="category.id"
                                    :category="category">
                </filter-by-category>
            </div>
        </div>
        <div class="row row-cards">
            <product v-for="product in filteredProducts" :key="product.id" :product="product">
                <div slot="button">
                    <buy-product :prop-product-id="product.id"></buy-product>
                </div>
            </product>
        </div>
    </div>
</template>

<script>

    import BuyProduct from './BuyProduct.vue';
    Vue.component('buy-product', BuyProduct);

    export default {
        data: function () {
            return {
                products: {},
                filterBy: []
            }
        },
        mounted() {
            axios.get(route('api.wishlist.index')).then((response) => {
                this.products = response.data.data;
            }).catch(function (error) {
                console.log(error);
            });
        },
        created() {
            this.$root.$on('productFiltered', (data) => {
                data.checked
                    ? this.filterBy.push(data.id)
                    : this.filterBy.remove(data.id)
            });
        },
        computed: {
            filteredProducts: function () {
                return this.filterBy.length > 0
                    ? collect(this.products).whereIn('category.id', this.filterBy).all()
                    : this.products;
            },
            categories: function () {
                return collect(this.products).pluck('category').unique('id').all();
            }
        }
    }
</script>