<script>
import { Pie } from "vue-chartjs";
import isEqual from "lodash.isequal";

export default {

    name: "PieChart",

    extends: Pie,

    props: ['labels', 'datasets', "chartColors"],

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

            return this.datasets.map((item) => {

                return {

                    backgroundColor: Array.isArray(this.chartColors)
                        ? this.labels.map((label, index) => this.chartColors[index])
                        : this.labels.map((label) => this.chartColors[label]),

                    data: this.labels.map((label) => item[label])
                }
            });
        }
    }
};
</script>

<style scoped>

</style>
