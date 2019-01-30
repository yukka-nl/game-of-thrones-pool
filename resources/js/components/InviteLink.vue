<template>
    <main>
        <i class="fas fa-envelope-open-text mr-1"></i>
        <span class="mr-2">Invite link</span>
        <input type="text" :value="link" disabled>
        <div type="text" class="btn btn-outline-secondary text-muted" @click="doCopy">Copy link</div>
        <br>
        <div v-if="status.text" :class="status.class">
            {{ status.text }}
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