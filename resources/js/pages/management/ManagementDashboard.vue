<template>
    <div class="w-100 mt-5">
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
            <div class="d-flex flex-wrap justify-content-around w-100">
                <div class="info-item col-12 col-sm-6 col-md-3">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Welkom terug</p>
                            <h4 class="mb-0">Dennis Krijgsman</h4>
                        </div>
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="info-item col-12 col-sm-6 col-md-3">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Visits</p>
                            <h4 class="mb-0">10</h4>
                        </div>
                        <i class="fas fa-suitcase"></i>
                    </div>
                </div>
                <div class="info-item col-12 col-sm-6 col-md-3">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">People</p>
                            <h4 class="mb-0">10</h4>
                        </div>
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="info-item col-12 col-sm-6 col-md-3">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Views</p>
                            <h4 class="mb-0">10</h4>
                        </div>
                        <i class="far fa-eye"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="d-flex flex-column flex-md-row mt-5">
                    <div class="col-xs-12 col-md-8 mr-2">
                        <h3>Kliks per geslacht</h3>
                        <AreaChart :labels="getLabels()" :datasets="getDataSetsArea()"/>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Bezoekers geslacht</h3>
                        <DoughnutChart :labels="getLabelsPie()" :datasets="getDataSetsDoughnut()"/>
                    </div>
                </div>
                <div class="d-flex flex-column flex-md-row mt-5">
                    <div class="col-xs-12 col-md-4">
                        <h3>Artikelen</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Workshops</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Tegels</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                </div>
<!--                <BarChart :labels="getLabels()" :datasets="getDataSetsBar()"/>
                <LineChart :labels="getLabels()" :datasets="getDataSetsLine()"/>
                <PieChart :labels="getLabelsPie()" :datasets="getDataSetsPie()"/>
                <RadarChart :labels="getLabels()" :datasets="getDataSetsRadar()"/>-->
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

        getLabelsArticle() {

            return {
                first: "Gratis training: HersenCoach",
                second: "Niet thuiszitten, maar thuisbewegen!",
                third: "Zo krijg je weer sterke longen"
            }
        },

        getLabelsPie() {

            return {
                male: "male",
                female: "female",
                other: "other"
            };
        },

        getDataSetsArea() {

            return {
                male: [40, 39, 10, 40, 39, 80, 40],
                female: [60, 55, 32, 10, 2, 12, 53],
                other: [20, 15, 62, 12, 62, 6, 63]
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
                }
            ];
        },

        getDataSetsDoughnutArticle() {

            return [
                {
                    first: 40,
                    second: 20,
                    third: 10
                }
            ];
        }
    }
}
</script>

<style scoped>

</style>
