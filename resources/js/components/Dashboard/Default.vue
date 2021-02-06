<template>
    <div>
        <b-row>
            <b-col cols="12">
                <b-form-group size="lg">
                    <b-form-input
                        id="filter-input"
                        v-model="searchString"
                        type="search"
                        placeholder="Waar ben je naar op zoek?">
                    </b-form-input>
                </b-form-group>
            </b-col>
        </b-row>
        <div v-if="searchString != '' && !loading">
            <b-row>
                <b-col cols="12" sm="12" md="12" lg="6" xl="6" v-for="(data,index) in filteredData" :key="index">
                    <a class="block block-transparent bg-image h-286"
                       v-bind:style="[data.image_link  ?
                                    {'background': 'url(' + data.image_link + ')',
                                        'background-position':'center',
                                        'background-size':'cover',
                                        'background-repeat': 'no-repeat'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                       v-bind:href="[data.type === 'workshop' ? '/workshop/'+ data.id+'/show' : '/article/'+ data.id+'/show']"
                       data-toggle="click-ripple">
                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                            <div class="ribbon-box">
                                {{ data.category.display_name }}
                            </div>
                            <div class="pt-4 pb-6 px-md-3">
                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{ data.title }}</h3>
                                <i class="fa fa-calendar appointment-date text-white" aria-hidden="true"
                                   v-if="data.start !== null">
                                    {{ data.start }}
                                </i>
                            </div>
                        </div>
                    </a>
                </b-col>
            </b-row>
        </div>
        <!-- TODO::           WHEN NOT HAPPY WITH THE DESIGN OF THE DEFAULT DASHBOARD REPLACE WITHIN THE COMMENT LINES ADD THE !~!!!!!!!!!V-ELSE!!!!!!!!!!!!!!!-->
        <div class="row py-5" v-else>
            <dashboard></dashboard>
        </div>
        <!--            WHEN NOT HAPPY WITH THE DESIGN OF THE DEFAULT DASHBOARD REPLACE WITHIN THE COMMENT LINES-->
    </div>
</template>

<script>
export default {
    name: "Default",
    data() {
        return {
            loading: false,
            searchString: '',
            dataArray: [],
            workshop: [],
            article: [],
            default_image: 'https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg',
        }
    },
    created() {
        this.loading = true;
        this.getAllWorkshops();
        this.getAllArticles();
    },
    computed: {
        filteredData: function () {
            return this.dataArray.filter((data) => {
                let regex = new RegExp('(' + this.searchString + ')', 'i');
                if (data.title.match(regex) == null) {
                    //    TODO:: Display error message if we want to.
                } else {
                    return data.title.match(regex);
                }
            })
        }
    },
    methods: {
        getAllWorkshops() {
            axios.get('/axios/workshop/get-all')
                .then(response => {
                    this.loading = false;
                    this.workshop = response.data;
                    this.addPropToWorkshopObject();
                })
                .catch(error => {

                });
        },
        getAllArticles() {
            axios.get('/axios/article/get-all-articles-for-standard-categories')
                .then(response => {
                    this.article = response.data.data;
                    this.loading = false;
                    this.addPropsToArticleObject();
                })
                .catch(error => {

                });
        },
        addPropToWorkshopObject() {
            for (let x in this.workshop) {
                this.workshop[x].type = "workshop"
                this.dataArray.push(this.workshop[x])
            }
        },
        addPropsToArticleObject() {
            for (let x in this.article) {
                this.article[x].type = "article"
                this.dataArray.push(this.article[x])
            }
        }
    }
}
</script>

<style scoped>

</style>
