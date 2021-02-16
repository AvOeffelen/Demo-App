<script>
import { Doughnut } from "vue-chartjs";
import isEqual from "lodash.isequal";

export default {

    name: "DoughnutChart",

    extends: Doughnut,

    props: ['labels', 'datasets'],

    watch: {

        labels: {

            deep: true,

            handler(newData, oldData) {

                if (!isEqual(newData, oldData)) {

                    this.render();
                }
            }
        },

        datasets: {

            deep: true,

            handler(newData, oldData) {

                if (!isEqual(newData, oldData)) {

                    this.render();
                }
            }
        }
    },

    data() {
        return {
            chartColors: {
                male: "#36b0d9",
                female: "#f05151",
                other: "#68ed64",
                first: "#fa7f4b",
                second: "#e0c31b",
                third: "#37b356",
                fourth: "#e37da2",
                fifth: "#4494c2"
            }
        };
    },

    mounted() {

        this.render();
    },

    methods: {

        render() {

            this.renderChart(
                {
                    labels: this.mapLabels(),
                    datasets: this.mapData()
                },
                { responsive: true, maintainAspectRatio: false }
            );
        },

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
