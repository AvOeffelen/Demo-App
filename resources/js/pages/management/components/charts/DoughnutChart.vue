<script>
import { Doughnut } from "vue-chartjs";

export default {

    name: "DoughnutChart",

    extends: Doughnut,

    props: ['labels', 'datasets'],

    data() {
        return {
            chartColors: {
                male: "rgba(0, 231, 255, 0.5)",
                female: "rgba(255, 0, 0, 0.5)",
                other: "rgba(0, 255, 0, 0.5)",
                first: "rgba(207,181,59, 0.5)",
                second: "rgba(192,192,192, 0.5)",
                third: "rgba(139,69,19, 0.5)",
                fourth: "rgba(0, 231, 255, 0.25)",
                fifth: "rgba(255, 0, 0, 0.25)"
            }
        };
    },

    mounted() {
        this.renderChart(
            {
                labels: this.mapLabels(),
                datasets: this.mapData()
            },
            { responsive: true, maintainAspectRatio: false }
        );
    },

    methods: {

        mapLabels() {

            return Object.entries(this.labels).map(([key, value]) => {
                return value;
            });
        },

        mapData() {

            return this.datasets.map((item) => {

                return {

                    backgroundColor: Object.entries(this.labels).map(([key, value]) => this.chartColors[key]),
                    data: Object.entries(this.labels).map(([key, value]) => item[key])
                }
            });
        }
    }
};
</script>

<style scoped>

</style>
