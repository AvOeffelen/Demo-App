<script>
import { Bar } from "vue-chartjs";
import isEqual from "lodash.isequal";

export default {

    name: "BarChart",

    extends: Bar,

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
                    datasets: this.mapData(),
                },
                { responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [
                            {
                                stacked: false,
                                ticks: {
                                    beginAtZero: true,
                                    min: 0,
                                },
                            }
                        ]
                    }
                }
            );
        },

        mapData() {

            return Object.entries(this.datasets).map(([key, value], index) => {
                return {
                    label: key.toLowerCase(),
                    borderColor: "#fff",
                    pointBackgroundColor: "white",
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
