<script>
import { Bar } from "vue-chartjs";

export default {

    name: "BarChart",

    extends: Bar,

    props: ['labels', 'datasets'],

    data() {
        return {
            chartColors: {
                male: "rgba(0, 231, 255, 0.25)",
                female: "rgba(255, 0, 0, 0.25)",
                other: "rgba(0, 255, 0, 0.25)",
                TopArtikel: "rgba(207,181,59, 0.5)"
            }
        };
    },

    mounted() {
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
                            stacked: true,
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

    methods: {

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
