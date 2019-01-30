require('./bootstrap');
import BootstrapVue from 'bootstrap-vue'
import Snowf from 'vue-snowf';

window.Vue = require('vue');
Vue.use(BootstrapVue);
Vue.use(Snowf);

Vue.component('prediction-form', require('./components/PredictionForm.vue').default);
Vue.component('snow', require('./components/Snow.vue').default);
Vue.component('create-group-form', require('./components/CreateGroupForm.vue').default);
Vue.component('settings-form', require('./components/SettingsForm.vue').default);
Vue.component('leaderboard', require('./components/Leaderboard.vue').default);

const app = new Vue({
    el: '#app'
});
