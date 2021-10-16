<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">Agência</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link">Página inicial</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/cadastro-de-ator" class="nav-link">Cadastro de ator</router-link>
                        </li>
                        <li class="nav-item" v-if="user.access_level == 2">
                            <router-link to="/cadastro-de-produtor" class="nav-link">Cadastro
                                de produtor</router-link>
                        </li>
                        <li class="nav-item" v-if="user.access_level == 2">
                            <router-link to="/adicionar-assistente" class="nav-link">Adicionar assistente</router-link>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdwonUser" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle fs-5"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdwonUser">

                                <li class="">
                                    <h6 class="dropdown-header p-1 text-center">
                                        {{user.name}}
                                        <small class="text-danger d-block" style="font-size: 11px"
                                            v-if="user.access_level == 2">Admin</small>
                                        <small class="text-danger d-block" style="font-size: 11px"
                                            v-else>Assistente</small>
                                    </h6>
                                    <!-- {{user.name}}<br> -->

                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <router-link to="/modificar-senha" class="dropdown-item">
                                        Modificar Senha
                                    </router-link>
                                </li>
                                <li><a class="dropdown-item" href="#" @click.prevent="logout">Sair</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        props: {
            user: Object
        },
        methods: {
            logout() {
                axios.post('/logout').then(() => {
                    window.location.href = '/'
                })
            },
        },
    }

</script>

<style scoped>
    .navbar-light .navbar-nav .nav-link.active,
    .navbar-light .navbar-nav .show>.nav-link {
        color: #f17113;
    }

    .nav-link:hover {
        color: #f17113 !important
    }

    .nav-link {
        text-transform: uppercase;
    }

</style>
