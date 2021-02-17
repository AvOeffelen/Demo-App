export default {

    data() {

        return {

            axiosMixin: {

                $loading: false
            },
        }
    },

    methods: {

        async retrieveAll(requests, timeout, noLoad) {

            if (!noLoad) {

                this.$set(this.axiosMixin, "$loading", true);
                //this.$loading = true;
            }

            for (const request of requests) {

                await new Promise(((resolve, reject) => {

                    this.retrieve(request.variable, request.url, request.options, true);

                    if (timeout != null) {

                        setTimeout(
                            () => {

                                resolve(true);
                            },
                            timeout
                        );
                    }
                    else {

                        resolve(true);
                    }
                }));
            }

            if (!noLoad) {

                this.$set(this.axiosMixin, "$loading", false);
                //this.$loading = false;
            }
        },

        async retrieve(variable, url, options, noLoad) {

            try {

                if (!noLoad) {

                    this.$set(this.axiosMixin, "$loading", true);
                    //this.$loading = true;
                }

                const response = await axios.get(url, options);

                if (response.status === 200) {

                    this[variable] = response.data;
                }

                if (!noLoad) {

                    this.$set(this.axiosMixin, "$loading", false);
                    //this.$loading = false;
                }
            }
            catch (e) {

                console.error(e);
            }
        },
    }
}
