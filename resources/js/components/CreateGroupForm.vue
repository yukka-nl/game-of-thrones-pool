<template>
    <form @submit.prevent="submitForm">
        <div class="form-group mt-4">
            <label>Enter the name of the group: </label>
            <input type="text" class="form-control" v-model="formData.name">

            <b-alert variant="danger"
                     :show="formErrors.length > 0">
                <h5>Oops! It looks like there are some errors.</h5>
                <ul>
                    <div v-for="error in formErrors">
                        <li v-for="message in error.message">{{message}}</li>
                    </div>
                </ul>
            </b-alert>

            <button @click="submitForm()"  type="button" :disabled="!formData.name"
                    class="btn btn-primary btn-block mt-4">
                Create group!
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                formErrors: [],
                formData: {
                    name: null,
                },
            }
        },
        mounted() {

        },
        methods: {
            submitForm() {
                var self = this;
                this.formErrors = [];
                axios.post('/groups/', this.formData)
                    .then(function (response) {
                        window.location.replace(response.data.link);
                    })
                    .catch(function (error) {
                        if (error.response.status === 422) {
                            var p = error.response.data.errors;
                            for (var key in p) {
                                if (p.hasOwnProperty(key)) {
                                    self.formErrors.push({label: key, message: p[key]});
                                }
                            }
                        } else {
                            console.error(error);
                        }
                    });
            }
        },
    }
</script>

<style scoped>

</style>