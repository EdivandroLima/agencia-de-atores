<template>
    <div>
        <div class="card">
            <div class="card-header text-white bg-orange">
                <h5 class="card-title"><i class="bi bi-file-person"></i> Cadastro de Ator</h5>
            </div>
            <div class="card-body">
                <form method="post" @submit.prevent="registerActor($event.target)" enctype="multipart/form-data">
                    <div class="row g-3">

                        <div class="col-12 col-md-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome"
                                :class="{ 'is-invalid': errors.nome }">
                            <div class="invalid-feedback">
                                {{ errors.nome ? errors.nome[0] : '' }}
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="manequim" class="form-label">Manequim:</label>
                            <input class="form-control" type="file" name="manequim" id="manequim"
                                :class="{ 'is-invalid': errors.manequim }">
                            <div class="invalid-feedback">
                                {{ errors.manequim ? errors.manequim[0] : '' }}
                            </div>
                        </div>

                        <div class="col-6 col-md-1">
                            <label for="altura" class="form-label">Altura:</label>
                            <input type="text" v-mask="'#,##m'" v-model="altura" class="form-control" name="altura"
                                id="altura" placeholder="0,00m" :class="{ 'is-invalid': errors.altura }">
                            <div class="invalid-feedback">
                                {{ errors.altura ? errors.altura[0] : '' }}
                            </div>
                        </div>
                        <div class="col-6 col-md-1">
                            <label for="peso" class="form-label">Peso:</label>
                            <input type="text" class="form-control" name="peso" id="peso" placeholder="00"
                                v-mask="'###'" v-model="peso" :class="{ 'is-invalid':
                                errors.peso }">
                            <div class="invalid-feedback">
                                {{ errors.peso ? errors.peso[0] : '' }}
                            </div>
                        </div>

                        <div class="col-6 col-md-1">
                            <label for="sapato" class="form-label">Sapato:</label>
                            <input type="text" class="form-control" name="sapato" id="sapato" v-mask="'##'"
                                placeholder="00" v-model="sapato" :class="{ 'is-invalid': errors.sapato }">
                            <div class="invalid-feedback">
                                {{ errors.sapato ? errors.sapato[0] : '' }}
                            </div>
                        </div>

                        <div class="col-6 col-md-1">
                            <label for="sexo" class="form-label">Sexo:</label>
                            <select class="form-select" id="sexo" name="sexo" :class="{ 'is-invalid': errors.sexo }">
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ errors.sexo ? errors.sexo[0] : '' }}
                            </div>
                        </div>

                        <div class="col-12 col-md-2">
                            <label for="data" class="form-label">Data de nascimento:</label>
                            <div class="col">
                                <input id="data" type="date" name="data_nasc" class="form-control"
                                    :class="{ 'is-invalid': errors.data_nasc }">
                                <div class="invalid-feedback">
                                    {{ errors.data_nasc ? errors.data_nasc[0] : '' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="pele" class="form-label">Pele:</label>
                            <select class="form-select" id="pele" name="pele" :class="{ 'is-invalid': errors.pele }">
                                <option value="">Selecione</option>
                                <option value="Branca"> Branca </option>
                                <option value="Parda">Parda</option>
                                <option value="Preta">Preta</option>
                                <option value="Amarela">Amarela</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ errors.pele ? errors.pele[0] : '' }}
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <label for="olhos" class="form-label">Olhos:</label>
                            <select class="form-select" id="olhos" name="olhos" :class="{ 'is-invalid': errors.olhos }">
                                <option value="">Selecione</option>
                                <option value="Azul">Azul</option>
                                <option value="Cinza">Cinza</option>
                                <option value="Castanho">Castanho</option>
                                <option value="Verde">Verde</option>
                                <option value="Âmbar (ocre ou mel)">Âmbar (ocre ou mel) </option>
                            </select>
                            <div class="invalid-feedback">
                                {{ errors.olhos ? errors.olhos[0] : '' }}
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <label for="cabelo" class="form-label">Cabelo:</label>
                            <select class="form-select" id="cabelo" name="cabelo"
                                :class="{ 'is-invalid': errors.cabelo }">
                                <option value="">Selecione</option>
                                <option value="Pretos">Pretos</option>
                                <option value="Loiros">Loiros</option>
                                <option value="Ruivos">Ruivos</option>
                                <option value="Castanhos">Castanhos</option>
                                <option value="Grisalhos">Grisalhos</option>
                                <option value="Outro">Outro</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ errors.cabelo ? errors.cabelo[0] : '' }}
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="video" class="form-label">Video:</label>
                            <input class="form-control" type="text" name="video" id="video" placeholder="http://"
                                :class="{ 'is-invalid': errors.video }">
                            <div class="invalid-feedback">
                                {{ errors.video ? errors.video[0] : '' }}
                            </div>
                        </div>

                        <div class="col-12 text-end">
                            <button class="btn btn-orange px-4 text-white" type="submit">
                                Cadastrar
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import swal from 'sweetalert';
    import ator from '../services/ator';
    export default {
        data() {
            return {
                altura: '',
                peso: '',
                sapato: '',
                errors: {},
            }
        },
        methods: {
            registerActor(form) {
                let load = this.$loading.show();
                ator.create((new FormData(form))).then(response => {
                    this.errors = {}
                    swal("Ator cadastrado com sucesso!", "", "success");
                    load.hide()
                    form.reset()
                    this.altura = ''
                    this.peso = ''
                    this.sapato = ''
                }).catch(error => {
                    this.errors = error.response.data.errors
                    load.hide()
                })
            }
        },
        metaInfo: {
            title: 'Cadastro de Ator'
        }
    }

</script>

<style scoped>

</style>
