<template>
    <div>
        <b-table striped hover :items="items" :fields="fields" v-if="items" :perPage="25">
            <template slot="Place" slot-scope="data">
                {{ data.index + 1 }}
            </template>
            <template slot="avatar" slot-scope="data">
                <img :src="data.item.avatar" class="rounded-circle mr-2" style="height: 50px;">
            </template>
        </b-table>
    </div>

</template>

<script>
    export default {
        props: {
            groupId: {
                default: null,
                required: false
            }
        },
        data() {
            return {
                fields: [
                    'Place',
                    {
                        key: 'avatar',
                        label: ''
                    },
                    {
                        key: 'name',
                        label: 'Name',
                        sortable: true
                    },
                    {
                        key: 'correct_guesses',
                        label: 'Correct guesses',
                        sortable: true
                    },
                    {
                        key: 'predictions_link',
                        label: 'Predictions',
                    }
                ],
                items: null,
            }
        },
        mounted() {
            this.getLeaderboard();
        },
        methods: {
            getLeaderboard() {
                var self = this;
                this.formErrors = [];
                axios.get('/leaderboard')
                    .then(function (response) {
                        return self.items = response.data;
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            },
        },
    }
</script>

<style scoped>

</style>