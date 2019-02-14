<template>
    <div class="text-center mb-3 d-flex align-items-center justify-content-center">
        <div class="dropdown d-inline-block ml-0 ml-md-3">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-danger" v-if="!isOwner" href="#" @click="leaveGroup">
                    Leave group
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['isOwner', 'group'],
        methods: {
            leaveGroup() {
                let self = this;
                axios.post('/groups/leave/' + this.group.slug)
                    .then(function (response) {
                        window.location.href = "/";
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            }
        }
    }
</script>