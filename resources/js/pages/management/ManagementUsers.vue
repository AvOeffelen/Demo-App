<template>
    <div class="w-100 mt-5">
        <div class="bg-body-light p-4">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Gebruikers Overzicht</h1>
                <nav aria-label="breadcrumb" class="flex-sm-00-auto ml-sm-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ $config.app.name }}</li>
                        <li aria-current="page" class="breadcrumb-item">Management</li>
                        <li aria-current="page" class="breadcrumb-item active">Gebruikersoverzicht</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="content content-full">
            <div class="d-flex flex-wrap justify-content-around w-100">
                <div class="info-item col-12 col-sm-6 col-md-3" v-if="userData">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Man</p>
                            <h4 class="mb-0">{{ userData[GenderEnum.MALE] || 0 }}</h4>
                        </div>
                        <i class="fas fa-male"></i>
                    </div>
                </div>
                <div class="info-item col-12 col-sm-6 col-md-3" v-if="userData">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Vrouw</p>
                            <h4 class="mb-0">{{ userData[GenderEnum.FEMALE] || 0 }}</h4>
                        </div>
                        <i class="fas fa-female"></i>
                    </div>
                </div>
                <div class="info-item col-12 col-sm-6 col-md-3" v-if="userData">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Nieuwe Gebruikers</p>
                            <h4 class="mb-0">{{ userData.new || 0 }}</h4>
                        </div>
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="info-item col-12 col-sm-6 col-md-3" v-if="userData">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Totaal</p>
                            <h4 class="mb-0">{{ userTotal || 0 }}</h4>
                        </div>
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="col-12 mt-5">
                    <h3>Inloggen per maand</h3>
                    <LineChart :labels="getLabels(userLoginData ? userLoginData[0] : {})" :datasets="getGenderMonthDataSets(userLoginData)" :chart-colors="genderChartColors"/>
                </div>
                <div class="d-flex flex-column flex-md-row mt-5">
                    <div class="col-xs-12 col-md-8 mr-2">
                        <h3>Bezoekers per maand</h3>
                        <BarChart :labels="getLabels(visitsPerMonthData ? visitsPerMonthData[0] : {})" :datasets="getGenderMonthDataSets(visitsPerMonthData)" :chart-colors="genderChartColors"/>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <h3>Bezoekers geslacht</h3>
                        <DoughnutChart :labels="transformLabels(getLabels(visitsPerMonthGenderData).map(l => GenderFilter.filter(l)), 'donut')" :datasets="[ getGenderDataSets(visitsPerMonthGenderData) ]" :chart-colors="genderChartColors"/>
                    </div>
                </div>
                <div class="d-flex flex-column-reverse flex-md-row mt-5">
                    <div class="col-xs-12 col-md-4">
                        <h3>Unieke bezoekers geslacht</h3>
                        <DoughnutChart :labels="transformLabels(getLabels(visitsPerMonthUniqueGenderData).map(l => GenderFilter.filter(l)), 'donut')" :datasets="[ getGenderDataSets(visitsPerMonthUniqueGenderData) ]" :chart-colors="genderChartColors"/>
                    </div>
                    <div class="col-xs-12 col-md-8 mr-2">
                        <h3>Unieke bezoekers per maand</h3>
                        <BarChart :labels="getLabels(visitsPerMonthUniqueData ? visitsPerMonthUniqueData[0] : {})" :datasets="getGenderMonthDataSets(visitsPerMonthUniqueData)" :chart-colors="genderChartColors"/>
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
                            <DoughnutChart v-if="femaleVisitsPerArticleData && Object.keys(femaleVisitsPerArticleData).length > 0" :labels="transformLabels(getLabels(femaleVisitsPerArticleData), 'donut')" :datasets="[ getDataSets(femaleVisitsPerArticleData) ]" :chart-colors="genericChartColors"/>
                            <div v-else>
                                <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <h3>Workshops</h3>
                            <DoughnutChart v-if="femaleVisitsPerWorkshopData && Object.keys(femaleVisitsPerWorkshopData).length > 0" :labels="transformLabels(getLabels(femaleVisitsPerWorkshopData), 'donut')" :datasets="[ getDataSets(femaleVisitsPerWorkshopData) ]" :chart-colors="genericChartColors"/>
                            <div v-else>
                                <h6>Er zijn momenteel geen gegevens om weer te geven.</h6>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <h3>Tegels</h3>
                            <DoughnutChart v-if="femaleVisitsPerTileData && Object.keys(femaleVisitsPerTileData).length > 0" :labels="transformLabels(getLabels(femaleVisitsPerTileData), 'donut')" :datasets="[ getDataSets(femaleVisitsPerTileData) ]" :chart-colors="genericChartColors"/>
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
    </div>
</template>

<script>
import AreaChart from "../../components/Management/charts/AreaChart.vue";
import BarChart from "../../components/Management/charts/BarChart.vue";
import LineChart from "../../components/Management/charts/LineChart.vue";
import PieChart from "../../components/Management/charts/PieChart.vue";
import RadarChart from "../../components/Management/charts/RadarChart.vue";
import DoughnutChart from "../../components/Management/charts/DoughnutChart.vue";
import GenderEnum from "../../enums/GenderEnum.js";
import GenderFilter from "../../filters/GenderFilter.js";
import AxiosMixin from "../../mixins/AxiosMixin.js";
import ChartUtilsMixin from "../../mixins/ChartUtilsMixin.js";


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

    mixins: [ AxiosMixin, ChartUtilsMixin ],

    data() {
        return {

            GenderFilter,
            GenderEnum,

            loading: true,

            userLoginData: {},
            userData: {},

            visitsPerMonthData: {},
            visitsPerMonthGenderData: {},

            visitsPerMonthUniqueData: {},
            visitsPerMonthUniqueGenderData: {},

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
                variable: "userData",
                url: "/axios/chart/user-data"
            },

            // Login Data
            {
                variable: "userLoginData",
                url: "/axios/chart/user-login-data"
            },

            // Visits
            {
                variable: "visitsPerMonthData",
                url: "/axios/chart/visits-per-month"
            },

            {
                variable: "visitsPerMonthGenderData",
                url: "/axios/chart/visits-per-month-gender"
            },

            // Visits Unique
            {
                variable: "visitsPerMonthUniqueData",
                url: "/axios/chart/visits-per-month-unique"
            },

            {
                variable: "visitsPerMonthUniqueGenderData",
                url: "/axios/chart/visits-per-month-unique-gender"
            },

            //Gender per Record Type
            //Male
            {
                variable: "maleVisitsPerArticleData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.MALE,
                        type: "Article"
                    }
                }
            },

            {
                variable: "maleVisitsPerWorkshopData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.MALE,
                        type: "Workshop"
                    }
                }
            },

            {
                variable: "maleVisitsPerTileData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.MALE,
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

                        gender: GenderEnum.FEMALE,
                        type: "Article"
                    }
                }
            },

            {
                variable: "femaleVisitsPerWorkshopData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.FEMALE,
                        type: "Workshop"
                    }
                }
            },

            {
                variable: "femaleVisitsPerTileData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.FEMALE,
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

                        gender: GenderEnum.OTHER,
                        type: "Article"
                    }
                }
            },

            {
                variable: "otherVisitsPerWorkshopData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.OTHER,
                        type: "Workshop"
                    }
                }
            },

            {
                variable: "otherVisitsPerTileData",
                url: "/axios/chart/visits-per-record-per-gender",
                options: {
                    params: {

                        gender: GenderEnum.OTHER,
                        type: "Tile"
                    }
                }
            },
        ]);
    },

    computed: {

        userTotal() {

            return Object.entries(this.userData).reduce((acc, [ key, count ]) => key !== "new" ? acc + count : acc, 0);
        }
    },

    methods: {

        getGenderDataSets(data) {

            return this.getDataSets(data, GenderFilter.filter);
        },

        getGenderMonthDataSets(data) {

            return this.getDataSets(data, GenderFilter.filter, Object.values);
        }
    }
};
</script>

<style scoped>

</style>
