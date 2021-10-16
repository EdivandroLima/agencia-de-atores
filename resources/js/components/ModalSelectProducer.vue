<template>
    <div>
        <!-- modal produtores -->
        <div class="modal fade" id="modalProducer" tabindex="-1" aria-labelledby="modalProducerLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalProducerLabel">Selecionar Produtor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" @submit.prevent="sendEmail($event.target)" name="form">
                        <div class="modal-body">

                            <div class="mb-2 pb-2 border-bottom" v-for="item in producers" :key="'p'+item.id">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="email[]" :value="item.email"
                                        :id="'p'+item.id">
                                    <label class="form-check-label" :for="'p'+item.id">
                                        <span class="">{{item.name}}</span>
                                    </label>
                                    <div class="text-muted small">{{item.email}}</div>
                                </div>
                            </div>
                            <input type="hidden" name="atores" :value="JSON.stringify(selectedActors)">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-orange d-block w-100">Enviar e-mail</button>
                        </div>
                    </form>
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
                producers: {},
            }
        },
        props: {
            selectedActors: Array
        },
        methods: {
            sendEmail(form) {
                let load = this.$loading.show();
                let formData = new FormData(form);
                produtor.enviarEmail(formData).then(response => {
                    load.hide()
                    form.reset()
                    swal("Enviado com sucesso!", "", "success");
                }).catch(error => {
                    load.hide()
                    if (error.response.data.errors.email) {
                        swal("Erro!", "Selecione um produtor!", "error");
                    }
                })
            }
        },
        created() {
            produtor.all().then(response => {
                this.producers = response.data
            })
        },
    }

</script>

<style scoped>
    input:checked {
        background-color: rgb(18, 128, 59) !important;
        border-color: rgb(9, 101, 43) !important;
    }

    input:focus {
        box-shadow: 0 0 1rem rgb(18, 128, 59);
    }

</style>
