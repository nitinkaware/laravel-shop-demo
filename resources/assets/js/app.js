/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VModal from 'vue-js-modal';
Vue.use(VModal);

Vue.component('all-product-listing', require('./components/AllProductListing.vue'));
Vue.component('filtered-product-listing', require('./components/CategoryProductListing.vue'));
Vue.component('product-view', require('./components/ProductView.vue'));
Vue.component('user-dropdown', require('./components/UserDropdown.vue'));

const app = new Vue({
    el: '#app'
});
