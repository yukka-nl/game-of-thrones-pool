<template>
    <main>
        <span :class="labelClasses" @click="showModal">
            {{ labelText }}
        </span>

        <b-modal ref="creditsModal" title="Credits of sigil images" class="text-dark text-left">
            <ul>
                <li v-for="item in items">
                    <strong>{{ item.title}} </strong>:
                    <a :href="item.link" rel="noopener" target="_blank">
                        {{ item.artist }}
                    </a>
                </li>
            </ul>

            <div slot="modal-footer" class="w-100">
                <b-button class="float-right" variant="primary" @click="hideModal">Close</b-button>
            </div>
        </b-modal>
    </main>
</template>

<script>
    export default {
        props: ['labelText', 'textClass'],
        data() {
            return {
                labelClasses: 'btn-link mouse-hover ' + this.textClass,
                items: [
                    {
                        title: "Targaryen of King's Landing",
                        artist: "Abjiklam",
                        link: 'https://awoiaf.westeros.org/index.php/User:Abjiklam'
                    },
                    {
                        title: "Stark of Winterfell",
                        artist: "Abjiklam",
                        link: "https://awoiaf.westeros.org/index.php/File:House_Stark.svg",
                    },
                    {
                        title: "Lannister of Casterly Rock",
                        artist: "Abjiklam",
                        link: "https://awoiaf.westeros.org/index.php/File:House_Lannister.svg",
                    },
                    {
                        title: "Arryn of the Eyrie",
                        artist: "Abjiklam",
                        link: "https://awoiaf.westeros.org/index.php/File:House_Arryn.svg",
                    },
                    {
                        title: "Tully of Riverrun",
                        artist: "Abjiklam",
                        link: "https://awoiaf.westeros.org/index.php/File:House_Tully.svg",
                    },
                    {
                        title: "Greyjoy of Pyke",
                        artist: "Abjiklam",
                        link: "https://awoiaf.westeros.org/index.php/File:House_Greyjoy.svg",
                    },
                    {
                        title: "Baratheon of Storm's End",
                        artist: "Image created for the Blazon Project of the French Wikipedia",
                        link: "https://commons.wikimedia.org/wiki/File:Blason_famille_fr_Dunand1.svg",
                    },
                    {
                        title: "Tyrell of Highgarden",
                        artist: "Abjiklam",
                        link: "https://awoiaf.westeros.org/index.php/File:House_Tyrell.svg",
                    },
                    {
                        title: "Martell of Sunspear",
                        artist: "Abjiklam",
                        link: "https://awoiaf.westeros.org/index.php/File:House_Martell.svg",
                    }
                ]
            }
        },
        methods: {
            showModal() {
                this.$refs.creditsModal.show()
            },
            hideModal() {
                this.$refs.creditsModal.hide()
            }
        }
    }
</script>

<style>
    .mouse-hover:hover {
        cursor: pointer;
    }
</style>