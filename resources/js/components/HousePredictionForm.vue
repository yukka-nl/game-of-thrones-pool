<template>
    <main>

        <b-modal ref="submitModal" hide-footer title="Submit prediction">
            <div class="d-block text-center">
                <h1 class="h4">Submit your house prediction?</h1>
                House predictions are only relevant to the Battle between Houses: they do not count for your individual
                predictions.
            </div>

            <div class="row">

                <div class="col-sm-12 col-md-12">
                    <b-btn class="mt-3" variant="outline-primary" block @click="submitForm()">Submit prediction</b-btn>
                </div>
            </div>
        </b-modal>

        <div class="position-sticky p-3 card" style="top: 5px; z-index: 10">
            Completion
            <div class="progress">
                <div class="progress-bar" :style="progressBarStyle">
                    {{ progressPercentage }}%
                </div>
            </div>
        </div>

        <div @click="openModal" class="btn btn-success btn-block w-100 btn-lg mt-3" v-if="progressPercentage === 100">
            <i class="fas fa-paper-plane mr-1"></i> Submit house prediction
        </div>

        <table class="table mt-3 table-responsive" style=" display: table;">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Prediction</th>
                <th scope="col" class="text-center">
                    <img :src="sigilImagePath + house.image" style="height: 30px;"></img> Current vote
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="character in characters">
                <td class="align-middle">
                    <img :src="'/img/characters/' + character.image" class="rounded-circle character-avatar">
                </td>
                <td class="align-middle">
                    {{ character.name }}
                </td>
                <td class="position-relative col-6 col-sm-12 d-none d-md-table-cell">
                    <div class="d-flex align-items-center justify-content-center position-absolute h-100 w-100">
                        <b-form-group>
                            <b-form-radio-group :id="character.name"
                                                buttons
                                                v-model="selections[character.id]"
                                                button-variant="outline-secondary"
                                                :options="options"
                                                @input="changed($event, character.id)"
                                                :name="character.name"
                            />

                        </b-form-group>
                    </div>
                </td>
                <td class="d-md-none d-table-cell">
                    <b-form-group>
                        <b-form-radio-group :id="character.name"
                                            buttons
                                            v-model="selections[character.id]"
                                            button-variant="outline-secondary"
                                            :options="options"
                                            @input="changed($event, character.id)"
                                            :name="character.name"
                                            stacked
                        />
                    </b-form-group>
                </td>
                <td class="text-center">
                    {{ housePredictionStatus(character) || 'No predictions yet' }}
                    {{ housePredictionPercentage(character, house) }}
                </td>
            </tr>
            </tbody>
        </table>

        <div @click="openModal" class="btn btn-success btn-block w-100 btn-lg" v-if="progressPercentage === 100">
            <i class="fas fa-paper-plane mr-1"></i> Submit house prediction
        </div>

        <div class="position-fixed p-3 card" style="bottom: 10px; right: 10px; z-index: 10"
             v-if="progressPercentage === 100">
            <div class="h4 mb-2 text-center">
                You're all set!
            </div>

            <div href="/prediction/create" class="btn btn-success btn-lg" @click="openModal">
                <i class="fas fa-paper-plane mr-1"></i> Submit house prediction
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        props: ['characters', 'username', 'userId', 'house'],
        data() {
            return {
                sigilImagePath: '/img/sigils/',
                selections: {},
                options: [
                    {text: 'Alive', value: 1},
                    {text: 'Dead', value: 2},
                    {text: 'Dead, becomes a wight', value: 3}
                ],
                progressPercentage: 0,
                groupName: 'Group of ' + this.username,
                createdGroup: null,
                formErrors: [],
            }
        },
        mounted() {
            let self = this;
            this.characters.forEach(character => {
                self.selections[character.id] = null;
            });
        },
        methods: {
            changed(value, characterId) {
                this.selections[characterId] = value;
                this.calculateCompletionPercentage();
            },
            calculateCompletionPercentage() {
                let filledInCount = Object.keys(this.selections).filter(x => this.selections[x] !== null).length;
                this.progressPercentage = Math.round((filledInCount / Object.keys(this.selections).length) * 100);
            },
            openModal() {
                this.$refs.submitModal.show();
            },
            submitForm() {
                let self = this;
                axios.post('/predictions/house', this.selections)
                    .then(function (response) {
                        window.location.replace('/predictions/house/results');
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            },
            housePredictionPercentage(character, house) {
                if (character.predictions.length < 1) {
                    return null;
                }
                return Math.floor((character.predictions[0].total / house.amountOfUsers) * 100) + '%';
            },
            housePredictionStatus(character) {
                if (character.predictions.length < 1) {
                    return null;
                }
                let statusId = character.predictions[0].status_id;
                if (statusId === 1) {
                    return 'Alive';
                } else if (statusId === 2) {
                    return 'Dead';
                } else {
                    return 'Dead, becomes a wight';
                }
            },
            createGroup() {
                let self = this;
                let postData = {
                    'name': this.groupName,
                };
                axios.post('/groups', postData)
                    .then(function (response) {
                        self.createdGroup = response.data;
                        self.createPredictions(true);
                    })
                    .catch(function (error) {
                        if (error.response.status === 422) {
                            var p = error.response.data.errors;
                            for (var key in p) {
                                if (p.hasOwnProperty(key)) {
                                    self.formErrors.push({label: key, message: p[key]});
                                }
                            }
                        } else {
                            console.error(error);
                        }
                    });
            }
        },
        computed: {
            progressBarStyle() {
                return {'width': this.progressPercentage + '%'};
            }
        }
    }
</script>

<style>

    .character-avatar {
        width: 100px;
    }

    @media only screen and (max-width: 600px) {
        .character-avatar {
            width: 50px;
        }
    }
</style>