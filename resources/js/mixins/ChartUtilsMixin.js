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

        getLabelsSorted(data) {

            return Object.keys(data || {}).sort(this.stringSorter);
        },

        getDataSetsSorted(data, keyTransform, valueTransform) {

            return Object.entries(data).map(([key, value]) => {

                return [

                    key,

                    Object.keys(value).sort(this.stringSorter).reduce(

                        (obj, key) => {

                            obj[key] = value[key];
                            return obj;
                        },
                        {}
                    )
                ]
            })
            .reduce(
                (acc, [ key, value ]) => {

                    acc[keyTransform ? keyTransform(key) : key] = valueTransform ? valueTransform(value) : value;
                    return acc;
                },
                {}
            );
        },

        getDataSets(data, keyTransform, valueTransform) {

            return Object.entries(data).reduce(
                (acc, [ key, value ]) => {

                    acc[keyTransform ? keyTransform(key) : key] = valueTransform ? valueTransform(value) : value;
                    return acc;
                },
                {}
            );
        },

        stringSorter(a, b) {

            return this.getStringID(a) - this.getStringID(b);
        },

        getStringID(s) {

            return Array.from(s).reduce(

                (acc, c) => {

                    return acc + c.charCodeAt(0);
                },
                0
            )
            *
            s.length;
        }
    }
};
