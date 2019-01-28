require('./bootstrap');
import BootstrapVue from 'bootstrap-vue'

window.Vue = require('vue');

Vue.component('prediction-form', require('./components/PredictionForm.vue').default);

Vue.use(BootstrapVue);

const app = new Vue({
    el: '#app'
});
