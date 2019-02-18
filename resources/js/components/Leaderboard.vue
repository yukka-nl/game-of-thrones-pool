<template>
    <div>


        <div v-if="items.length > 0">
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
                <template slot="ranking" slot-scope="data">
                    <span v-if="data.item.ranking">{{ data.item.ranking }}</span>
                    <span v-if="!data.item.ranking">-</span>
                </template>
                <template slot="avatar" slot-scope="data">
                    <img :src="data.item.avatar" v-if="data.item.avatar && data.item.show_social_avatar"
                         class="rounded-circle mr-2"
                         style="height: 25px; width: 25px;">
                    <img src="/img/default-avatar.png" v-if="!data.item.avatar || !data.item.show_social_avatar"
                         class="rounded-circle mr-2"
                         style="height: 25px; width: 25px;">
                </template>
                <template slot="house" slot-scope="data">
                    <img :src="'/img/sigils-by-id/' + data.item.house_id + '.svg'"
                         v-if="data.item.house_id"
                         style="height: 25px; width: 25px;">
                    <span v-if="!data.item.house_id">
                     <img src="/img/sigils/none.png" v-if="!data.item.house_id" style="height: 25px; width: 25px;">
                </span>
                </template>
                <template slot="correct_guesses" slot-scope="data">
                    <span>{{ data.item.correct_guesses }}</span>
                </template>
                <template slot="predictions_link" slot-scope="data">
                    <a :href="'/prediction/user/' + getLinkId(data)">
                    <span>
                        <i class="far fa-eye"> </i> View prediction
                    </span>
                    </a>
                </template>
            </b-table>

            <b-pagination size="md" :total-rows="items.length" v-model="currentPage" :per-page="pageSize" align="center"
                          class="mt-3"></b-pagination>
        </div>
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
                pageSize: 25,
                filter: null,
                items: this.data,
                currentPage: 1,
                fields: [
                    {
                        key: 'ranking',
                        label: '<i class="fa fa-trophy" aria-hidden="true"></i>',
                        sortable: true,
                        tdClass: 'image-td-rank',
                    },
                    {
                        key: 'avatar',
                        label: '',
                        tdClass: 'image-td',
                    },
                    {
                        key: 'house',
                        label: 'House',
                        tdClass: 'image-td',
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
            }
        },
        methods: {
            getLinkId(data) {
                return data.item.user_id || data.item.id;
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length;
                this.currentPage = 1;
            }
        },
    }
</script>

<style>
    .image-td {
        width: 30px;
        text-align: center;
    }

    .image-td-rank {
        width: 75px;
    }
</style>