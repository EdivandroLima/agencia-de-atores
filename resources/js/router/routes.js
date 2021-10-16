import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Home from '../views/Home'
import AddAssistant from '../views/AddAssistant'
import RegisterActor from '../views/RegisterActor'
import RegisterProducer from '../views/RegisterProducer'
import ChangePassword from '../views/ChangePassword'

export default new VueRouter({
    linkExactActiveClass: 'active',
    routes: [{
        path: '/',
        component: Home
    }, {
        path: '/adicionar-assistente',
        component: AddAssistant
    }, {
        path: '/cadastro-de-ator',
        component: RegisterActor
    }, {
        path: '/cadastro-de-produtor',
        component: RegisterProducer
    }, {
        path: '/modificar-senha',
        component: ChangePassword
    },]
})