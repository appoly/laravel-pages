window.Vue = require('vue');

Vue.component(
    'page-body-editor',
    require('./components/TipTapComponent.vue')
);


const app = new Vue({
    el: '#app'
});
