<script>
import { Doughnut } from "vue-chartjs";
import isEqual from "lodash.isequal";

export default {

    name: "DoughnutChart",

    extends: Doughnut,

    props: ['labels', 'datasets', 'chartColors'],

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
        return {};
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

            return this.datasets.map((item, index) => {

                return {

                    backgroundColor: Array.isArray(this.chartColors)
                        ? Object.entries(this.labels).map(([key, value], index) => this.chartColors[index])
                        : Object.entries(this.labels).map(([key, value]) => this.chartColors[key]),

                    data: Object.entries(this.labels).map(([key, value]) => item[key])
                }
            });
        }
    }
};
</script>

<style scoped>

</style>
