require("./bootstrap");
import Vue from "vue";
import BootstrapVue from "bootstrap-vue";
import App from "@/js/views/App";
import "bootstrap-vue/dist/bootstrap-vue.css";
import Toasted from "vue-toasted";
import pagination from "laravel-vue-pagination";
// import AuthPlugin from '../js/plugins/authPlugin'
import authPlugin from './plugins/authPlugin'
import router from "@/js/index";
import {set_Token} from './Helper/helper';
window.Vue = Vue;

Vue.use(BootstrapVue);



Vue.use(Toasted, {
    duration: 4000,
    position: "top-right",
    action: {
        onClick: (e, toastObject) => {
            toastObject.goAway(0);
        },
    },
});
Vue.use(pagination);

Vue.use(authPlugin);

set_Token()

window.onload = function () {
    const app = new Vue({
        el: "#app",
        router,
        render: (h) => h(App),
    });
};

export default app;
