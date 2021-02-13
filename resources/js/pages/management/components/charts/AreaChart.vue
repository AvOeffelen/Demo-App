<script>
import { Line } from "vue-chartjs";

export default {
    name: "LineChart",

    extends: Line,

    props: ['labels', 'datasets'],

    data() {
        return {
            chartColors: {
                male: "#85d8ff",
                female: "#ff7e75",
                other: "#68ed64"
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
                    borderColor: "grey",
                    pointBackgroundColor: "grey",
                    borderWidth: 1,
                    pointBorderColor: "white",
                    backgroundColor: this.chartColors[key],
                    data: value
                };
            });
        }
    }
};
</script>

<style scoped>

</style>
