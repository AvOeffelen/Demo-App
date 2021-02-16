<script>
import { Radar } from "vue-chartjs";
import isEqual from "lodash.isequal";

export default {

    name: "RadarChart",

    extends: Radar,

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
                male: "rgba(0, 231, 255, 0.25)",
                female: "rgba(255, 0, 0, 0.25)",
                other: "rgba(0, 255, 0, 0.25)"
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
                { responsive: true, maintainAspectRatio: false }
            );
        },

        mapData() {

            return Object.entries(this.datasets).map(([key, value], index) => {
                return {
                    label: key.toLowerCase(),
                    backgroundColor: Array.isArray(this.chartColors) ? this.chartColors[index] : this.chartColors[key],
                    borderColor: "#fff",
                    pointBackgroundColor: Array.isArray(this.chartColors) ? this.chartColors[index] : this.chartColors[key],
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
