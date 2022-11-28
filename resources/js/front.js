window.axios = require('axios');
window.Vue = require('vue');
import router from './router';

const dayjs = require('dayjs')
//import dayjs from 'dayjs' // ES 2015
dayjs().format()

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import App from './views/App.vue';

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: router
    
});