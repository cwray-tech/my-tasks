import TaskList from "./components/TaskList";

require('./bootstrap');

window.Vue = require('vue');



Vue.component('task-list', TaskList);

const app = new Vue({
    el: '#app'
});
