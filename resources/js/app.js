import VueDraggable from 'vue-draggable'

require('./bootstrap');

window.Vue = require('vue');


Vue.use(VueDraggable);

const app = new Vue({
    el: '#app'
});
