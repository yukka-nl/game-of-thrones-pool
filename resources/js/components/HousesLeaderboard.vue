<template>
    <main>
        <span>
            Pledge your sword to one of the houses and compete against each other. <a href="#">Learn more.</a>
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
                        {{ Math.floor(Math.random() * 400) }}
                    </span>
                    </div>
                    <div>
                        <span class="badge badge-primary">0% correct</span>
                    </div>
                </div>
            </div>
        </div>
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