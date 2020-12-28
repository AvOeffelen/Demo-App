<template>
    <div>
        <div class="bg-body-dark">
            <div class="content">
                <b-row>
                    <b-col cols="12" md="12" lg="2" xl="2" sm="12">
                        <b-button @click="goBack()" variant="primary">Terug</b-button></b-col>
                    <b-col cols="12" md="12" lg="8" xl="8" sm="12">
                        <div class="text-center py-3">
                            <h1 class="h3 font-w700 mb-2">Artikelen</h1>
                        </div>
                    </b-col>
                    <b-col cols="12" md="12" lg="2" xl="2" sm="12"></b-col>
                </b-row>
                <b-tabs content-class="py-5" align="center"
                        id="horizontal-navigation-hover-centered py-5 px-1"
                        class=" h5 d-lg-block mt-2 mt-lg-0 nav nav-main nav-main-horizontal nav-main-horizontal-center"
                        v-if="loading == false">
                    <b-tab :title="category.name" v-for="(category, key) in this.categories" :key="key">
                        <b-row>
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6" class="d-md-flex align-items-md-stretch"
                                   v-if="category.article[0]">
                                <a
                                    class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-600"
                                    v-bind:style="[category.article[0].image_link ?
                                    {
                                        'background': 'url(' + category.article[0].image_link + ')',
                                        'background-position':'center',
                                        'background-size':'cover',
                                        'background-repeat': 'no-repeat'
                                    } :
                                     {'background-image': 'url('+ default_image +');'}]"
                                    v-bind:href="'/article/'+category.article[0].id +'/show'"
                                    data-toggle="click-ripple">
                                    <div
                                        class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-600">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{
                                                    category.article[0].title
                                                }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                                   v-if="category.article[1]">
                                <a class="block block-transparent bg-image h-286"
                                   v-bind:style="[category.article[1].image_link ?
                                    {'background': 'url(' + category.article[1].image_link + ')',
                                        'background-position':'center',
                                        'background-size':'cover',
                                        'background-repeat': 'no-repeat'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                   v-bind:href="'/article/'+category.article[1].id+'/show'"
                                   data-toggle="click-ripple">
                                    <div
                                        class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{
                                                    category.article[1].title
                                                }}</h3>
                                        </div>
                                    </div>
                                </a>
                                <div v-if="category.article[2]">
                                    <a class="block block-transparent bg-image h-286"
                                       v-bind:style="[category.article[2].image_link  ?
                                    {'background': 'url(' + category.article[2].image_link + ')',
                                        'background-position':'center',
                                        'background-size':'cover',
                                        'background-repeat': 'no-repeat'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                       v-bind:href="'/article/'+category.article[2].id+'/show'"
                                       data-toggle="click-ripple">
                                        <div
                                            class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                            <div class="ribbon-box">
                                                {{ category.name }}
                                            </div>
                                            <div class="pt-4 pb-6 px-md-3">
                                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{
                                                        category.article[2].title
                                                    }}</h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.article[3]">
                                <a class="block block-transparent bg-image h-286"
                                   v-bind:style="[category.article[3].image_link  ?
                                    {'background': 'url(' + category.article[3].image_link + ')',
                                        'background-position':'center',
                                        'background-size':'cover',
                                        'background-repeat': 'no-repeat'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                   v-bind:href="'/article/'+category.article[3].id+'/show'"
                                   data-toggle="click-ripple">
                                    <div
                                        class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{
                                                    category.article[3].title
                                                }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.article[4]">
                                <a class="block block-transparent bg-image h-286"
                                   v-bind:style="[category.article[4].image_link  ?
                                    {'background': 'url(' + category.article[4].image_link + ')',
                                        'background-position':'center',
                                        'background-size':'cover',
                                        'background-repeat': 'no-repeat'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                   v-bind:href="'/article/'+category.article[4].id+'/show'"
                                   data-toggle="click-ripple">
                                    <div
                                        class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{
                                                    category.article[4].title
                                                }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.article[5]">
                                <a class="block block-transparent bg-image h-286"
                                   v-bind:style="[category.article[5].image_link  ?
                                    {'background': 'url(' + category.article[5].image_link + ')',
                                        'background-position':'center',
                                        'background-size':'cover',
                                        'background-repeat': 'no-repeat'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                   v-bind:href="'/article/'+category.article[5].id+'/show'"
                                   data-toggle="click-ripple">
                                    <div
                                        class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            {{ category.name }}
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{
                                                    category.article[5].title
                                                }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col
                                v-for="(article,index) in category.article.slice(6)"
                                cols="12"
                                sm="12"
                                md="12"
                                lg="6"
                                xl="6"
                                :key="index">
                                <a class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                                   v-bind:style="[article.image_link ?
                                    {'background': 'url(' + article.image_link + ')',
                                        'background-position':'center',
                                        'background-size':'cover',
                                        'background-repeat': 'no-repeat'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                   v-bind:href="'/article/'+article.id +'/show'"
                                   data-toggle="click-ripple">
                                    <div
                                        class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            Artikel
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">{{
                                                    article.title
                                                }}</h3>
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
    name: "Article",
    created() {
        this.getCategories();
    },
    data() {
        return {
            loading: true,
            categories: [],
            default_image: 'https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg',
            video_image: 'storage/images/youtube.png'
        };
    },
    methods: {
        getCategories() {
            axios.get('/axios/article/get-all-standard-categories')
                .then(response => {
                    this.categories = response.data;
                    this.loading = false;
                })
                .catch(error => {

                });
        },
        goBack() {
            history.back();
        }
    },
}
</script>

<style scoped>

</style>
