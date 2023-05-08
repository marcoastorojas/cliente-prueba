/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('register-component', require('./components/RegisterComponent.vue').default);
Vue.component('cupon-component', require('./components/CuponComponent.vue').default);
Vue.component('reporte-actividad-neogocio-component', require('./components/ReporteActividadNegocioComponent.vue').default);
Vue.component('comprobante-component', require('./components/ComprobanteComponent.vue').default);
Vue.component('reporte-acum-canjes', require('./components/ReporteCanjesComponent.vue').default);
Vue.component('compensas-negocios', require('./components/RecompensasNegocioComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//  import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);
import VueCountryCode from "vue-country-code-select";
Vue.use(VueCountryCode);
import VueTheMask from 'vue-the-mask';
Vue.use(VueTheMask);

const app = new Vue({
    el: '#app',
});
