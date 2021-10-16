<template>
    <div>
        <div class="card">
            <!-- card -->
            <div class="card-header bg-orange">
                <h5 class="card-title text-white"><i class="bi bi-person"></i> Cadastro de Produtor</h5>
            </div>
            <div class="card-body">
                <form action="post" @submit.prevent="registerProducer($event.target)">
                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="name" id="name" class="form-control"
                                :class="{ 'is-invalid': errors.name }">
                            <div class="invalid-feedback">
                                {{ errors.name ? errors.name[0] : '' }}
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input id="email" type="email" class="form-control" name="email"
                                :class="{ 'is-invalid': errors.email }">
                            <div class="invalid-feedback">
                                {{ errors.email ? errors.email[0] : '' }}
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-orange px-4" type="submit">
                                <i class="bi bi-person-plus-fill"></i> Adicionar
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div><!-- /card -->

        <div class="card mt-4">
            <!-- card -->
            <div class="card-header bg-orange text-white d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="bi bi-people"></i> Produtores</h5>
                <span>Total de <strong>{{dataProducers.length}}</strong> </span>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in dataProducers" :key="item.id">
                                <td>{{item.name}}</td>
                                <td>{{item.email}}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm me-2" type="button"
                                        @click="editProducer(item)" data-bs-toggle="modal"
                                        data-bs-target="#editProducer">
                                        <i class="bi bi-pencil-fill"></i> Editar
                                    </button>
                                    <button class="btn btn-danger btn-sm" type="button"
                                        @click="deleteProducer(item.id)">
                                        <i class="bi bi-trash-fill"></i> Remover
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div><!-- /card -->

        <ModalEditProducer :dataEditProducer="dataEditProducer" @setDataProducers="setDataProducers" />

    </div>
</template>

<script>
    import ModalEditProducer from '../components/ModalEditProducer'
    import produtor from '../services/produtor'
    export default {
        data() {
            return {
                dataProducers: {},
                errors: {},
                dataEditProducer: {}
            }
        },
        components: {
            ModalEditProducer
        },
        methods: {
            setDataProducers() {
                let load = this.$loading.show();
                produtor.all().then(response => {
                    this.dataProducers = response.data
                    load.hide()
                });
            },
            registerProducer(form) {
                let load = this.$loading.show();
                produtor.create((new FormData(form))).then(() => {
                    swal("Sucesso!", "Produtor adicionado!", "success");
                    form.reset()
                    this.errors = {}
                    this.setDataProducers();
                    load.hide()
                }).catch(error => {
                    this.errors = error.response.data.errors
                    load.hide()
                })
            },
            editProducer(producer) {
                this.dataEditProducer = producer
            },
            deleteProducer(id) {
                swal({
                        title: "Tem certeza que deseja remover este registro?",
                        text: "",
                        icon: "warning",
                        buttons: ["Cancelar", "Ok"],
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            let load = this.$loading.show();
                            produtor.delete(id).then(() => {
                                this.setDataProducers();
                                swal("", "Registro removido com sucesso!", "success");
                                load.hide()
                            });
                        }
                    });
            }
        },
        metaInfo: {
            title: 'Cadastro de Produtor'
        },
        created() {
            this.setDataProducers()
        },
    }

</script>

<style scoped>

</style>
