export default {

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

                (acc, [key, value]) => {

                    acc[keyTransform ? keyTransform(key) : key] = valueTransform ? valueTransform(value) : value;
                    return acc;
                },
                {}
            );
        },
    }
}
