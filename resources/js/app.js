import axios from "axios";
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");

    require("bootstrap");
} catch (e) {}

// vueJS
window.Vue = require("vue").default;
import VueRouter from "vue-router";

Vue.use(VueRouter);
import routes from "./routes";

// Component
Vue.component("Navbar", require("./components/navbar.vue").default);
Vue.component("Header", require("./components/header.vue").default);
Vue.component("Testimoni", require("./components/testimoni.vue").default);

const app = new Vue({
    el: "#alope",
    router: new VueRouter(routes),
});
