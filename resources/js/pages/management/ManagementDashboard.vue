<template>
    <div>
        <div class="bg-body-light p-4">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Management Dashboard</h1>
                <nav aria-label="breadcrumb" class="flex-sm-00-auto ml-sm-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">KLANTSAMENVITAAL</li>
                        <li aria-current="page" class="breadcrumb-item">Management</li>
                        <li aria-current="page" class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="content content-full">
            <div class="d-flex justify-content-around w-100">
                <div class="info-item bg-light p-3 rounded text-center">
                   <h3 class="mb-1">Visits</h3>
                    <p class="mb-0">10</p>
                </div>
                <div class="info-item bg-light p-3 rounded text-center">
                    <h3 class="mb-1">People</h3>
                    <p class="mb-0">10</p>
                </div>
                <div class="info-item bg-light p-3 rounded text-center">
                    <h3 class="mb-1">Views</h3>
                    <p class="mb-0">10</p>
                </div>
            </div>
            <div id="app">
                <AreaChart :labels="getLabels()" :datasets="getDataSetsArea()"/>
                <BarChart :labels="getLabels()" :datasets="getDataSetsBar()"/>
                <LineChart :labels="getLabels()" :datasets="getDataSetsLine()"/>
                <PieChart :labels="getLabelsPie()" :datasets="getDataSetsPie()"/>
                <RadarChart :labels="getLabels()" :datasets="getDataSetsRadar()"/>
                <DoughnutChart :labels="getLabelsPie()" :datasets="getDataSetsDoughnut()"/>
            </div>
        </div>
    </div>
</template>

<script>
import AreaChart from "./components/charts/AreaChart.vue"
import BarChart from "./components/charts/BarChart.vue"
import LineChart from "./components/charts/LineChart.vue"
import PieChart from "./components/charts/PieChart.vue"
import RadarChart from "./components/charts/RadarChart.vue"
import DoughnutChart from "./components/charts/DoughnutChart.vue"

export default {

    name: "ManagementDashboard",

    components: {
        AreaChart,
        BarChart,
        LineChart,
        PieChart,
        RadarChart,
        DoughnutChart
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
        },

        getLabels() {

            return [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July"
            ];
        },

        getLabelsPie() {
            return [
              "male",
              "female",
              "other"
            ];
        },

        getDataSetsArea() {

            return {
                male: [40, 39, 10, 40, 39, 80, 40],
                female: [60, 55, 32, 10, 2, 12, 53]
            };
        },

        getDataSetsBar() {

            return {
                male: [2, 10, 5, 9, 0, 6, 20]
            }
        },

        getDataSetsLine() {

            return {
                male: [2, 10, 5, 9, 0, 6, 20]
            };
        },

        getDataSetsPie() {

            return [
                {
                    male: 40,
                    female: 20,
                    other: 10
                },
                {
                    male: 30,
                    female: 60,
                    other: 20
                }
            ];
        },

        getDataSetsRadar() {

            return {
                male: [65, 59, 90, 81, 56, 55, 40],
                female: [28, 48, 40, 19, 96, 27, 100]
            };
        },

        getDataSetsDoughnut() {

            return [
                {
                    male: 40,
                    female: 20,
                    other: 10
                },
                {
                    male: 30,
                    female: 60,
                    other: 20
                }
            ];
        }
    }
}
</script>

<style scoped>

</style>
