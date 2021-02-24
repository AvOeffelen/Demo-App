export default {

    data() {

        return {

            genderChartColors: {

                man: "#36b0d9",
                vrouw: "#f05151",
                anders: "#68ed64",
                onbekend: "#808080"
            },

            genericChartColors: [

                "#fa7f4b",
                "#e0c31b",
                "#37b356",
                "#e37da2",
                "#4494c2",
                "#36b0d9",
                "#f05151",
                "#68ed64",
                "#808080"
            ]
        };
    },

    methods: {

        transformLabels(labels, chartType) {

            switch (chartType) {

                case "donut":
                    return labels.reduce(
                        (acc, label) => {

                            acc[label] = label;
                            return acc;
                        },
                        {}
                    );
            }
        },

        getLabels(data) {

            return Object.keys(data || {});
        },

        getDataSets(data, keyTransform, valueTransform) {

            return Object.entries(data).reduce(
                (acc, [ key, value ]) => {

                    acc[keyTransform ? keyTransform(key) : key] = valueTransform ? valueTransform(value) : value;
                    return acc;
                },
                {}
            );
        }
    }
};
