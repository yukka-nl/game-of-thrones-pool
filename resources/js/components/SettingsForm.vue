<template>
    <div>
        <form>
            <h5>Settings</h5>
            <hr>
            <div class="form-group">
                <label for="username">Change your display name</label>
                <input type="text" class="form-control" id="username" v-model="username" placeholder="Enter new name here...">
            </div>

            <div class="alert alert-danger mt-4" v-if="formErrors.length > 0">
                <h5>Oops! It looks like there are some errors.</h5>
                <ul>
                    <div v-for="error in formErrors">
                        <li v-for="message in error.message">{{message}}</li>
                    </div>
                </ul>
            </div>

            <button @click="changeSettings()" type="button" :disabled="!formData.name" class="btn btn-primary btn-block mt-4">
                Save
            </button>
        </form>
        <form>
            <h5 class="mt-4">Danger Zone</h5>
            <hr>
            <div class="form-group">
                <button @click="deleteAccount()" type="button" class="btn btn-danger btn-block mt-4">
                    Delete account
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props:[
            'user'
        ],
        data() {
            return {
                formErrors: [],
                formData: {
                    username: null,
                },
            }
        },
        mounted() {

        },
        methods: {
            changeSettings () {
                var self = this;
                this.formErrors = [];
                axios.post('/settings/', this.formData)
                    .then(function (response) {
                        console.log('Group created!');
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
            },
            deleteAccount () {
                var self = this;
                this.formErrors = [];
                axios.delete('/settings/', this.formData)
                    .then(function (response) {
                        console.log('Group created!');
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