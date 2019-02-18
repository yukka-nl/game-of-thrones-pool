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
        data() {
            return {
                leaderboard: [],
            }
        },
        mounted() {
            let self = this;
            axios.get('/api/leaderboard').then(function (response) {
                self.leaderboard = response.data;
            })
        }
    }
</script>