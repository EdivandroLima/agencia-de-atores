<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="editProducer" tabindex="-1" aria-labelledby="editProducerLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProducerLabel">Editar produtor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="post" @submit.prevent="updateProducer($event.target)">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row g-3">

                                <div class="col-12">
                                    <label for="name" class="form-label">Nome</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        :class="{ 'is-invalid': errors.name }" :value="dataEditProducer.name">
                                    <div class="invalid-feedback">
                                        {{ errors.name ? errors.name[0] : '' }}
                                    </div>
                                </div>

                                <div class="col-12 ">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        :class="{ 'is-invalid': errors.email }" :value="dataEditProducer.email">
                                    <div class="invalid-feedback">
                                        {{ errors.email ? errors.email[0] : '' }}
                                    </div>
                                </div>

                                <div class="col-12 text-end">
                                    <button class="btn btn-orange px-4" type="submit">
                                        <i class="bi bi-person-plus-fill"></i> Salvar
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import produtor from '../services/produtor'
    export default {
        data() {
            return {
                errors: {},
            }
        },
        props: {
            dataEditProducer: Object
        },
        methods: {
            updateProducer(form) {
                produtor.updateProducer((new FormData(form)), this.dataEditProducer.id).then(response => {
                    swal("Editado com sucesso!", "", "success");
                    this.errors = {}
                    this.$router.go()
                }).catch(error => {
                    this.errors = error.response.data.errors
                })
            },
        },
    }

</script>

<style scoped>

</style>
