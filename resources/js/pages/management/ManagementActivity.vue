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
                            <p class="mb-1">Meest gebruikte apparaat</p>
                            <h4 class="mb-0">{{ activityData.topDevice || "Laden..." }}</h4>
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
            <div class="d-flex mt-5">
                <div class="col-xs-12 col-md-4">
                    <h3>Artikelen</h3>
                    <PieChart v-if="topArticlesData && Object.keys(topArticlesData).length > 0" :labels="getLabels(topArticlesData)" :datasets="[ getDataSets(topArticlesData) ]" :chart-colors="genericChartColors"/>
                    <div v-else>
                        <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <h3>Workshops</h3>
                    <PieChart v-if="topWorkshopsData && Object.keys(topWorkshopsData).length > 0" :labels="getLabels(topWorkshopsData)" :datasets="[ getDataSets(topWorkshopsData) ]" :chart-colors="genericChartColors"/>
                    <div v-else>
                        <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <h3>Tegels</h3>
                    <PieChart v-if="topTileData && Object.keys(topTileData).length > 0" :labels="getLabels(topTileData)" :datasets="[ getDataSets(topTileData) ]" :chart-colors="genericChartColors"/>
                    <div v-else>
                        <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h2>Man</h2>
                <div class="d-flex flex-column flex-md-row">
                    <div class="col-xs-12 col-md-4">
                        <h3>Artikelen</h3>
                        <DoughnutChart v-if="maleVisitsPerArticleData && Object.keys(maleVisitsPerArticleData).length > 0" :labels="transformLabels(getLabels(maleVisitsPerArticleData), 'donut')" :datasets="[ getDataSets(maleVisitsPerArticleData) ]" :chart-colors="genericChartColors"/>
                        <div v-else>
                            <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Workshops</h3>
                        <DoughnutChart v-if="maleVisitsPerWorkshopData && Object.keys(maleVisitsPerWorkshopData).length > 0" :labels="transformLabels(getLabels(maleVisitsPerWorkshopData), 'donut')" :datasets="[ getDataSets(maleVisitsPerWorkshopData) ]" :chart-colors="genericChartColors"/>
                        <div v-else>
                            <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Tegels</h3>
                        <DoughnutChart v-if="maleVisitsPerTileData && Object.keys(maleVisitsPerTileData).length > 0" :labels="transformLabels(getLabels(maleVisitsPerTileData), 'donut')" :datasets="[ getDataSets(maleVisitsPerTileData) ]" :chart-colors="genericChartColors"/>
                        <div v-else>
                            <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h2>Vrouw</h2>
                <div class="d-flex flex-column flex-md-row">
                    <div class="col-xs-12 col-md-4">
                        <h3>Artikelen</h3>
                        <PieChart v-if="femaleVisitsPerArticleData && Object.keys(femaleVisitsPerArticleData).length > 0" :labels="getLabels(femaleVisitsPerArticleData)" :datasets="[ getDataSets(femaleVisitsPerArticleData) ]" :chart-colors="genericChartColors"/>
                        <div v-else>
                            <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Workshops</h3>
                        <PieChart v-if="femaleVisitsPerWorkshopData && Object.keys(femaleVisitsPerWorkshopData).length > 0" :labels="getLabels(femaleVisitsPerWorkshopData)" :datasets="[ getDataSets(femaleVisitsPerWorkshopData) ]" :chart-colors="genericChartColors"/>
                        <div v-else>
                            <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Tegels</h3>
                        <PieChart v-if="femaleVisitsPerTileData && Object.keys(femaleVisitsPerTileData).length > 0" :labels="getLabels(femaleVisitsPerTileData)" :datasets="[ getDataSets(femaleVisitsPerTileData) ]" :chart-colors="genericChartColors"/>
                        <div v-else>
                            <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h2>Overig</h2>
                <div class="d-flex flex-column flex-md-row">
                    <div class="col-xs-12 col-md-4">
                        <h3>Artikelen</h3>
                        <DoughnutChart v-if="otherVisitsPerArticleData && Object.keys(otherVisitsPerArticleData).length > 0" :labels="transformLabels(getLabels(otherVisitsPerArticleData), 'donut')" :datasets="[ getDataSets(otherVisitsPerArticleData) ]" :chart-colors="genericChartColors"/>
                        <div v-else>
                            <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Workshops</h3>
                        <DoughnutChart v-if="otherVisitsPerWorkshopData && Object.keys(otherVisitsPerWorkshopData).length > 0" :labels="transformLabels(getLabels(otherVisitsPerWorkshopData), 'donut')" :datasets="[ getDataSets(otherVisitsPerWorkshopData) ]" :chart-colors="genericChartColors"/>
                        <div v-else>
                            <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Tegels</h3>
                        <DoughnutChart v-if="otherVisitsPerTileData && Object.keys(otherVisitsPerTileData).length > 0" :labels="transformLabels(getLabels(otherVisitsPerTileData), 'donut')" :datasets="[ getDataSets(otherVisitsPerTileData) ]" :chart-colors="genericChartColors"/>
                        <div v-else>
                            <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                        </div>
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
import GenderEnum from "../../enums/GenderEnum";

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
            topTilesUserAgentData: {},

            maleVisitsPerArticleData: {},
            maleVisitsPerWorkshopData: {},
            maleVisitsPerTileData: {},

            femaleVisitsPerArticleData: {},
            femaleVisitsPerWorkshopData: {},
            femaleVisitsPerTileData: {},

            otherVisitsPerArticleData: {},
            otherVisitsPerWorkshopData: {},
            otherVisitsPerTileData: {},
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
                        limit: 3
                    }
                }
            },

            {
                variable: "topWorkshopsUserAgentData",
                url: "/axios/chart/activity-per-record-per-useragent",
                options: {
                    params: {

                        type: "Workshop",
                        limit: 3
                    }
                }
            },

            {
                variable: "topTilesUserAgentData",
                url: "/axios/chart/activity-per-record-per-useragent",
                options: {
                    params: {

                        type: "Tile",
                        limit: 3
                    }
                }
            },

            //Gender per Record Type
            //Male
            {
                variable: "maleVisitsPerArticleData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.MAN,
                        type: "Article"
                    }
                }
            },

            {
                variable: "maleVisitsPerWorkshopData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.MAN,
                        type: "Workshop"
                    }
                }
            },

            {
                variable: "maleVisitsPerTileData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.MAN,
                        type: "Tile"
                    }
                }
            },

            //Female
            {
                variable: "femaleVisitsPerArticleData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.VROUW,
                        type: "Article"
                    }
                }
            },

            {
                variable: "femaleVisitsPerWorkshopData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.VROUW,
                        type: "Workshop"
                    }
                }
            },

            {
                variable: "femaleVisitsPerTileData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.VROUW,
                        type: "Tile"
                    }
                }
            },

            //Other
            {
                variable: "otherVisitsPerArticleData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.ANDERS,
                        type: "Article"
                    }
                }
            },

            {
                variable: "otherVisitsPerWorkshopData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.ANDERS,
                        type: "Workshop"
                    }
                }
            },

            {
                variable: "otherVisitsPerTileData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.ANDERS,
                        type: "Tile"
                    }
                }
            },
        ]);
    }
}
</script>

<style scoped>

</style>
