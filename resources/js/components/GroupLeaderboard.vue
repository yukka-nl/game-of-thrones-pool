<template>
    <main>
        <!-- Leaderboard -->
        <leaderboard :data="leaderboard" v-if="leaderboard.length > 0"></leaderboard>

        <!-- Spinner -->
        <div v-if="leaderboard.length === 0" class="text-center">
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
            <div>
                Loading...
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        props: {
            slug: {
                required: true
            }
        },
        data() {
            return {
                leaderboard: [],
            }
        },
        mounted() {
            let self = this;
            axios.get('/api/leaderboard/group/' + this.slug).then(function (response) {
                self.leaderboard = response.data;
            })
        }
    }
</script>