<template>
    <div>
        <div class="card">
            <!-- card -->
            <div class="card-header bg-orange">
                <h5 class="card-title text-white"><i class="bi bi-lock"></i> Modificar Senha</h5>
            </div>
            <div class="card-body">
                <form action="post" @submit.prevent="changePassword($event.target)" id="form">
                    <div class="row g-3">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" :value="user.name"
                                disabled="">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="xxemail" class="form-label">Email</label>
                            <input id="xxemail" type="text" class="form-control" :value="user.email" name="xxemail"
                                disabled="">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="senha-atual" class="form-label">Senha atual</label>
                            <input id="senha-atual" type="password" value="" class="form-control"
                                name="current_password" :class="{ 'is-invalid': errors.current_password }" v-model="pass">
                            <div class="invalid-feedback">
                                {{ errors.current_password ? errors.current_password[0] : '' }}
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="nova-senha" class="form-label">Nova senha</label>
                            <input id="nova-senha" type="password" value="" class="form-control" name="password"
                                :class="{ 'is-invalid': errors.password }">
                            <div class="invalid-feedback">
                                {{ errors.password ? errors.password[0] : '' }}
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="password-confirm" class="form-label">Repetir nova senha</label>
                            <input id="password-confirm" type="password" value="" class="form-control"
                                name="password_confirmation" :class="{ 'is-invalid': errors.password_confirmation }">
                            <div class="invalid-feedback">
                                {{ errors.password_confirmation ? errors.password_confirmation[0] : '' }}
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-orange px-4" type="submit" :disabled="load">
                                <span v-if="!load">
                                    <i class="bi bi-shield-lock"></i> Modificar
                                </span>
                                <span class="spinner-border spinner-border-sm" v-if="load" role="status"
                                    aria-hidden="true"></span>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div><!-- /card -->

    </div>
</template>

<script>
    import modificarSenha from '../services/modificar-senha'
    export default {
        data() {
            return {
                load: false,
                pass: '',
                errors: {}
            }
        },
        props: {
            user: Object
        },
        methods: {
            changePassword(form) {
                this.load = true
                modificarSenha.updatePass((new FormData(form))).then(response => {
                    swal("Sucesso!", "Sua senha foi modificada!", "success");
                    this.errors = {}
                    form.reset()
                    this.load = false
                }).catch(error => {
                    this.errors = error.response.data.errors
                    this.load = false
                })
            },
        },
        metaInfo: {
            title: 'Modificar senha'
        },
        mounted() {
            // document.getElementById('form').reset()
            // document.getElementById('senha-atual').value=""
        },
    }

</script>

<style scoped>
    #senha-atual,
    #nova-senha,
    #password-confirm {
        background-color: white !important;
    }

</style>
