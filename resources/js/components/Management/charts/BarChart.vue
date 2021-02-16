<script>
import { Bar } from "vue-chartjs";
import isEqual from "lodash.isequal";

export default {

    name: "BarChart",

    extends: Bar,

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
                other: "rgba(0, 255, 0, 0.25)",
                TopArtikel: "#8dcdf2"
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

            return Object.entries(this.datasets).map(([key, value]) => {
                return {
                    label: key.toUpperCase(),
                    borderColor: "#fff",
                    pointBackgroundColor: "white",
                    borderWidth: 1,
                    pointBorderColor: "white",
                    backgroundColor: this.chartColors[key],
                    data: value
                };
            });
        }
    }
};
</script>

<style scoped>

</style>
