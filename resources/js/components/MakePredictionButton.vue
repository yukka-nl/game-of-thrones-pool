<template>
    <main>
        <span class="btn btn-primary btn-lg" v-if="!isAuthenticated || (isAuthenticated && !madePredictions)"
              @click="makePrediction()">
            <i class="fab fa-wpforms mr-1"></i> Make your prediction
        </span>

        <a :href="'/prediction/user/' + userId" class="btn btn-outline-secondary btn-lg" v-if="isAuthenticated && madePredictions">
            <i class="fab fa-wpforms mr-1"></i> View your prediction
        </a>

        <b-modal ref="loginModal" hide-footer title="Sign in with social media">
            <div class="d-block">
                <div class="mb-3 text-left">
                    <h1 class="h4">Sign in</h1>
                    Sign in with a social media account in order to make a prediction. We will use the following data:

                    <ul class="mt-2">
                        <li>Your name (you can change your display name in the settings)</li>
                        <li>Your profile photo</li>
                        <li>Social Account ID (used for authentication with chosen Social Platform)</li>
                    </ul>

                    You can delete your account anytime you want.
                </div>
                <social-media-buttons redirect-url="make-prediction"></social-media-buttons>
            </div>
        </b-modal>
    </main>
</template>

<script>
    export default {
        props: ['isAuthenticated', 'madePredictions', 'userId'],
        methods: {
            makePrediction() {
                if(this.isAuthenticated) {
                    window.location.replace("/prediction/create");
                }
                this.$refs.loginModal.show();
            }
        }
    }
</script>