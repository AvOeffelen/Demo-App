<script>
import { Line } from "vue-chartjs";

export default {

    name: "LineChart",

    extends: Line,

    props: ['labels', 'datasets'],

    data() {
        return {
            chartColors: {
                male: "rgba(0, 231, 255, 1)",
                female: "rgba(255, 0, 0, 1)",
                other: "rgba(0, 255, 0, 1)"
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
                    pointBackgroundColor: "white",
                    borderWidth: 1,
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
