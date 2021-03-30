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
                            <h4 class="mb-0">{{ userData[GenderEnum.MAN] || 0 }}</h4>
                        </div>
                        <i class="fas fa-male"></i>
                    </div>
                </div>
                <div class="info-item col-12 col-sm-6 col-md-3" v-if="userData">
                    <div class="p-2 bg-light w-100 rounded shadow-sm d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">Vrouw</p>
                            <h4 class="mb-0">{{ userData[GenderEnum.VROUW] || 0 }}</h4>
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
                    <h3>Totale inloggen per maand</h3>
                    <LineChart :labels="getLabels(userLoginData ? Object.values(userLoginData)[0] : {})" :datasets="getGenderMonthDataSets(userLoginData)" :chart-colors="genderChartColors"/>
                </div>
<!--                <div class="col-12 mt-5">-->
<!--                    <h3>Unieke inloggen per maand</h3>-->
<!--                    <LineChart :labels="getLabels(uniqueUserLoginData ? Object.values(uniqueUserLoginData)[0] : {})" :datasets="getGenderMonthDataSets(uniqueUserLoginData)" :chart-colors="genderChartColors"/>-->
<!--                </div>-->
                <div class="d-flex flex-column-reverse flex-md-row mt-5">
                    <div class="col-12 mr-2">
                        <h3>Unieke bezoekers per maand</h3>
                        <BarChart :labels="getLabels(visitsPerMonthUniqueData ? Object.values(visitsPerMonthUniqueData)[0] : {})" :datasets="getGenderMonthDataSets(visitsPerMonthUniqueData)" :chart-colors="genderChartColors"/>
                    </div>
                </div>
<!--                <div class="col-12 mt-5">-->
<!--                    <h3>Apparaten per geslacht</h3>-->
<!--                    <BarChart :labels="getLabelsSorted(genderPerRecordTypePerUseragent ? Object.values(genderPerRecordTypePerUseragent)[0] : {})" :datasets="getGenderMonthDataSetsSorted(genderPerRecordTypePerUseragent)" :chart-colors="genderChartColors"/>-->
<!--                </div>-->
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
            uniqueUserLoginData: {},

            visitsPerMonthData: {},
            visitsPerMonthGenderData: {},

            visitsPerMonthUniqueData: {},
            visitsPerMonthUniqueGenderData: {},

            genderPerRecordTypePerUseragent: {},
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

            {
                variable: "uniqueUserLoginData",
                url: "/axios/chart/unique-user-login-data"
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

            // Devices per gender
            {
                variable: "genderPerRecordTypePerUseragent",
                url: "/axios/chart/gender-per-record-per-useragent"
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
        },

        getGenderMonthDataSetsSorted(data) {

            return this.getDataSetsSorted(data, GenderFilter.filter, Object.values);
        }
    }
};
</script>

<style scoped>

</style>
