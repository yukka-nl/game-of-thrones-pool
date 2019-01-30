<template>
    <div>
        <form>
            <h5>Settings</h5>
            <hr>
            <div class="form-group">
                <label for="username">Change your display name</label>
                <input type="text" class="form-control" id="username" v-model="formData.username"
                       placeholder="Enter new name here...">
            </div>

            <b-alert variant="danger"
                     :show="formErrors.length > 0">
                <h5>Oops! It looks like there are some errors.</h5>
                <ul>
                    <div v-for="error in formErrors">
                        <li v-for="message in error.message">{{message}}</li>
                    </div>
                </ul>
            </b-alert>

            <b-alert variant="success"
                     dismissible
                     :show="showSuccessAlert"
                     @dismissed="showSuccessAlert=false">
                Settings saved!
            </b-alert>

            <button @click="changeSettings()" type="button" :disabled="!formData.username"
                    class="btn btn-primary btn-block mt-4">
                Save
            </button>
        </form>

        <b-modal ref="deleteModal" hide-footer title="Delete account">
            <div class="d-block text-center">
                <h1 class="h4">Do you really want to delete your account?</h1>
                By deleting your account all of your data will be removed, including the predictions and groups you've made!
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <b-btn class="mt-3" variant="outline-danger" block @click="hideModal">Cancel</b-btn>
                </div>
                <div class="col-sm-12 col-md-6">
                    <b-btn class="mt-3" variant="danger" block @click="deleteAccount()">Yes, delete my account</b-btn>
                </div>
            </div>
        </b-modal>

        <form>
            <h5 class="mt-4">Danger Zone</h5>
            <hr>
            <div class="form-group">
                <button @click="openModal" type="button" class="btn btn-danger btn-block mt-4">
                    Delete account
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                formErrors: [],
                showSuccessAlert: false,
                formData: {
                    username: null,
                },
            }
        },
        methods: {
            changeSettings() {
                var self = this;
                this.formErrors = [];
                axios.put('/settings/', this.formData)
                    .then(function (response) {
                        self.showSuccessAlert = true;
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
            deleteAccount() {
                var self = this;
                this.formErrors = [];
                axios.delete('/settings/')
                    .then(function (response) {
                        window.location.replace('/');
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
            openModal() {
                this.$refs.deleteModal.show();
            },
            hideModal() {
                this.$refs.deleteModal.hide();
            }
        },
    }
</script>

<style scoped>

</style>