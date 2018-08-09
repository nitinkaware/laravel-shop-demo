/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./helpers');
require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Register Global Package Components.
import VModal from 'vue-js-modal';
Vue.use(VModal);

Vue.component('product-listing', require('./components/ProductListing.vue'));
Vue.component('product-view', require('./components/ProductView.vue'));
Vue.component('user-dropdown', require('./components/UserDropdown.vue'));
Vue.component('cart-menu', require('./components/CartMenu.vue'));
Vue.component('cart-checkout', require('./components/CartCheckout.vue'));

const app = new Vue({
    el: '#app'
});
