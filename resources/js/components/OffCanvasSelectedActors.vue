<template>
    <div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasSelectedActors"
            aria-labelledby="offcanvasSelectedActorsLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasSelectedActorsLabel"></h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <div class="d-flex align-items-center   mb-2 pb-2 border-bottom" v-for="item in selectedActors"
                    :key="item.id">
                    <img :src="item.manequim" class="rounded me-2" :alt="item.nome" width="60">
                    <h5>{{item.nome}}</h5>
                    <button class="btn btn-danger btn-sm ms-auto" @click="$emit('selectActor', item)">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>

                <button class="btn btn-orange d-block w-100 mt-3" type="button" data-bs-toggle="modal"
                    data-bs-target="#modalProducer" v-if="selectedActors.length">Selecionar produtor</button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            selectedActors: Array
        },
    }

</script>

<style scoped>

</style>
