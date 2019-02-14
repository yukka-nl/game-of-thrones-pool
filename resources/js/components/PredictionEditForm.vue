<template>
    <main>
        <div class="position-sticky p-3 card" style="top: 5px; z-index: 10">
            Completion
            <div class="progress">
                <div class="progress-bar" :style="progressBarStyle">
                    {{ progressPercentage }}%
                </div>
            </div>
        </div>

        <div @click="submitForm" class="btn btn-success btn-block w-100 btn-lg mt-3" v-if="showSubmitButton">
            <i class="fas fa-paper-plane mr-1"></i> Update prediction
        </div>

        <table class="table mt-3 table-responsive" style=" display: table;">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Prediction</th>
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
            </tr>
            </tbody>
        </table>

        <div @click="openModal" class="btn btn-success btn-block w-100 btn-lg" v-if="showSubmitButton">
            <i class="fas fa-paper-plane mr-1"></i> Update prediction
        </div>

        <div class="position-fixed p-3 card" style="bottom: 10px; right: 10px; z-index: 10"
             v-if="showSubmitButton">
            <div class="h4 mb-2 text-center">
                You're all set!
            </div>

            <div href="/prediction/create" class="btn btn-success btn-lg" @click="openModal">
                <i class="fas fa-paper-plane mr-1"></i> Update prediction
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        props: ['characters', 'username', 'userId', 'predictions'],
        data() {
            return {
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
                showSubmitButton: false,
                watchForChanges: false,
            }
        },
        mounted() {
            window.onbeforeunload = function () {
                window.scrollTo(0, 0);
            };
            let self = this;
            this.characters.forEach(character => {
                self.selections[character.id] = self.predictions[character.id];
                self.calculateCompletionPercentage();
            });

            // TODO: Replace the timeout
            setTimeout(function () {
                self.watchForChanges = true;
            }, 500);
        },
        methods: {
            changed(value, characterId) {
                this.selections[characterId] = value;
                this.calculateCompletionPercentage();
                if (this.watchForChanges) {
                    console.log("ha");
                    this.showSubmitButton = true;
                }
            },
            calculateCompletionPercentage() {
                let filledInCount = Object.keys(this.selections).filter(x => this.selections[x] !== null).length;
                this.progressPercentage = Math.round((filledInCount / Object.keys(this.selections).length) * 100);
            },
            openModal() {
                this.$refs.submitModal.show();
            },
            submitForm(createGroup) {
                let self = this;
                axios.put('/prediction', this.selections)
                    .then(function (response) {
                        location.reload();
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            },
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