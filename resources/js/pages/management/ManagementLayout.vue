<template>
    <router-view></router-view>
</template>

<script>
export default {

    name: "ManagementLayout",

    data() {
        return {

            loading: true,

            userData: {}
        };
    },

    created() {

        console.log("TEST")
    },

    methods: {


    }
}
</script>

<style scoped>

</style>
