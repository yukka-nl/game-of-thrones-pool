<template>
    <a class="btn btn-white" @click="doCopy">
        <i class="far fa-copy mr-1"></i> <span v-html="buttonText" :class="stylingClass"></span>
    </a>
</template>

<script>
    export default {
        data() {
            return {
                message: window.location.href,
                buttonText: 'Copy to clipboard',
                stylingClass: '',
            }
        },
        methods: {
            doCopy: function () {
                let self = this;
                this.$copyText(this.message).then(function (e) {
                    self.buttonText = "Copied Url!";
                    self.stylingClass = 'text-success';
                }, function (e) {
                    console.log(e);
                })
            }
        }
    }
</script>
