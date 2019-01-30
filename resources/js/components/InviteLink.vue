<template>
    <main class="d-flex justify-content-center">
        <div class="col-sm-12 col-md-4">
            <i class="fas fa-envelope-open-text mr-1"></i>
            <span class="mr-2">Invite link</span>

            <div class="input-group ">
                <input type="text" class="form-control" :value="link" disabled>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" @click="doCopy">Copy Link</button>
                </div>
            </div>
            <div v-if="status.text" :class="status.class">
                {{ status.text }}
            </div>
        </div>


    </main>
</template>

<script>
    export default {
        props: ['link'],
        data() {
            return {
                status: {
                    text: '',
                    class: '',
                },
            }
        },
        methods: {
            doCopy: function () {
                let self = this;
                this.$copyText(this.link).then(function (e) {
                    self.status.text = 'Copied invite URL to clipboard. Share the link with your friends!';
                    self.status.class = "text-success mt-1";
                }, function (e) {
                    self.status.text = 'Something went wrong. Share this invite link with your friends: ' + self.link;
                    self.status.class = "text-danger mt-1";

                })
            }
        }
    }
</script>