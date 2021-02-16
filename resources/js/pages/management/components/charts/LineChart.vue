<script>
import { Line } from "vue-chartjs";

export default {

    name: "LineChart",

    extends: Line,

    props: ['labels', 'datasets'],

    data() {
        return {
            chartColors: {
                male: "#36b0d9",
                female: "#f05151",
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
            {
                responsive: true,
                maintainAspectRatio: false
            }
        );
    },

    methods: {

        mapData() {

            return Object.entries(this.datasets).map(([key, value]) => {
                return {
                    label: key.toUpperCase(),
                    borderColor: this.chartColors[key],
                    pointBackgroundColor: "grey",
                    borderWidth: 2,
                    pointBorderColor: "white",
                    backgroundColor: "transparent",
                    data: value
                };
            });
        }
    }
}
</script>

<style scoped>

</style>
