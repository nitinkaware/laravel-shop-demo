<template>
    <div>
        <loading :active.sync="isLoading"
                 :can-cancel="false"
                 :is-full-page="true">
        </loading>
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
            <product v-for="product in filteredProducts" :key="product.id" :product="product"></product>
        </div>
    </div>
</template>

<script>

    import Loading from 'vue-loading-overlay';
    import Product from './Product.vue';
    import FilterByCategory from './FilterByCategory.vue';

    Vue.component('product', Product);
    Vue.component('filter-by-category', FilterByCategory);
    Vue.component('loading', Loading);

    export default {
        props: ['route'],
        data: function () {
            return {
                isLoading: true,
                products: {},
                filterBy: []
            }
        },
        mounted() {
            axios.get(this.route).then((response) => {
                this.isLoading = false;
                this.products = response.data.data;
            }).catch(function (error) {
                this.isLoading = false;
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
