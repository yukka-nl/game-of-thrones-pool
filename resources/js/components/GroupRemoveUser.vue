<template>
    <main>
        <span>
            <i class="fas fa-times remove-user" @click="showConfirmation()"></i>
        </span>
        <b-modal ref="confirmation" title="Remove from group">
            <p>Are you sure you want to remove user from the group?</p>

            <div slot="modal-footer" class="w-100">
                <b-btn class="float-right ml-2" variant="danger" @click="removeUser()">
                    Remove
                </b-btn>
                <b-btn class="float-right" variant="primary" @click="hideConfirmation()">
                    Cancel
                </b-btn>
            </div>
            <b-alert v-model="showDismissibleAlert" variant="danger" dismissible>
                Oops, something went wrong. Please try again later.
            </b-alert>
        </b-modal>
    </main>
</template>

<script>
    export default {
        name: "GroupRemoveUser",
        props: {
            targetUser: {
                required: true
            },
            groupSlug: {
                required: true
            },
        },
        data() {
            return {
                showDismissibleAlert: false
            }
        },
        methods: {
            showConfirmation() {
                this.$refs.confirmation.show();
            },
            hideConfirmation() {
                this.$refs.confirmation.hide();
            },
            removeUser() {
                let self = this;
                let postData = {
                    'user_id': this.targetUser,
                    'group_uuid': this.groupSlug,
                };

                axios.delete('/groups/remove-user', {data: postData})
                    .then(function (response) {

                        self.hideConfirmation();
                    })
                    .catch(function (error) {
                        self.showDismissibleAlert = true;
                    });
            }
        }
    }
</script>

<style scoped>
    .remove-user {
        cursor: pointer;
        color: #b91d19;
    }
</style>
