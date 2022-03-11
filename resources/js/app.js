require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import routes from './routes';
import HeaderComponent from './components/HeaderComponent';
import FooterComponent from './components/FooterComponent';
Vue.use(VueRouter);
Vue.component('header-component', HeaderComponent);
Vue.component('footer-component', FooterComponent);

const app = new Vue({
    el: '#app',
    router : new VueRouter(routes)
});
