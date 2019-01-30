<template>
    <main>

        <b-modal ref="submitModal" hide-footer title="Submit prediction">
            <div class="d-block text-center">
                <h1 class="h4">Would you like to create a group?</h1>
                You can invite your friends to your group to compete with them. If you don't want to create a group,
                then you can always join as many as you'd like in the future!

                <div class="mt-3">
                    <div class="font-weight-bold mb-1">Name of your group</div>
                    <input type="text" class="form-control" v-model="groupName">
                </div>

                <b-alert variant="danger"
                         :show="formErrors.length > 0">
                    <h5>Oops! It looks like there are some errors.</h5>
                    <ul>
                        <div v-for="error in formErrors">
                            <li v-for="message in error.message">{{message}}</li>
                        </div>
                    </ul>
                </b-alert>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <b-btn class="mt-3" variant="outline-secondary" block @click="submitForm(false)">Submit without
                        group
                    </b-btn>
                </div>
                <div class="col-sm-12 col-md-6">
                    <b-btn class="mt-3" variant="outline-primary" block @click="submitForm(true)">Create group</b-btn>
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

        <button @click="openModal" class="btn btn-success btn-block w-100 btn-lg" v-if="progressPercentage === 100">
            <i class="fas fa-paper-plane mr-1"></i> Submit prediction
        </button>

        <table class="table mt-3 table-responsive" style=" display: table;">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Prediction</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="character in characters">
                <td>
                    <img :src="'/img/characters/' + character.image" class="rounded-circle"
                         style="height:100px">
                </td>
                <td class="align-middle">
                    {{ character.name }}
                </td>
                <td class="position-relative col-6 col-sm-12">
                    <div class="d-flex align-items-center justify-content-center position-absolute h-100 w-100">
                        <b-form-group>
                            <b-form-radio-group :id="character.name"
                                                buttons
                                                button-variant="outline-secondary"
                                                :options="options"
                                                @input="changed($event, character.id)"
                                                :name="character.name"/>

                        </b-form-group>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>

        <button @click="openModal" class="btn btn-success btn-block w-100 btn-lg" v-if="progressPercentage === 100">
            <i class="fas fa-paper-plane mr-1"></i> Submit prediction
        </button>

        <div class="position-fixed p-3 card" style="bottom: 10px; right: 10px; z-index: 10"
             v-if="progressPercentage === 100">
            <div class="h4 mb-2 text-center">
                You're all done!
            </div>

            <a href="/prediction/create" class="btn btn-success btn-lg">
                <i class="fas fa-paper-plane mr-1"></i> Submit prediction
            </a>
        </div>
    </main>
</template>

<script>
    export default {
        props: ['characters', 'username'],
        data() {
            return {
                selections: {},
                options: [
                    {text: 'Alive', value: 1},
                    {text: 'Dead', value: 2},
                    {text: 'Becomes a wight', value: 3}
                ],
                progressPercentage: 0,
                groupName: 'Group of ' + this.username,
                createdGroup: null,
                formErrors: []
            }
        },
        mounted() {
            let self = this;
            this.characters.forEach(character => {
                self.selections[character.id] = 1;
            });
            console.log(Object.values(this.selections));
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
            submitForm(createGroup) {
                if (createGroup) {
                    this.createGroup();
                } else {
                    this.createPredictions(false);
                }
            },
            createPredictions(goToGroup) {
                let self = this;
                axios.post('/prediction', this.selections)
                    .then(function (response) {
                        if (goToGroup) {
                            window.location.replace(self.createdGroup.link);
                        } else {
                            window.location.replace('/profile/');
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
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