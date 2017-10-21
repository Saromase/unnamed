/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Chart from 'chart.js';

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

// ajoute le fichier modal.js
require('./modal.js');

// ajoute le fichier reduce-nav.js
require('./reduce-nav.js');

var Storage = require('./storage.js');
var Home = require('./home.js');


$(document).ready(function () {
    Storage.init();
    Home.init();
});
