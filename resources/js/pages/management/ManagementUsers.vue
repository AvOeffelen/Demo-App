<template>

</template>

<script>
export default {

    name: "ManagementUsers",

    data() {
        return {

            loading: true,

            userData: {}
        };
    },

    created() {

        this.getUserData();
    },

    methods: {

        getUserData() {

            axios.get('/axios/management/userData')
            .then(response => {

                if (response.status === 200) {

                    this.userData = response.data;
                }
            })
            .catch(error => {

                console.error(error);
            });
        },
    }
}
</script>

<style scoped>

</style>
