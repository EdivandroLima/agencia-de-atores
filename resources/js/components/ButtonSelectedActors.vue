<template>
    <div>
        <div class="btn-selected-actors text-end" v-if="selectedActors.length" key="SelectedActors">
            <button type="button" class="btn btn-warning position-relative" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasSelectedActors" aria-controls="offcanvasSelectedActors">
                <i class="bi bi-check2-circle fs-4"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{selectedActors.length}} <span class="visually-hidden">Selecionados</span>
                </span>
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            selectedActors: Array
        }
    }

</script>

<style scoped>
    .btn-selected-actors {
        position: fixed;
        right: 20px;
        bottom: 20px;
        width: 150px;
    }

    .btn-selected-actors button {
        border-radius: 7px !important;
        box-shadow: 0 0 2rem #999;
    }

</style>
