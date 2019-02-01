<template>
    <main>
        <a :href="buildRedirectUrl('facebook')" class="btn btn-outline-secondary mt-1 mr-2">
            <span class="fab fa-facebook brand-color-facebook mr-1"></span> Facebook
        </a>

        <a :href="buildRedirectUrl('reddit')" class="btn btn-outline-secondary mt-1 mr-2">
            <i class="fab fa-reddit brand-color-reddit mr-1"></i> Reddit
        </a>

        <!--<a :href="buildRedirectUrl('twitter')" class="btn btn-outline-secondary mt-1 mr-2">-->
            <!--<span class="fab fa-twitter brand-color-twitter mr-1"></span> Twitter-->
        <!--</a>-->

        <a :href="buildRedirectUrl('google')" class="btn btn-outline-secondary mt-1">
            <i class="fab fa-google brand-color-google mr-1"></i> Google
        </a>
    </main>
</template>

<script>
    export default {
        props: {
            redirectUrl: {
                required: false
            },
            inviteCode: {
                default: null,
                required: false
            }
        },
        methods: {
            buildRedirectUrl(platform) {
                let url = '/login/' + platform;

                if (this.redirectUrl) {
                    url += '?redirect=' + this.redirectUrl;
                }
                if (this.inviteCode) {
                    url += '&invite=' + this.inviteCode;
                }
                return url;
            }
        }
    }
</script>