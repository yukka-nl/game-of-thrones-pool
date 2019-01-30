require('./bootstrap');
import BootstrapVue from 'bootstrap-vue'
import Snowf from 'vue-snowf';

window.Vue = require('vue');
Vue.use(BootstrapVue);
Vue.use(Snowf);

Vue.component('prediction-form', require('./components/PredictionForm.vue').default);
Vue.component('snow', require('./components/Snow.vue').default);
Vue.component('create-group-form', require('./components/CreateGroupForm.vue').default);
Vue.component('make-prediction-button', require('./components/MakePredictionButton.vue').default);
Vue.component('social-media-buttons', require('./components/SocialMediaButtons.vue').default);

const app = new Vue({
    el: '#app'
});
