require('./bootstrap');
import BootstrapVue from 'bootstrap-vue'
import Snowf from 'vue-snowf';
import VueClipboard from 'vue-clipboard2'
import VueMq from 'vue-mq'

window.SocialSharing = require('vue-social-sharing');

window.Vue = require('vue');
Vue.use(BootstrapVue);
Vue.use(Snowf);

Vue.use(VueClipboard);
Vue.use(SocialSharing);
Vue.use(VueMq, {
    breakpoints: {
        xs: 0,
        sm: 576,
        md: 768,
        lg: 992,
        xl: 1200,
    }
});

Vue.component('prediction-form', require('./components/PredictionForm.vue').default);
Vue.component('prediction-edit-form', require('./components/PredictionEditForm.vue').default);
Vue.component('snow', require('./components/Snow.vue').default);
Vue.component('create-group-form', require('./components/CreateGroupForm.vue').default);
Vue.component('settings-form', require('./components/SettingsForm.vue').default);
Vue.component('houses-leaderboard', require('./components/HousesLeaderboard.vue').default);
Vue.component('make-prediction-button', require('./components/MakePredictionButton.vue').default);
Vue.component('social-media-buttons', require('./components/SocialMediaButtons.vue').default);
Vue.component('invite-link', require('./components/InviteLink.vue').default);
Vue.component('copy-to-clipboard', require('./components/CopyToClipboard.vue').default);
Vue.component('season-countdown', require('./components/SeasonCountDown.vue').default);
Vue.component('character-bar-charts', require('./components/CharacterBarCharts.vue').default);
Vue.component('group-options-dropdown', require('./components/GroupOptionsDropdown.vue').default);

Vue.component('leaderboard', require('./components/Leaderboard.vue').default);
Vue.component('group-leaderboard', require('./components/GroupLeaderboard.vue').default);
Vue.component('global-leaderboard', require('./components/GlobalLeaderboard.vue').default);

Vue.component('sigils-credits', require('./components/SigilsCredits.vue').default);

const app = new Vue({
    el: '#app'
});
