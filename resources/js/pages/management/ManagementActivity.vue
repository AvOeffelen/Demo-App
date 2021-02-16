<template>
    <div class="w-100 mt-5">
        <div class="bg-body-light p-4">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Activiteiten Overzicht</h1>
                <nav aria-label="breadcrumb" class="flex-sm-00-auto ml-sm-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ $config.app.name }}</li>
                        <li aria-current="page" class="breadcrumb-item">Management</li>
                        <li aria-current="page" class="breadcrumb-item active">Activiteitenoverzicht</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="content content-full">
            <div class="d-flex flex-wrap justify-content-around w-100">
                <div class="info-item col-12 col-sm-6 col-md-3">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Unieke Apparaten</p>
                            <h4 class="mb-0">{{ activityData.uniqueDevices || 0 }}</h4>
                        </div>
                        <i class="fas fa-desktop"></i>
                    </div>
                </div>
                <div class="info-item col-12 col-sm-6 col-md-3">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Kliks Artikelen</p>
                            <h4 class="mb-0">{{ activityData.articleClicks || 0 }}</h4>
                        </div>
                        <i class="fas fa-mouse-pointer"></i>
                    </div>
                </div>
                <div class="info-item col-12 col-sm-6 col-md-3">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Kliks Workshops</p>
                            <h4 class="mb-0">{{ activityData.workshopClicks || 0 }}</h4>
                        </div>
                        <i class="fas fa-mouse-pointer"></i>
                    </div>
                </div>
                <div class="info-item col-12 col-sm-6 col-md-3">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Kliks Tegels</p>
                            <h4 class="mb-0">{{ activityData.tileClicks || 0 }}</h4>
                        </div>
                        <i class="fas fa-mouse-pointer"></i>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row mt-5">
                <div class="col-xs-12 col-md-8 mr-2">
                    <h3>Top Artikel</h3>
                    <BarChart :labels="getLabels(topArticlesUserAgentData ? Object.values(topWorkshopsUserAgentData)[0] : {})" :datasets="getDataSets(topArticlesUserAgentData, null, Object.values)" :chart-colors="genericChartColors"/>
                </div>
                <div class="col-xs-12 col-md-4">
                    <h3>Artikelen</h3>
                    <DoughnutChart v-if="topArticlesData && Object.keys(topArticlesData).length > 0" :labels="transformLabels(getLabels(topArticlesData), 'donut')" :datasets="[ getDataSets(topArticlesData) ]" :chart-colors="genericChartColors"/>
                    <div v-else>
                        <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column-reverse flex-md-row mt-5">
                <div class="col-xs-12 col-md-4">
                    <h3>Workshops</h3>
                    <DoughnutChart v-if="topWorkshopsData && Object.keys(topWorkshopsData).length > 0" :labels="transformLabels(getLabels(topWorkshopsData), 'donut')" :datasets="[ getDataSets(topWorkshopsData) ]" :chart-colors="genericChartColors"/>
                    <div v-else>
                        <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                    </div>
                </div>
                <div class="col-xs-12 col-md-8 mr-2">
                    <h3>Top Workshop</h3>
                    <BarChart :labels="getLabels(topWorkshopsUserAgentData ? Object.values(topWorkshopsUserAgentData)[0] : {})" :datasets="getDataSets(topWorkshopsUserAgentData, null, Object.values)" :chart-colors="genericChartColors"/>
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row mt-5">
                <div class="col-xs-12 col-md-8 mr-2">
                    <h3>Top Tegel</h3>
                    <BarChart :labels="getLabels(topTilesUserAgentData ? topTilesUserAgentData[0] : {})" :datasets="getDataSets(topTilesUserAgentData, null, Object.values)" :chart-colors="genericChartColors"/>
                </div>
                <div class="col-xs-12 col-md-4">
                    <h3>Tegels</h3>
                    <DoughnutChart v-if="topTileData && Object.keys(topTileData).length > 0" :labels="transformLabels(getLabels(topTileData), 'donut')" :datasets="[ getDataSets(topTileData) ]" :chart-colors="genericChartColors"/>
                    <div v-else>
                        <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import AreaChart from "../../components/Management/charts/AreaChart.vue"
import BarChart from "../../components/Management/charts/BarChart.vue"
import LineChart from "../../components/Management/charts/LineChart.vue"
import PieChart from "../../components/Management/charts/PieChart.vue"
import RadarChart from "../../components/Management/charts/RadarChart.vue"
import DoughnutChart from "../../components/Management/charts/DoughnutChart.vue"
import AxiosMixin from "../../mixins/AxiosMixin.js";
import ChartUtilsMixin from "../../mixins/ChartUtilsMixin.js";

export default {

    name: "ManagementActivity",

    mixins: [ AxiosMixin, ChartUtilsMixin ],

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

            activityData: {},

            topArticlesData: {},
            topWorkshopsData: {},
            topTileData: {},

            topArticlesUserAgentData: {},
            topWorkshopsUserAgentData: {},
            topTilesUserAgentData: {}
        };
    },

    beforeMount() {

        this.retrieveAll([

            {
                variable: "activityData",
                url: "/axios/chart/activity-data"
            },

            {
                variable: "topArticlesData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {

                    params: {

                        type: "Article",
                        limit: 5
                    }
                }
            },

            {
                variable: "topArticlesData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {

                    params: {

                        type: "Article",
                        limit: 5
                    }
                }
            },

            {
                variable: "topWorkshopsData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {

                    params: {

                        type: "Workshop",
                        limit: 5
                    }
                }
            },

            {
                variable: "topTileData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {

                    params: {

                        type: "Tile",
                        limit: 5
                    }
                }
            },

            {
                variable: "topArticlesUserAgentData",
                url: "/axios/chart/activity-per-record-per-useragent",
                options: {
                    params: {

                        type: "Article",
                        limit: 5
                    }
                }
            },

            {
                variable: "topWorkshopsUserAgentData",
                url: "/axios/chart/activity-per-record-per-useragent",
                options: {
                    params: {

                        type: "Workshop",
                        limit: 5
                    }
                }
            },

            {
                variable: "topTilesUserAgentData",
                url: "/axios/chart/activity-per-record-per-useragent",
                options: {
                    params: {

                        type: "Tile",
                        limit: 5
                    }
                }
            }
        ]);
    },

    methods: {

        getDemoLabels() {

            return [
                "Tablet",
                "Smartphone",
                "Computer",
                "Overig",
            ];
        },

        getLabelsArticle() {

            return {
                first: "Gratis training: HersenCoach",
                second: "Niet thuiszitten, maar thuisbewegen!",
                third: "Zo krijg je weer sterke longen",
                fourth: "Revalidatie na corona infectie",
                fifth: "Employee invitation registration email reminder"
            }
        },

        getDataSetsBar() {

            return {
                TopArtikel1: [2, 10, 5, 9],
                TopArtikel2: [10, 2, 9, 5],
                TopArtikel3: [9, 5, 2, 10]
            }
        },

        getDataSetsDoughnutArticle() {

            return [
                {
                    first: 40,
                    second: 20,
                    third: 10,
                    fourth: 5,
                    fifth: 3
                }
            ];
        }
    }
}
</script>

<style scoped>

</style>
