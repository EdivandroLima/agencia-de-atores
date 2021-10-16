<template>
    <div>

        <div class="card">
            <div class="card-header text-white bg-orange">
                <h5 class="card-title"><i class="bi bi-filter"></i> Filtro</h5>
            </div>
            <!-- card -->
            <div class="card-body">

                <form method="get" @submit.prevent="$emit('search', $event.target)" id="form-search">
                    <div class="row g-3">

                        <div class="col-12 col-md-4">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>

                        <div class="col-6 col-md-1">
                            <label for="altura" class="form-label">Altura:</label>
                            <input type="text" v-mask="'#,##m'" v-model="altura" class="form-control" name="altura"
                                id="altura" placeholder="0,00m">
                        </div>

                        <div class="col-6 col-md-1">
                            <label for="peso" class="form-label">Peso:</label>
                            <input type="text" class="form-control" name="peso" id="peso" placeholder="00"
                                v-mask="'###'" v-model="peso">
                        </div>

                        <div class="col-6 col-md-1">
                            <label for="sapato" class="form-label">Sapato:</label>
                            <input type="text" class="form-control" name="sapato" id="sapato" v-mask="'##'"
                                placeholder="00" v-model="sapato">
                        </div>

                        <div class="col-6 col-md-3">
                            <label for="sexo" class="form-label">Sexo:</label>
                            <select class="form-select" id="sexo" name="sexo">
                                <option value="" selected>Todos</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-2">
                            <div class="row g-1 align-item-center">
                                <label for="idade" class="form-label">Idade entre:</label>
                                <div class="col">
                                    <select class="form-select col-auto" id="idade" name="idade_1">
                                        <option v-for="item in 100" :key="item" :value="item" :selected="item == 1">
                                            {{item}}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-1 p-0 text-center">
                                    -
                                </div>
                                <div class="col">
                                    <select class="form-select col-auto" name="idade_2">
                                        <option v-for="item in 100" :key="item" :value="item" :selected="item == 100 ">
                                            {{item}}
                                        </option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="pele" class="form-label">Pele:</label>
                            <select class="form-select" id="pele" name="pele">
                                <option value="" selected>Todos</option>
                                <option value="Branca"> Branca </option>
                                <option value="Parda">Parda</option>
                                <option value="Preta">Preta</option>
                                <option value="Amarela">Amarela</option>
                            </select>
                        </div>

                        <div class="col-6 col-md-3">
                            <label for="olhos" class="form-label">Olhos:</label>
                            <select class="form-select" id="olhos" name="olhos">
                                <option value="" selected>Todos</option>
                                <option value="Azul">Azul</option>
                                <option value="Cinza">Cinza</option>
                                <option value="Castanho">Castanho</option>
                                <option value="Verde">Verde</option>
                                <option value="Âmbar (ocre ou mel)">Âmbar (ocre ou mel) </option>
                            </select>
                        </div>

                        <div class="col-6 col-md-3">
                            <label for="cabelo" class="form-label">Cabelo:</label>
                            <select class="form-select" id="cabelo" name="cabelo">
                                <option value="" selected>Todos</option>
                                <option value="Pretos">Pretos</option>
                                <option value="Loiros">Loiros</option>
                                <option value="Ruivos">Ruivos</option>
                                <option value="Castanhos">Castanhos</option>
                                <option value="Grisalhos">Grisalhos</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="Status" class="form-label">Status:</label>
                            <select class="form-select" id="Status" name="status">
                                <option value="1">Ativo</option>
                                <option value="0">Desativado</option>
                            </select>
                        </div>

                        <div class="col-12 text-end">
                            <button class="btn btn-secondary me-2 px-4 text-white" type="button" @click="formReset">
                                Reset
                            </button>
                            <button class="btn btn-orange px-4 text-white" type="submit">
                                Buscar
                            </button>
                        </div>

                    </div>
                </form>

            </div>
            <!--/ card -->
        </div>

    </div>
</template>

<script>
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
            formReset() {
                document.getElementById('form-search').reset()
            }
        },
    }

</script>

<style scoped>

</style>
