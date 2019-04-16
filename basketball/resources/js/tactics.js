require('./bootstrap');

window.Vue = require('vue');

Vue.component('tactics', require('./components/Tactics.vue').default);

const app = new Vue({
    el: '#tactics-page'
});
