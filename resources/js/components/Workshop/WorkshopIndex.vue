<template>
    <div>
        <div class="bg-body-dark">
            <div class="content">
                <b-row>
                    <b-col cols="12" md="12" lg="3" xl="3" sm="12">
                        <b-button @click="goBack()" variant="primary">Back</b-button></b-col>
                    <b-col cols="12" md="12" lg="6" xl="6" sm="12">
                        <div class="text-center py-3">
                            <h1 class="h3 font-w700 mb-2">BESCHIKBARE WORKSHOPS</h1>
                        </div>
                    </b-col>
                    <b-col cols="12" md="12" lg="3" xl="3" sm="12">
                        <b-form-group size="lg">
                            <b-form-input
                                id="filter-input"
                                v-model="searchString"
                                type="search"
                                placeholder="What are you looking for?">
                            </b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>
                <div v-if="searchString != ''">
                    <b-row>
                        <b-col cols="12" sm="12" md="12" lg="6" xl="6" v-for="(workshop) in filteredWorkshops">
                            <a class="block block-transparent bg-image h-286"
                               v-bind:style="[workshop.image_link  ?
                                    {'background': 'url(' + workshop.image_link + ')',
                                        'background-position':'center',
                                        'background-size':'cover',
                                        'background-repeat': 'no-repeat'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                               v-bind:href="'/workshop/'+ workshop.id+'/show'"
                               data-toggle="click-ripple">
                                <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                    <div class="ribbon-box">
                                        {{ workshop.category.display_name }}
                                    </div>
                                    <div class="pt-4 pb-6 px-md-3">
                                        <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{ workshop.title }}</h3>
                                        <i class="fa fa-calendar appointment-date text-white" aria-hidden="true" v-if="workshop.start !== null">
                                            {{workshop.start}}
                                        </i>
                                    </div>
                                </div>
                            </a>
                        </b-col>
                    </b-row>
                </div>
                <div v-else>
                    <b-tabs content-class="py-5" align="center"
                            id="horizontal-navigation-hover-centered py-5 px-1"
                            class=" h5 d-lg-block mt-2 mt-lg-0 nav nav-main nav-main-horizontal nav-main-horizontal-center"
                            v-if="loading == false">
                        <b-tab :title="category.display_name" v-for="(category, key) in this.categories" :key="key">
                            <b-row>
                               <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                                       v-if="category.workshop[0]">
                                    <a class="block block-transparent bg-image h-286"
                                       v-bind:style="[category.workshop[0].image_link ?
                                        {'background': 'url(' + category.workshop[0].image_link + ')',
                                            'background-position':'center',
                                            'background-size':'cover',
                                            'background-repeat': 'no-repeat'} :
                                         {'background-image': 'url('+ default_image +')'}]"
                                       v-bind:href="'/workshop/'+category.workshop[0].id+'/show'"
                                       data-toggle="click-ripple">
                                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                            <div class="ribbon-box">
                                                {{ category.display_name }}
                                            </div>
                                            <div class="pt-4 pb-6 px-md-3">
                                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{category.workshop[0].title}}</h3>
                                                <i class="fa fa-calendar appointment-date text-white" aria-hidden="true" v-if="category.workshop[0].start !== null">
                                                    {{category.workshop[0].start}}
                                                </i>
                                            </div>

                                        </div>
                                    </a>
                                    <div v-if="category.workshop[1]">
                                        <a class="block block-transparent bg-image h-286"
                                           v-bind:style="[category.workshop[1].image_link  ?
                                        {'background': 'url(' + category.workshop[1].image_link + ')',
                                            'background-position':'center',
                                            'background-size':'cover',
                                            'background-repeat': 'no-repeat'} :
                                         {'background-image': 'url('+ default_image +')'}]"
                                           v-bind:href="'/workshop/'+category.workshop[1].id+'/show'"
                                           data-toggle="click-ripple">
                                            <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                                <div class="ribbon-box">
                                                    {{ category.display_name }}
                                                </div>
                                                <div class="pt-4 pb-6 px-md-3">
                                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{category.workshop[1].title}}</h3>
                                                    <i class="fa fa-calendar appointment-date text-white" aria-hidden="true" v-if="category.workshop[1].start !== null">
                                                        {{category.workshop[1].start}}
                                                    </i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </b-col>
                                <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                                       v-if="category.workshop[2]">
                                    <a class="block block-transparent bg-image h-286"
                                       v-bind:style="[category.workshop[2].image_link ?
                                        {'background': 'url(' + category.workshop[2].image_link + ')',
                                            'background-position':'center',
                                            'background-size':'cover',
                                            'background-repeat': 'no-repeat'} :
                                         {'background-image': 'url('+ default_image +')'}]"
                                       v-bind:href="'/workshop/'+category.workshop[2].id+'/show'"
                                       data-toggle="click-ripple">
                                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                            <div class="ribbon-box">
                                                {{ category.display_name }}
                                            </div>
                                            <div class="pt-4 pb-6 px-md-3">
                                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{category.workshop[2].title}}</h3>
                                                <i class="fa fa-calendar appointment-date text-white" aria-hidden="true" v-if="category.workshop[2].start !== null">
                                                    {{category.workshop[2].start}}
                                                </i>
                                            </div>
                                        </div>
                                    </a>
                                    <div v-if="category.workshop[3]">
                                        <a class="block block-transparent bg-image h-286"
                                           v-bind:style="[category.workshop[3].image_link ?
                                        {'background': 'url(' + category.workshop[3].image_link + ')',
                                            'background-position':'center',
                                            'background-size':'cover',
                                            'background-repeat': 'no-repeat'} :
                                         {'background-image': 'url('+ default_image +')'}]"
                                           v-bind:href="'/workshop/'+category.workshop[3].id+'/show'"
                                           data-toggle="click-ripple">
                                            <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                                <div class="ribbon-box">
                                                    {{ category.display_name }}
                                                </div>
                                                <div class="pt-4 pb-6 px-md-3">
                                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{category.workshop[3].title}}</h3>
                                                    <i class="fa fa-calendar appointment-date text-white" aria-hidden="true" v-if="category.workshop[3].start !== null">
                                                        {{category.workshop[3].start}}
                                                    </i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </b-col>
                                <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.workshop[4]">
                                    <a class="block block-transparent bg-image h-286"
                                       v-bind:style="[category.workshop[4].image_link ?
                                        {'background': 'url(' + category.workshop[4].image_link + ')',
                                            'background-position':'center',
                                            'background-size':'cover',
                                            'background-repeat': 'no-repeat'} :
                                         {'background-image': 'url('+ default_image +')'}]"
                                       v-bind:href="'/workshop/'+category.workshop[4].id+'/show'"
                                       data-toggle="click-ripple">
                                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                            <div class="ribbon-box">
                                                {{ category.display_name }}
                                            </div>
                                            <div class="pt-4 pb-6 px-md-3">
                                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{category.workshop[4].title}}</h3>
                                                <i class="fa fa-calendar appointment-date text-white" aria-hidden="true" v-if="category.workshop[4].start !== null">
                                                    {{category.workshop[4].start}}
                                                </i>
                                            </div>
                                        </div>
                                    </a>
                                </b-col>
                                <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.workshop[5]">
                                    <a class="block block-transparent bg-image h-286"
                                       v-bind:style="[category.workshop[5].image_link ?
                                        {'background': 'url(' + category.workshop[5].image_link + ')',
                                            'background-position':'center',
                                            'background-size':'cover',
                                            'background-repeat': 'no-repeat'} :
                                         {'background-image': 'url('+ default_image +')'}]"
                                       v-bind:href="'/workshop/'+category.workshop[5].id+'/show'"
                                       data-toggle="click-ripple">
                                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                            <div class="ribbon-box">
                                                {{ category.display_name }}
                                            </div>
                                            <div class="pt-4 pb-6 px-md-3">
                                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{category.workshop[5].title}}</h3>
                                                <i class="fa fa-calendar appointment-date text-white" aria-hidden="true" v-if="category.workshop[5].start !== null">
                                                    {{category.workshop[5].start}}
                                                </i>
                                            </div>
                                        </div>
                                    </a>
                                </b-col>
                                <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.workshop[6]">
                                    <a class="block block-transparent bg-image h-286"
                                       v-bind:style="[category.workshop[6].image_link ?
                                        {'background': 'url(' + category.workshop[6].image_link + ')',
                                            'background-position':'center',
                                            'background-size':'cover',
                                            'background-repeat': 'no-repeat'} :
                                         {'background-image': 'url('+ default_image +')'}]"
                                       v-bind:href="'/workshop/'+category.workshop[6].id+'/show'"
                                       data-toggle="click-ripple">
                                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                            <div class="ribbon-box">
                                                {{ category.display_name }}
                                            </div>
                                            <div class="pt-4 pb-6 px-md-3">
                                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{category.workshop[6].title}}</h3>
                                                <i class="fa fa-calendar appointment-date text-white" aria-hidden="true" v-if="category.workshop[6].start !== null">
                                                    {{category.workshop[6].start}}
                                                </i>
                                            </div>
                                        </div>
                                    </a>
                                </b-col>
                                <b-col
                                    v-for="(workshop,index) in category.workshop.slice(7)"
                                    cols="12"
                                    sm="12"
                                    md="12"
                                    lg="6"
                                    xl="6"
                                    :key="index">
                                    <a class="block block-transparent bg-image h-286"
                                       v-bind:style="[workshop.image_link ?
                                        {'background': 'url(' + workshop.image_link + ')',
                                            'background-position':'center',
                                            'background-size':'cover',
                                            'background-repeat': 'no-repeat'} :
                                         {'background-image': 'url('+ default_image +')'}]"
                                       v-bind:href="'/workshop/'+ workshop.id+'/show'"
                                       data-toggle="click-ripple">
                                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                            <div class="ribbon-box">
                                                {{ category.display_name }}
                                            </div>
                                            <div class="pt-4 pb-6 px-md-3">
                                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{ workshop.title }}</h3>
                                                <i class="fa fa-calendar appointment-date text-white" aria-hidden="true" v-if="category.workshop[7].start !== null">
                                                    {{category.workshop[7].start}}
                                                </i>
                                            </div>
                                        </div>
                                    </a>
                                </b-col>
                            </b-row>
                        </b-tab>
                    </b-tabs>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "WorkshopIndex",
    created() {
        this.getCategories();
        this.getAllWorkshops();
    },
    data() {
        return {
            loading: true,
            categories: [],
            workshops: [],
            physicalWorkshops: [],
            mentalWorkshops: [],
            growthWorkshops: [],
            default_image: 'https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg',
            searchString:'',
        };
    },
    computed: {
        filteredWorkshops: function () {
            return this.workshops.filter((workshop) => {
                let regex = new RegExp('(' + this.searchString + ')', 'i');
                if (workshop.title.match(regex) == null) {
                    //    TODO:: Display error message if we want to.
                } else {
                    return workshop.title.match(regex);
                }
            })
        }
    },
    methods: {
        getCategories() {
            axios.get('/axios/workshop/get-categories')
                .then(response => {
                    this.categories = response.data;
                    this.loading = false;
                })
                .catch(error => {

                });
        },
        getAllWorkshops() {
            axios.get('/axios/workshop/get-all')
                .then(response => {
                    this.workshops = response.data;
                })
                .catch(error => {

                });
        },
        getPhysicalWorkshops() {
            axios.get('/axios/workshop/get-physical')
                .then(response => {
                    this.physicalWorkshops = response.data;
                })
                .catch(error => {

                });
        },
        getMentalWorkshops() {
            axios.get('/axios/workshop/get-mental')
                .then(response => {
                    this.mentalWorkshops = response.data;
                })
                .catch(error => {

                });
        },
        getGrowthWorkshops() {
            axios.get('/axios/workshop/get-growth')
                .then(response => {
                    this.growthWorkshops = response.data;
                })
                .catch(error => {

                });
        },
        goBack(){
            history.back();
        }
    },
}
</script>

<style>
</style>
