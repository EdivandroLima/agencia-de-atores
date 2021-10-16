<template>
    <div>
        <div class="card">
            <!-- card -->
            <div class="card-header bg-orange">
                <h5 class="card-title text-white"><i class="bi bi-person-plus"></i> Adicionar assistente</h5>
            </div>
            <div class="card-body">
                <form action="post" @submit.prevent="addAssistant($event.target)">
                    <div class="row g-3">

                        <div class="col-12 col-md-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="name" id="name" class="form-control"
                                :class="{ 'is-invalid': errors.name }">
                            <div class="invalid-feedback">
                                {{ errors.name ? errors.name[0] : '' }}
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input id="email" type="email" class="form-control" :class="{ 'is-invalid': errors.email }"
                                name="email">
                            <div class="invalid-feedback">
                                {{ errors.email ? errors.email[0] : '' }}
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="password" class="form-label">Senha</label>
                            <input id="password" type="password" class="form-control"
                                :class="{ 'is-invalid': errors.password }" name="password">
                            <div class="invalid-feedback">
                                {{ errors.password ? errors.password[0] : '' }}
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="password-confirm" class="form-label">Confirmação da senha</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" :class="{ 'is-invalid': errors.password_confirmation }">
                            <div class="invalid-feedback">
                                {{ errors.password_confirmation ? errors.password_confirmation[0] : '' }}
                            </div>
                        </div>

                        <div class="text-end col-12">
                            <button class="btn btn-orange px-4" type="submit">
                                <i class="bi bi-person-plus-fill"></i> Adicionar
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- /card -->

        <div class="card mt-4">
            <!-- card -->
            <div class="card-header bg-orange text-white">
                <h5 class="card-title"><i class="bi bi-person-check"></i> Assistentes</h5>
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
                            <tr v-for="item in dataAssistant" :key="item.id">
                                <td>{{item.name}}</td>
                                <td>{{item.email}}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" type="button"
                                        @click="deleteAssistant(item.id)">
                                        <i class="bi bi-trash-fill"></i> Remover
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div><!-- /card -->
    </div>
</template>

<script>
    import assistente from '../services/assistente'
    export default {
        data() {
            return {
                dataAssistant: {},
                errors: {}
            }
        },
        methods: {
            setDataAssistants() {
                let load = this.$loading.show();
                assistente.all().then(response => {
                    this.dataAssistant = response.data
                    load.hide()
                });
            },
            addAssistant(form) {
                let load = this.$loading.show();
                assistente.create((new FormData(form))).then(() => {
                    swal("Sucesso!", "Assistente foi adicionado!", "success");
                    form.reset()
                    this.errors = {}
                    this.setDataAssistants();
                    load.hide()
                }).catch(error => {
                    this.errors = error.response.data.errors
                    load.hide()
                })
            },
            deleteAssistant(id) {
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
                            assistente.delete(id).then(() => {
                                this.setDataAssistants();
                                swal("", "Registro removido com sucesso!", "success");
                                load.hide()
                            });
                        }
                    });
            }
        },
        metaInfo: {
            title: 'Adicionar assistente'
        },
        created() {
            this.setDataAssistants()
        },
    }

</script>

<style scoped>

</style>
