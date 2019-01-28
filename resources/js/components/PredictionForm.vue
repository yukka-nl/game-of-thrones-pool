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
                <td class="position-relative col-6">
                    <div class="d-flex align-items-center justify-content-center position-absolute h-100 w-100">
                        <b-form-group>
                            <b-form-radio-group :id="character.name"
                                                buttons
                                                button-variant="outline-secondary"
                                                :options="options"
                                                @input="changed($event, character.name)"
                                                :name="character.name"/>

                        </b-form-group>
                    </div>

                </td>
            </tr>

            </tbody>
        </table>
    </main>
</template>

<script>
    export default {
        props: ['characters'],
        data() {
            return {
                selections: {},
                options: [
                    {text: 'Alive', value: 'alive'},
                    {text: 'Dead', value: 'dead'},
                    {text: 'Becomes a wight', value: 'wight'}
                ],
                progressPercentage: 0,
            }
        },
        mounted() {
            let self = this;
            this.characters.forEach(character => {
                self.selections[character.name] = null;
            });
            console.log(Object.values(this.selections));
        },
        methods: {
            changed(value, name) {
                this.selections[name] = value;
                this.calculateCompletionPercentage();
            },
            calculateCompletionPercentage() {
                let filledInCount = Object.keys(this.selections).filter(x=>this.selections[x]!==null).length;
                this.progressPercentage =  Math.round((filledInCount / Object.keys(this.selections).length) * 100);
            }
        },
        computed: {
            progressBarStyle() {
                return { 'width': this.progressPercentage + '%' };
            }
        }
    }
</script>
