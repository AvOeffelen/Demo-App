<script>
import { Line } from "vue-chartjs";
import isEqual from "lodash.isequal";

export default {
    name: "LineChart",

    extends: Line,

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
                    labels: this.labels,
                    datasets: this.mapData()
                },
                { responsive: true, maintainAspectRatio: false }
            );
        },

        mapData() {

            return Object.entries(this.datasets).map(([key, value], index) => {
                return {
                    label: key.toUpperCase(),
                    borderColor: "grey",
                    pointBackgroundColor: "grey",
                    borderWidth: 1,
                    pointBorderColor: "white",
                    backgroundColor: Array.isArray(this.chartColors) ? this.chartColors[index] : this.chartColors[key],
                    data: value
                };
            });
        }
    }
};
</script>

<style scoped>

</style>
