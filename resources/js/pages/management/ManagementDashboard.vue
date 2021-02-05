<template>
    <span>test</span>
</template>

<script>
export default {

    name: "ManagementDashboard",

    data() {
        return {
            loading: true,

            userTotal: 0,
            likeData: {}
        };
    },

    created() {

        this.getUserTotal();
        this.getLikeData();

        this.loading = false;
    },

    methods: {

        getUserTotal() {

            return axios.get('/axios/management/users/total')
            .then((response) => {

                if(response.status === 200) {

                    this.userTotal = response.data;
                }
            });
        },

        getLikeData() {

            return axios.get('/axios/management/liked')
            .then((response) => {

                if(response.status === 200) {

                    this.likeData = response.data;
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
