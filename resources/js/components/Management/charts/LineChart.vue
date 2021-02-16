<script>
import { Line } from "vue-chartjs";
import isEqual from "lodash.isequal";


export default {

    name: "LineChart",

    extends: Line,

    props: [ "labels", "datasets" ],

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
                other: "#68ed64"
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
                    labels: this.labels,
                    datasets: this.mapData()
                },
                {
                    responsive: true,
                    maintainAspectRatio: false
                }
            );
        },

        mapData() {

            return Object.entries(this.datasets).map(([ key, value ]) => {
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
};
</script>

<style scoped>

</style>
