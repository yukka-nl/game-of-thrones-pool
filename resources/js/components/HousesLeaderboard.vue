<template>
    <main>

        <div class="mt-1" v-if="!hideTitle">
            The house points are updated every week and are calculated in the following manner:

            <div class="mt-2">
            <code>
                House points = total correct house predictions + average correct user predictions within the house
            </code>
            </div>

            <a class="btn btn-outline-secondary mt-2" href="/predictions/house/results">
                <i class="fas fa-vote-yea mb-2"></i> View all house predictions <span class="badge badge-success h4 d-inline" >new</span>
            </a>
        </div>
        <div v-if="houses.length === 0" class="text-center mt-3 mb-3">
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
            <div>
                Loading...
            </div>
        </div>
        <hr class="mb-4 mt-3">
        <div class="container p-0 p-md-2">
            <div class="row d-flex justify-content-center p-0 pl-md-3 pr-md-3">
                <div :class="houseCard(house.id)" v-for="house in houses" @click="openJoinHouseModal(house)" v-if="houses.length > 0">
                    <div class="sigil-wrapper">
                        <img :src="sigilImagePath + house.image" class="sigil"></img>
                    </div>
                    <div class="mt-2">
                        {{ house.name }}
                    </div>
                    <div>
                    <span class="text-muted small" v-if="!hideStats">
                        <i class="fas fa-users"></i>
                        {{ house.users_count }}
                    </span>
                    </div>
                    <div class="mt-2">
                        <div class="alert alert-primary p-1 mt-0 mr-0 ml-0 mb-1" v-if="!hideStats">
                            {{ house.totalScore }} points
                        </div>
                        <span v-if="chosenHouse && (house.id === chosenHouse)" class="text-primary small">
                            Your choice
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <sigils-credits text-class="float-right" label-text="House sigils credits"></sigils-credits>

        <b-modal ref="joinHouse" hide-footer title="Join House">
            <div v-if="selectedHouse">
                <h1 class="h4">Would you like to join {{ selectedHouse.name }}?</h1>
                You can't switch houses anymore once you joined a house.
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <b-btn class="mt-3" variant="outline-secondary" block @click="closeJoinHouseModal">
                        Never mind
                    </b-btn>
                </div>
                <div class="col-sm-12 col-md-6">
                    <b-btn class="mt-3" variant="outline-primary" block @click="joinHouse">
                        Join house
                    </b-btn>
                </div>
            </div>

            <div slot="modal-footer" class="w-100">
                <b-button class="float-right" variant="primary" @click="hideModal">Close</b-button>
            </div>
        </b-modal>

        <b-modal ref="battleOfHouses" title="About Battle of the Houses">
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

        <b-modal ref="loginModal" hide-footer title="Sign in with social media">
            <div class="d-block">
                <div class="mb-3 text-left">
                    <h1 class="h4">Sign in</h1>
                    Sign in with a social media account in order to make a prediction and join a house. We will use the following data:

                    <ul class="mt-2">
                        <li>Your name (you can change your display name in the settings)</li>
                        <li>Your profile photo (you can disable this in the settings)</li>
                        <li>Social Account ID (used for authentication with chosen Social Platform)</li>
                    </ul>

                    You can delete your account anytime you want.
                </div>
                <social-media-buttons></social-media-buttons>
            </div>
        </b-modal>
    </main>
</template>

<script>
    export default {
        props: {
            userHouseId: {
                default: null,
                required: false,
            },
            userLoggedIn: {
                required: true,
            },
            hideStats: {
                default: false,
                required: false,
            },
            refreshAfterJoin: {
                default: false,
                required: false,
            },
            hideTitle: {
                default: false,
                required: false,
            },
            lockdown: {
                default: false,
                required: false,
            }
        },
        data() {
            return {
                sigilImagePath: '/img/sigils/',
                houses: [],
                chosenHouse: this.userHouseId,
                selectedHouse: null,
            }
        },
        mounted() {
            this.getHouses();
        },
        methods: {
            getHouses() {
                let self = this;
                axios.get('/houses')
                    .then(function (response) {
                        let houses = response.data;
                        self.houses = houses.sort((a, b) => b.totalScore.localeCompare(a.totalScore));
                    })
            },
            openJoinHouseModal(house) {
                if(this.lockdown) {
                    return;
                }

                if(!this.userLoggedIn) {
                    this.$refs.loginModal.show();
                    return;
                }

                if(this.chosenHouse) {
                    return;
                }

                this.selectedHouse = house;
                this.$refs.joinHouse.show()
            },
            closeJoinHouseModal(house) {
                this.$refs.joinHouse.hide()
            },
            joinHouse() {
                this.closeJoinHouseModal();
                let self = this;
                axios.post('/houses/join', {'houseId': this.selectedHouse.id, 'flashMessage': this.refreshAfterJoin})
                    .then(function (response) {
                        self.chosenHouse = response.data;
                        if(self.refreshAfterJoin) {
                            location.reload();
                        }
                    })
            },
            showModal() {
                this.$refs.battleOfHouses.show()
            },
            hideModal() {
                this.$refs.battleOfHouses.hide()
            },
            houseCard(houseId) {
                let classes = "mb-2 mb-md-0 text-center alert col-4 col-lg-2 col-xl p-2 p-md-3";

                if (this.chosenHouse) {
                    if (houseId === this.chosenHouse) {
                        classes += " alert-primary";
                    } else {
                        classes += " other-houses";
                    }
                }

                if(!this.lockdown) {
                    classes += " house-card";
                }

                return classes;
            }
        },
    }
</script>

<style scoped>
    .sigil {
        max-width: 100%;
        max-height: 100%;
    }

    .sigil-wrapper {
        height: 90px;
    }

    .house-card:hover {
        cursor: pointer;
    }

    .btn-link:hover {
        cursor: pointer;
    }
</style>