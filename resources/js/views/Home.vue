<template>
    <div>
        <ActorFilter @search="search($event)" />
        <Actors ref="actors" :user="user" />
    </div>
</template>

<script>
    import Actors from '../components/Actors'
    import ActorFilter from '../components/ActorFilter'
    export default {
        components: {
            Actors,
            ActorFilter
        },
        props: {
            user: Object
        },
        methods: {
            search(form) {
                let formData = new FormData(form)
                let dataSearchParms = new URLSearchParams(formData).toString();
                this.$refs.actors.getActors(1, dataSearchParms)
            }
        },
        metaInfo: {
            title: 'Página inicial'
        }
    }

</script>

<style scoped>

</style>
