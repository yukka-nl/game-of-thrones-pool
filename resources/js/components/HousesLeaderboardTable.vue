<template>
    <main>
        <!-- Leaderboard -->
        <div>
            <b-table striped hover :items="items"></b-table>
        </div>
    </main>
</template>

<script>
    export default {

        data() {
            return {
                filter: null,
                items: [
                    { age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
                    { age: 21, first_name: 'Larsen', last_name: 'Shaw' },
                    { age: 89, first_name: 'Geneva', last_name: 'Wilson' },
                    { age: 38, first_name: 'Jami', last_name: 'Carney' }
                ],
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
