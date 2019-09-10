window.swal = require('sweetalert2');

window.Vue = require('vue');

Vue.component(
    'page-body-editor',
    require('./components/TipTapComponent.vue').default
);


const app = new Vue({
    el: '#app'
});


//Generate slug from title
//TODO make a request to check if it's unique
$('input#title').change(function () {
    var urlInput = $('input#slug');
    if (urlInput.val() == '') {
        urlInput.val(
            $(this).val().toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '')
        );
    }
});
