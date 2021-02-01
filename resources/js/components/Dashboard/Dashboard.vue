<template>
    <div>
        <h3>Bekijk hieronder de voorbeelden</h3>
        <b-form-select v-model="selected" :options="options"></b-form-select>
        <dashboard-without-text v-if="selected === 1"></dashboard-without-text>
        <dashboard-without-ribbon v-else-if="selected === 2"></dashboard-without-ribbon>
        <dashboard-with-round-corners v-else-if="selected === 3"></dashboard-with-round-corners>
        <dashboard-with-own-foto v-else-if="selected === 4"></dashboard-with-own-foto>
        <dashboard-with-hexagon v-else-if="selected === 5"></dashboard-with-hexagon>
        <default-dashboard v-else></default-dashboard>
    </div>
</template>

<script>

import DashboardWithHexagon from './DashboardWithHexagon.vue';
import DashboardWithoutRibbon from './DashboardWithoutRibbon.vue';
import DashboardWithRoundCorners from './DashboardWithRoundCorners.vue';
import DashboardWithoutText from './DashboardWithoutText.vue';
import DashboardWithOwnFoto from './DashboardWithOwnFoto.vue';
import DefaultDashboard from './DefaultDashboard.vue';


export default {
  components: { DashboardWithoutRibbon ,DashboardWithoutText, DefaultDashboard, DashboardWithOwnFoto, DashboardWithRoundCorners,DashboardWithHexagon },
    name: "Dashboard",
    data() {
        return {
            voorbeeld: 'string',
            selected:0,
            options:[
                { value: 0, text: 'Dashboard foto met titel en ribbon' },
                { value: 1, text: 'Dashboard foto zonder titel met ribbon' },
                { value: 2, text: 'Dashboard foto zonder ribbon met titel' },
                { value: 3, text: 'Dashboard met afgeronde hoeken' },
                { value: 4, text: 'Dashboard met uw eigen foto' },
                { value: 5, text: 'Dashboard met Hexagon' },
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
