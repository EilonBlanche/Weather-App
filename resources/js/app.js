require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
import routes from './routes';
import HeaderComponent from './components/HeaderComponent';
import FooterComponent from './components/FooterComponent';
import BootstrapVue from 'bootstrap-vue';
import "bootstrap-vue/dist/bootstrap-vue.css";
Vue.use(BootstrapVue)
Vue.use(VueRouter);
Vue.component('HeaderComponent', HeaderComponent);
Vue.component('FooterComponent', FooterComponent);
const app = new Vue({
    el: '#app',
    router : new VueRouter(routes)
});
