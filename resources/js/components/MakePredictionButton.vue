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
                <div class="mb-3">
                    <h1 class="h4">Sign in</h1>
                    Sign in with a social media account in order to make a prediction.
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