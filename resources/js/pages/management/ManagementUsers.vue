<template>
<div class="w-100 mt-5">
    <div class="content content-full">
        <div class="d-flex justify-content-around w-100">
            <div class="info-item bg-light m-2 col-3 rounded text-center shadow-sm">
                <h3 class="mb-1">Man</h3>
                <p class="mb-0">12</p>
            </div>
            <div class="info-item bg-light m-2 col-3 rounded text-center shadow-sm">
                <h3 class="mb-1">Vrouw</h3>
                <p class="mb-0">10</p>
            </div>
            <div class="info-item bg-light m-2 col-3 rounded text-center shadow-sm">
                <h3 class="mb-1">Nieuwe gebruikers</h3>
                <p class="mb-0">2</p>
            </div>
            <div class="info-item bg-light m-2 col-3 rounded text-center shadow-sm">
                <h3 class="mb-1">Totaal</h3>
                <p class="mb-0">22</p>
            </div>
        </div>
        <div>
            <div class="col-12 mt-5">
                <h3>Inloggen per maand</h3>
                <LineChart :labels="getLabels()" :datasets="getDataSetsArea()"/>
            </div>
            <div class="d-flex mt-5">
                <div class="col-8 mr-2">
                    <h3>Bezoekers per maand</h3>
                    <BarChart :labels="getLabels()" :datasets="getDataSetsBar()"/>
                </div>
                <div class="col-4">
                    <h3>Bezoekers geslacht</h3>
                    <DoughnutChart :labels="getLabelsPie()" :datasets="getDataSetsDoughnut()"/>
                </div>
            </div>
            <div class="d-flex mt-5">
                <div class="col-4">
                    <h3>Unieke bezoekers geslacht</h3>
                    <DoughnutChart :labels="getLabelsPie()" :datasets="getDataSetsDoughnut()"/>
                </div>
                <div class="col-8 mr-2">
                    <h3>Unieke bezoekers per maand</h3>
                    <BarChart :labels="getLabels()" :datasets="getDataSetsBar()"/>
                </div>
            </div>
            <div class="mt-5">
                <h2>Man</h2>
                <div class="d-flex">
                    <div class="col-4">
                        <h3>Artikelen</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                    <div class="col-4">
                        <h3>Workshops</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                    <div class="col-4">
                        <h3>Tegels</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h2>Vrouw</h2>
                <div class="d-flex">
                    <div class="col-4">
                        <h3>Artikelen</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                    <div class="col-4">
                        <h3>Workshops</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                    <div class="col-4">
                        <h3>Tegels</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h2>Overig</h2>
                <div class="d-flex">
                    <div class="col-4">
                        <h3>Artikelen</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                    <div class="col-4">
                        <h3>Workshops</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                    <div class="col-4">
                        <h3>Tegels</h3>
                        <DoughnutChart :labels="getLabelsArticle()" :datasets="getDataSetsDoughnutArticle()"/>
                    </div>
                </div>
            </div>
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

    name: "ManagementUsers",

    components: {
        AreaChart,
        BarChart,
        LineChart,
        PieChart,
        RadarChart,
        DoughnutChart
    },

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

            return {
                male: "male",
                female: "female",
                other: "other"
            };
        },

        getLabelsArticle() {

            return {
                first: "Gratis training: HersenCoach",
                second: "Niet thuiszitten, maar thuisbewegen!",
                third: "Zo krijg je weer sterke longen"
            }
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

        getDataSetsArea() {

            return {
                male: [40, 39, 10, 40, 39, 80, 40],
                female: [60, 55, 32, 10, 2, 12, 53],
                other: [20, 21, 17, 27, 4, 5, 12]
            };
        },

        getDataSetsBar() {

            return {
                male: [2, 10, 5, 9, 0, 6, 20],
                female: [4, 8, 10, 21, 3, 12, 12],
                other: [8, 4, 5, 12, 14, 9, 6]
            }
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
