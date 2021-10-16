<template>
    <div>
        <Header :user="user" />
        <Content :user="user" />
    </div>
</template>

<script>
    import Header from './Header'
    import Content from './Content'
    export default {
        props: {
            user: Object
        },
        components: {
            Header,
            Content
        },
    }

</script>

<style>
    html,
    body,
    #app {
        background: #f5f5f5;
    }

    .sr-only {
        visibility: hidden;
        width: 0;
        height: 0;
        display: block;
    }

    .page-item.active .page-link {
        background: #f17113 !important;
        border-color: #f17113 !important;
        color: white !important;
    }

    .page-item .page-link:focus {
        box-shadow: 0 0 0 0.2rem #e69155
    }

    .page-item .page-link {
        color: #d15e0b !important;
        border-color: #f17113;
        margin-right: 10px !important;
        width: 40px !important;
        height: 40px !important;
        border-radius: 20px !important;
    }

</style>
