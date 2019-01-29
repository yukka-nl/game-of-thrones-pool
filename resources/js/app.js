require('./bootstrap');
import BootstrapVue from 'bootstrap-vue'
import Snowf from 'vue-snowf';

window.Vue = require('vue');
Vue.use(BootstrapVue);
Vue.use(Snowf);

Vue.component('prediction-form', require('./components/PredictionForm.vue').default);
Vue.component('snow', require('./components/Snow.vue').default);

const app = new Vue({
    el: '#app'
});
