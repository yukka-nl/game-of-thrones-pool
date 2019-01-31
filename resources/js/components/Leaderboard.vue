<template>
    <div>
        <b-form-group horizontal label="Filter by name" class="mb-4 mt-3">
            <b-input-group>
                <b-form-input v-model="filter" placeholder="Search name..."/>
                <b-input-group-append>
                    <b-btn :disabled="!filter" @click="filter = ''">Clear</b-btn>
                </b-input-group-append>
            </b-input-group>
        </b-form-group>

        <b-table striped hover :items="items" :fields="fields" v-if="items" :per-page="pageSize" :filter="filter"
                 @filtered="onFiltered" class="leaderboard-table" :current-page="currentPage" responsive>
            <template slot="avatar" slot-scope="data">
                <img :src="data.item.avatar" class="rounded-circle mr-2" style="height: 25px;">
            </template>
            <template slot="correct_guesses" slot-scope="data">
                <span v-if="data.item.has_predictions">{{ data.item.correct_guesses }}</span>
                <span v-else>No predictions yet. {{ data.item.correct_guesses }}</span>
            </template>
            <template slot="predictions_link" slot-scope="data">
                <a :href="data.item.link" v-if="data.item.has_predictions">
                    <span>
                        <i class="far fa-eye"> </i> View prediction
                    </span>
                </a>
                <span class="text-muted" v-else>
                    <i class="far fa-frown"> </i> No prediction
                </span>

            </template>
        </b-table>

        <b-pagination size="md" :total-rows="items.length" v-model="currentPage" :per-page="pageSize" align="center" class="mt-3"></b-pagination>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                required: true
            }
        },
        data() {
            return {
                pageSize : 25,
                fields: [
                    {
                        key: 'ranking',
                        label: '<i class="fa fa-trophy" aria-hidden="true"></i>',
                        sortable: true
                    },
                    {
                        key: 'avatar',
                        label: ''
                    },
                    {
                        key: 'name',
                        label: 'Name',
                    },
                    {
                        key: 'correct_guesses',
                        label: 'Correct guesses',
                    },
                    {
                        key: 'predictions_link',
                        label: 'Actions',
                    }
                ],
                filter: null,
                items: this.data,
                currentPage: 1,

            }
        },
        mounted() {
        },
        methods: {
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1;
            }
        },
    }
</script>

<style scoped>

</style>