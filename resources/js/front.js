window.axios = require('axios');
window.Vue = require('vue');
import router from './router';

const dayjs = require('dayjs')
//import dayjs from 'dayjs' // ES 2015
dayjs().format()

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import App from './views/App.vue';

import { library } from "@fortawesome/fontawesome-svg-core";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* import specific icons */
import { faStar as fullStar } from "@fortawesome/free-solid-svg-icons";
import { faStar as emptyStar } from "@fortawesome/free-regular-svg-icons";

/* add icons to the library */
library.add(fullStar, emptyStar);

/* add font awesome icon component */
Vue.component("font-awesome-icon", FontAwesomeIcon);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: router
    
});