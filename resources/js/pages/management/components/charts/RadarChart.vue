<script>
import { Radar } from "vue-chartjs";

export default {

    name: "RadarChart",

    extends: Radar,

    props: ['labels', 'datasets'],

    data() {
        return {
            chartColors: {
                male: "rgba(0, 231, 255, 0.25)",
                female: "rgba(255, 0, 0, 0.25)",
                other: "rgba(0, 255, 0, 0.25)"
            }
        };
    },

    mounted() {

        this.renderChart(
            {
                labels: this.labels,
                datasets: this.mapData()
            },
            { responsive: true, maintainAspectRatio: false }
        );
    },

    methods: {

        mapData() {

            return Object.entries(this.datasets).map(([key, value]) => {
                return {
                    label: key.toUpperCase(),
                    backgroundColor: this.chartColors[key],
                    borderColor: "#fff",
                    pointBackgroundColor: this.chartColors[key],
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(179,181,198,1)",
                    data: value
                };
            });
        }
    }
};
</script>

<style scoped>

</style>
