/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.axios = require("axios");

require("./bootstrap");

window.Vue = require("vue");

import Carousel3d from "vue-carousel-3d";

Vue.use(Carousel3d);

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

const dayjs = require("dayjs");
//import dayjs from 'dayjs' // ES 2015
dayjs().format();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("carousel", require("./components/Carousel").default);
Vue.component("about-us", require("./components/AboutUs").default);
Vue.component(
    "advanced-search",
    require("./components/AdvancedSearch").default
);
Vue.component("howworks", require("./components/HowWorks").default);
Vue.component("advert-doc", require("./components/AdvertDoctor").default);
Vue.component("payment-button", require("./components/PaymentButton").default);

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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    // render: h => h(App),
});
