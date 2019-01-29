<template>
    <main>
        <Snowf
                :amount="400"
                :size="5"
                :speed="1.5"
                :wind="-3"
                :opacity="0.8"
                :swing="1"
                :image="null"
                :zIndex="-1"
                :resize="true"
                color="#="
        />
    </main>
</template>

<script>
    import Snowf from 'vue-snowf';
    export default {
        components: {
            Snowf
        },
        mounted() {

        }
    }
</script>
