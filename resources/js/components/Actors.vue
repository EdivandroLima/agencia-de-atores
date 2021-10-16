<template>
    <div>
        <!-- card person -->
        <div class="card mt-4" id="atores">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">
                        <span class="badge bg-orange  ">{{actors.total}}</span>
                        Atores
                    </h5>
                    <div>
                        <span class="badge bg-light text-dark">Exibindo de {{actors.from}} - {{actors.to}}
                            ({{actors.total}} total)
                        </span>
                    </div>
                </div>
                <hr>

                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-3">

                    <div class="col" v-for="(item, indice) in actors.data" :key="indice">
                        <div class="card">
                            <img :src="item.manequim" class="card-img-top w-100" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{item.nome}}</h5>
                                <div class="card-text small">
                                    Idade: {{item.idade}}anos<br>
                                    Altura: {{item.altura}}<br>
                                    Sapato: {{item.sapato}}<br>
                                    <a :href="item.video" target="_blank">Video</a><br>

                                    <div class="collapse " :id="'collapseMais' + indice">
                                        Peso: {{item.peso}}<br>
                                        Sexo: {{item.sexo}}<br>
                                        Pele: {{item.pele}}<br>
                                        Olhos: {{item.olhos}}<br>
                                        Cabelos: {{item.cabelo}}<br>
                                    </div>
                                    <a class="text-dark" data-bs-toggle="collapse" :href="'#collapseMais' + indice"
                                        role="button" aria-expanded="false" :aria-controls="'collapseMais' + indice">
                                        Mais <i class="bi bi-chevron-down small"></i>
                                    </a>
                                </div>

                                <button class="btn btn-outline-success d-block w-100 btn-sm mt-3"
                                    v-if="user.access_level == 2"
                                    :class="{'active' : selectedActors.find(element => element.id == item.id)}"
                                    type="button" @click="selectActor(item)">
                                    <span class="icon-check">
                                        <i class="bi bi-check-lg"></i>
                                    </span>
                                    <span class="text-selecionar"> Selecionar </span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div> <!-- /row -->


                <div class="mt-4 text-center pt-3">
                    <pagination :data="actors" @pagination-change-page="getActors">
                        <span slot="prev-nav">
                            <i class="bi bi-chevron-double-left"></i>
                            <span class="visually-hidden"> Anterior</span>
                        </span>
                        <span slot="next-nav">
                            <i class="bi bi-chevron-double-right"></i>
                            <span class="visually-hidden">Próximo</span>
                        </span>
                    </pagination>
                </div>

            </div>
        </div>

        <ButtonSelectedActors :selected-actors="selectedActors" />
        <OffCanvasSelectedActors :selected-actors="selectedActors" @selectActor="selectActor($event)" />
        <ModalSelectProducer :selected-actors="selectedActors" />

    </div>
</template>

<script>
    import ator from '../services/ator';
    import ButtonSelectedActors from './ButtonSelectedActors';
    import ModalSelectProducer from './ModalSelectProducer';
    import OffCanvasSelectedActors from './OffCanvasSelectedActors';
    export default {
        data() {
            return {
                actors: {},
                dataSearchParms: '',
                selectedActors: []
            }
        },
        props: {
            user: Object
        },
        components: {
            ButtonSelectedActors,
            ModalSelectProducer,
            OffCanvasSelectedActors
        },
        methods: {
            selectActor(actor) {
                // alternar para add e remover actor clicando no botão 'Selecionar'
                if (this.selectedActors.find(element => element.id == actor.id)) {
                    // remove actor se ele já está no array selectedActors
                    this.selectedActors = this.selectedActors.filter(function (value) {
                        return value.id != actor.id;
                    })
                } else {
                    // add actor ao array selectedActors
                    this.selectedActors.push(actor)
                }
            },
            getActors(page = 1, dataSearchParms = '') {
                if (dataSearchParms != '') {
                    this.dataSearchParms = dataSearchParms
                }
                let load = this.$loading.show();
                ator.search(`?page=${page}&${this.dataSearchParms}`)
                    .then(response => {
                        this.actors = response.data;
                        load.hide()
                        if (page != 1) this.scrollTopActors()
                    });
            },
            scrollTopActors() {
                let top = document.getElementById('atores').offsetTop
                setTimeout(() => {
                    window.scrollTo(0, top)
                }, 200);
            },
        },
        created() {
            this.getActors()
        },
    }

</script>

<style scoped>
    .btn-outline-success:hover {
        background-color: none;
    }

    .btn-outline-success.active .icon-check {
        display: block;
    }

    .btn-outline-success.active .text-selecionar {
        display: none;
    }

    .btn-outline-success .icon-check {
        display: none;
    }

    .btn-outline-success .text-selecionar {
        display: block;
    }

</style>
