<script>
import { Doughnut } from "vue-chartjs";

export default {

    name: "DoughnutChart",

    extends: Doughnut,

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

            return this.datasets.map((item) => {

                return {

                    backgroundColor: this.labels.map((label) => this.chartColors[label]),
                    data: this.labels.map((label) => item[label])
                }
            });
        }
    }
};
</script>

<style scoped>

</style>
