<template>
    <div>
        <b-form-group horizontal label="Filter by name" class="mb-1">
            <b-input-group>
                <b-form-input v-model="filter" placeholder="Search name..."/>
                <b-input-group-append>
                    <b-btn :disabled="!filter" @click="filter = ''">Clear</b-btn>
                </b-input-group-append>
            </b-input-group>
        </b-form-group>

        <b-table striped hover :items="items" :fields="fields" v-if="items" :perPage="25" :filter="filter" @filtered="onFiltered">
            <template slot="Place" slot-scope="data">
                {{ data.index + 1 }}
            </template>
            <template slot="avatar" slot-scope="data">
                <img :src="data.item.avatar" class="rounded-circle mr-2" style="height: 50px;">
            </template>
        </b-table>
        <b-pagination size="md" :total-rows="items.length" v-model="currentPage" :per-page="25">
        </b-pagination>
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
                filter: null,
                currentPage: 1,

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
            onFiltered (filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1;
            }
        },
    }
</script>

<style scoped>

</style>