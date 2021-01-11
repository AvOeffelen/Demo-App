<template>
    <div>
        <h3>Bekijk hieronder de voorbeelden</h3>
        <b-form-select v-model="selected" :options="options"></b-form-select>
        <dashboard-without-text v-if="selected === 1"></dashboard-without-text>
        <dashboard-without-ribbon v-else-if="selected === 2"></dashboard-without-ribbon>
        <default-dashboard v-else></default-dashboard>
    </div>
</template>

<script>

import DashboardWithoutRibbon from './DashboardWithoutRibbon.vue';
import DashboardWithoutText from './DashboardWithoutText.vue';
import DefaultDashboard from './DefaultDashboard.vue';

export default {
  components: { DashboardWithoutRibbon ,DashboardWithoutText, DefaultDashboard },
    name: "Dashboard",
    data() {
        return {
            voorbeeld: 'string',
            selected:0,
            options:[
                { value: 0, text: 'Dashboard foto met titel en ribbon' },
                { value: 1, text: 'Dashboard foto zonder titel met ribbon' },
                { value: 2, text: 'Dashboard foto zonder ribbon met titel' },
            ]
        };
    },
    created() {
        console.log(" dit word aangeroepen vanaf het moment dat dit component initalised word");
        this.functiesMaken();
    },
    methods: {
        functiesMaken() {

        },
        andereFunctiesMaken(){
            this.functiesMaken();
        }
    }
}
</script>

<style scoped>

</style>
