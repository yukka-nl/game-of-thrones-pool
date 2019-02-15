<template>
    <main>
        <span>
            Pledge your sword to one of the houses and compete against each other. <a href="#" @click="showModal">Learn more.</a>
        </span>
        <hr class="mb-4 mt-3">
        <div class="container">
            <div class="row d-flex justify-content-center pl-5 pr-5">
                <div class="col-md text-center" v-for="house in houses">
                    <div class="sigil-wrapper">
                        <img :src="sigilImagePath + house.image" class="sigil"></img>
                    </div>
                    <div>
                        {{ house.name }}
                    </div>
                    <div>
                    <span class="text-muted small">
                        <i class="fas fa-users"></i>
                        {{ house.userCount }}
                    </span>
                    </div>
                    <div>
                        <span class="badge badge-primary">0% correct</span>
                    </div>
                </div>
            </div>
        </div>

        <b-modal ref="myModalRef" title="About Battle of the Houses">
            <p class="text-left">
                Battles of the Houses gives you the chance to fight for your favourite house. There are two ways a house
                can earn points:
            </p>

            <p class="text-left">
                <strong><i class="fas fa-clipboard-list"></i> Collective house predictions</strong>
                <br>
                Once you join a house your prediction will be added to the collective
                house predictions. The percentage of correct guesses will partially determine the ranking of a house.
            </p>

            <p class="text-left">
                <strong><i class="fas fa-poll"></i> Collective episode-based predictions</strong>
                <br>
                The second way to earn points is to participate in the episode-based predictions. Before each episode
                airs, an extra prediction question will be added to the pool. Each house member gets the chance to vote
                for the predicted outcome. The option that has the most votes among the house members will be the
                collective choice of the house. Correct predictions will earn points for the house.
            </p>

            <hr>

            <span class="text-primary">
                We will soon release an interactive map that displays the battle of the houses. Stay tuned!
            </span>

            <div slot="modal-footer" class="w-100">
                <b-button class="float-right" variant="primary" @click="hideModal">Close</b-button>
            </div>
        </b-modal>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                sigilImagePath: '/img/sigils/',
                houses: []
            }
        },
        mounted() {
            let self = this;
            axios.get('houses')
                .then(function (response) {
                    self.houses = response.data
                })
        },
        methods: {
            showModal() {
                this.$refs.myModalRef.show()
            },
            hideModal() {
                this.$refs.myModalRef.hide()
            }
        }
    }
</script>

<style scoped>
    .sigil {
        width: 100%;
    }

    .sigil-wrapper {
        height: 90px;
    }
</style>