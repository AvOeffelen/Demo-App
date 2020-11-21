<template>
    <div>
        <div class="bg-body-dark">
            <div class="content">
                <div class="text-center py-3">
                    <h1 class="h3 font-w700 mb-2">BESCHIKBARE WORKSHOPS</h1>
                </div>
                <b-tabs content-class="py-5" align="center"
                        id="horizontal-navigation-hover-centered py-5 px-1"
                        class=" h5 d-none d-lg-block mt-2 mt-lg-0 nav nav-main nav-main-horizontal nav-main-horizontal-center"
                        v-if="loading == false">
                    <b-tab :title="category.name" v-for="(category, key) in this.categories" :key="key">
                        <b-row>
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6" class="d-md-flex align-items-md-stretch"
                                   v-if="category.workshop[0]">
                                <a
                                    class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image"
                                    v-bind:style="[category.workshop[0].image_location  ?
                                    {'background': 'url(' + category.workshop[0].image_location + ')'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                    v-bind:href="'/workshop/'+category.workshop[0].id+'/show'"
                                    data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1">{{
                                                    category.workshop[0].title
                                                }}</h3>
                                            <h5 class="font-w400 text-body-color-light">{{
                                                    category.workshop[0].title
                                                }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                                   v-if="category.workshop[1] && category.workshop[2]">
                                <a class="block block-transparent bg-image"
                                   v-bind:style="[category.workshop[1].image_location ?
                                    {'background': 'url(' + category.workshop[1].image_location + ')'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                   v-bind:href="'/workshop/'+category.workshop[1].id+'/show'"
                                   data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1">{{
                                                    category.workshop[1].title
                                                }}</h3>
                                            <h5 class="font-w400 text-body-color-light">{{
                                                    category.workshop[1].title
                                                }}</h5>
                                        </div>
                                    </div>
                                </a>
                                <a class="block block-transparent bg-image"
                                   v-bind:style="[category.workshop[2].image_location  ?
                                    {'background': 'url(' + category.workshop[2].image_location + ')'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                   v-bind:href="'/workshop/'+category.workshop[1].id+'/show'"
                                   data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1">{{
                                                    category.workshop[2].title
                                                }}</h3>
                                            <h5 class="font-w400 text-body-color-light">{{
                                                    category.workshop[2].title
                                                }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.workshop[3]">
                                <a class="block block-transparent bg-image"
                                   v-bind:style="[category.workshop[3].image_location  ?
                                    {'background': 'url(' + category.workshop[3].image_location + ')'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                   v-bind:href="'/workshop/'+category.workshop[3].id+'/show'"
                                   data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1">{{
                                                    category.workshop[3].title
                                                }}</h3>
                                            <h5 class="font-w400 text-body-color-light">{{
                                                    category.workshop[3].title
                                                }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.workshop[4]">
                                <a class="block block-transparent bg-image"
                                   v-bind:style="[category.workshop[4].image_location  ?
                                    {'background': 'url(' + category.workshop[4].image_location + ')'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                   v-bind:href="'/workshop/'+category.workshop[4].id+'/show'"
                                   data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1">{{
                                                    category.workshop[4].title
                                                }}</h3>
                                            <h5 class="font-w400 text-body-color-light">{{
                                                    category.workshop[4].title
                                                }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.workshop[5]">
                                <a class="block block-transparent bg-image"
                                   v-bind:style="[category.workshop[5].image_location  ?
                                    {'background': 'url(' + category.workshop[5].image_location + ')'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                   v-bind:href="'/workshop/'+category.workshop[5].id+'/show'"
                                   data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1">{{
                                                    category.workshop[5].title
                                                }}</h3>
                                            <h5 class="font-w400 text-body-color-light">{{
                                                    category.workshop[5].title
                                                }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col
                                v-for="(workshop,index) in category.workshop.slice(6)"
                                cols="12"
                                sm="12"
                                md="12"
                                lg="6"
                                xl="6"
                                :key="index">
                                <a class="block block-transparent bg-image"
                                   v-bind:style="[workshop.image_location  ?
                                    {'background': 'url(' + workshop.image_location + ')'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                   v-bind:href="'/workshop/'+ workshop.id+'/show'"
                                   data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1">{{ workshop.title }}</h3>
                                            <h5 class="font-w400 text-body-color-light">{{ workshop.title }}</h5>
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
        };
    },
    methods: {
        getCategories() {
            console.log("loading......");
            axios.get('/axios/workshop/get-categories')
                .then(response => {
                    console.log("got emmmm");
                    this.categories = response.data;
                    console.log(this.categories);
                    this.loading = false;
                })
                .catch(error => {

                });
        },
        getAllWorkshops() {
            axios.get('/axios/workshop/get-all')
                .then(response => {
                    this.workshops = response.data;
                    console.log(this.workshops);
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
        }
    },
}
</script>

<style scoped>

</style>
