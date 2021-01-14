
window.Popper = require('popper.js').default;

window.$ = window.jQuery = require('jquery');

const Swal = window.Swal = require('sweetalert2');

require('bootstrap');
require('sweetalert2');

window.Vue = require('vue');

window.axios = require("axios");


window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";




Vue.component('movie-component', require('./components/MovieComponent.vue').default);


const app = new Vue({
    el: '#app',
});
