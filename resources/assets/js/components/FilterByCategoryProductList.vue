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
            <product v-for="product in products" :key="product.id" :product="product"></product>
        </div>
    </div>
</template>

<script>

    import Product from './Product.vue';
    Vue.component('product', Product);

    import FilterByCategory from './FilterByCategory.vue';
    Vue.component('filter-by-category', FilterByCategory);

    export default {
        props: ['propCategory'],
        data: function () {
            return {
                products: {},
                category: this.propCategory.type
            }
        },
        mounted() {
            axios.get(route('api.products.index', this.category)).then((response) => {
                this.products = response.data.data;
            }).catch(function (error) {
                console.log(error);
            });
        },
        computed: {
            categories: function () {
                return collect(this.products).pluck('category').unique('id').all();
            }
        }
    }
</script>
