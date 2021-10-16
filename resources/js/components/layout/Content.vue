<template>
    <div>
        <div class="container py-4">
            <transition name="fade" mode="out-in">
                <router-view :user="user"></router-view>
            </transition>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: Object
        },
    }
</script>

<style scoped>
    .fade-enter,
    .fade-leave-to {
        opacity: 0
    }

    .fade-enter-active,
    .fade-leave-active {
        transition: opacity .2s;
    }

</style>