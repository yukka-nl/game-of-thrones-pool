<template>
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
                        {{ Math.floor(Math.random() * 400) }}
                    </span>
                </div>
                <div>
                    <span class="badge badge-primary">{{ Math.floor(Math.random() * 101) }}% correct</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                sigilImagePath: '/img/sigils/',
                houses: [
                    {
                        name: 'Baratheon',
                        image: 'baratheon.svg',
                    },
                    {
                        name: 'Arryn',
                        image: 'arryn.svg',
                    },
                    {
                        name: 'Greyjoy',
                        image: 'greyjoy.svg',
                    },
                    {
                        name: 'Lannister',
                        image: 'lannister.svg',
                    },
                    {
                        name: 'Martell',
                        image: 'martell.svg',
                    },
                    {
                        name: 'Stark',
                        image: 'stark.svg',
                    },
                    {
                        name: 'Targaryen',
                        image: 'targaryen.svg',
                    },
                    {
                        name: 'Tully',
                        image: 'tully.svg',
                    },
                    {
                        name: 'Tyrell',
                        image: 'tyrell.svg',
                    },
                    {
                        name: 'Freefolk',
                        image: 'freefolk.svg',
                    },
                ],
            }
        },
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