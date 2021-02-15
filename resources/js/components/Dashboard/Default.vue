<template>
    <div>
        <div class="col-md-12 text-center">
                <p class="text-orange">Deze Bravis Samen Vitaal Gids is uitsluitend bestemd voor medewerkers van Bravis ziekenhuizen. Deze Gids helpt om gezond & vitaal te blijven, je persoonlijke ontwikkeling te stimuleren, te werken aan de balans werk & privé en inzetbaarheid en werkplezier in iedere levensfase te versterken.</p>
            </div>
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
                                    {'background': 'url(/' + data.image_link + ')',
                                        'background-position':'center',
                                        'background-size':'cover',
                                        'background-repeat': 'no-repeat'} :
                                     {'background-image': 'url(/'+ default_image +')'}]"
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
            <div
                class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-sm-1 order-1"
                data-toggle="appear">
                <a class="
                        block
                        block-transparent
                        block-link-pop
                        w-100
                        h-250
                        d-md-flex
                        align-items-md-stretch
                        bg-image
                        homepage-block
                        left-tile"
                   style="
                        background-image : url('/storage/vakken/Vak01.jpg');
                    "
                   data-toggle="click-ripple"
                   href="/activiteitenkalender"
                >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                        <div class="ribbon-box">
                            Activiteitenkalender
                        </div>
                        <div class="pt-4 pb-6 px-md-3">
                            <h3 class="h1 font-w700 text-white mb-1">Activiteitenkalender</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-2 order-lg-2 order-md-5 order-sm-5 order-5"
                data-toggle="appear">
                <a class="
                        block
                        block-transparent
                        block-link-pop
                        w-100
                        h-250
                        d-md-flex
                        align-items-md-stretch
                        bg-image
                        homepage-block
                        right-tile"
                   style="
                    background-image : url('/storage/vakken/Vak02.jpg');
                    "
                   data-toggle="click-ripple"
                   href="/workshop"
                >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                        <div class="ribbon-box">
                            Workshops
                        </div>
                        <div class="pt-4 pb-6 px-md-3">
                            <h3 class="h1 font-w700 text-white mb-1">Workshops</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-3 order-lg-3 order-md-2 order-sm-2 order-2"
                data-toggle="appear">
                <a class="
                        block
                        block-transparent
                        block-link-pop
                        w-100
                        h-250
                        d-md-flex
                        align-items-md-stretch
                        bg-image
                        homepage-block
                        left-tile"
                   style="
                    background-image : url('/storage/vakken/Vak03.jpg');
                    "
                   data-toggle="click-ripple"
                   href="/one-on-one"
                >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                        <div class="ribbon-box">
                            Persoonlijke begeleiding
                        </div>
                        <div class="pt-4 pb-6 px-md-3">
                            <h3 class="h1 font-w700 text-white mb-1">Persoonlijke begeleiding</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-4 order-lg-4 order-md-6 order-sm-6 order-6"
                data-toggle="appear">
                <a class="
                        block
                        block-transparent
                        block-link-pop
                        w-100
                        h-250
                        d-md-flex
                        align-items-md-stretch
                        bg-image
                        homepage-block
                        right-tile"
                   style="
                    background-image : url('/storage/vakken/Vak04.jpg');
                    "
                   data-toggle="click-ripple"
                   href="/covid-19"
                >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                        <div class="ribbon-box">
                            (na)zorg Corona
                        </div>
                        <div class="pt-4 pb-6 px-md-3">
                            <h3 class="h1 font-w700 text-white mb-1">(na)zorg Corona</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-5 order-lg-5 order-md-3 order-sm-3 order-3"
                data-toggle="appear">
                <a class="
                        block
                        block-transparent
                        block-link-pop
                        w-100
                        h-250
                        d-md-flex
                        align-items-md-stretch
                        bg-image
                        homepage-block
                        left-tile"
                   style="
                    background-image : url('/storage/vakken/Vak05.jpg');
                    "
                   data-toggle="click-ripple"
                   href="/vragenlijsten"
                >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                        <div class="ribbon-box">
                            Vragenlijsten
                        </div>
                        <div class="pt-4 pb-6 px-md-3">
                            <h3 class="h1 font-w700 text-white mb-1">Vragenlijsten</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-6 order-lg-6 order-md-7 order-sm-7 order-7"
                data-toggle="appear">
                <a class="
                        block
                        block-transparent
                        block-link-pop
                        w-100
                        h-250
                        d-md-flex
                        align-items-md-stretch
                        bg-image
                        homepage-block
                        right-tile"
                   style="
                    background-image : url('/storage/vakken/Vak06.jpg');
                    "
                   data-toggle="click-ripple"
                   href="/articles"
                >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                        <div class="ribbon-box">
                            Inspiratiemateriaal
                        </div>
                        <div class="pt-4 pb-6 px-md-3">
                            <h3 class="h1 font-w700 text-white mb-1">Inspiratiemateriaal</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-7 order-lg-7 order-md-4 order-sm-4 order-4"
                data-toggle="appear">
                <a class="
                        block
                        block-transparent
                        block-link-pop
                        w-100
                        h-250
                        d-md-flex
                        align-items-md-stretch
                        bg-image
                        homepage-block
                        left-tile"
                   style="
                    background-image : url('/storage/vakken/Vak07.jpg');
                    "
                   data-toggle="click-ripple"
                   href="/goodhabitz"
                >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                        <div class="ribbon-box">
                            Goodhabitz
                        </div>
                        <div class="pt-4 pb-6 px-md-3">
                            <h3 class="h1 font-w700 text-white mb-1">Goodhabitz</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div
                class="col-md-12 col-xl-6 col-lg-6 col-12 col-xs-12 order-xl-8 order-lg-8 order-md-8 order-sm-8 order-8"
                data-toggle="appear">
                <a class="
                        block
                        block-transparent
                        block-link-pop
                        w-100
                        h-250
                        d-md-flex
                        align-items-md-stretch
                        bg-image
                        homepage-block
                        right-tile"
                   style="
                    background-image : url('/storage/vakken/Vak08.jpg');
                    "
                   data-toggle="click-ripple"
                   href="/topical"
                >
                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-250">
                        <div class="ribbon-box">
                            Thuiswerken
                        </div>
                        <div class="pt-4 pb-6 px-md-3">
                            <h3 class="h1 font-w700 text-white mb-1">Thuiswerken</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!--            WHEN NOT HAPPY WITH THE DESIGN OF THE DEFAULT DASHBOARD REPLACE WITHIN THE COMMENT LINES-->
    </div>
</template>

<script>
export default {
    name: "Default",
    props:{
        user:{
            type: Object,
            required:false
        }
    },
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
