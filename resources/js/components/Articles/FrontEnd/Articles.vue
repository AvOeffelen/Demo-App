<template>
    <div>
        <div class="bg-body-dark">
            <div class="content">
                <b-row>
                    <b-col cols="12" md="12" lg="3" xl="3" sm="12">
                        <b-button @click="goBack()" variant="primary">Terug</b-button></b-col>
                    <b-col cols="12" md="12" lg="6" xl="6" sm="12">
                        <div class="text-center py-3">
                            <h1 class="h3 font-w700 mb-2">Inspiratie Materiaal</h1>
                        </div>
                    </b-col>
                    <b-col cols="12" md="12" lg="3" xl="3" sm="12">
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
                <div v-if="searchString != ''">
                    <b-row>
                        <b-col cols="12" sm="12" md="12" lg="6" xl="6" v-for="(article) in filteredArticles">
                            <article-tile :article="article" :category="article.category"></article-tile>
                        </b-col>
                    </b-row>
                </div>
                <div v-else>
                    <b-tabs v-model="tabs" content-class="py-5" align="center"
                        id="horizontal-navigation-hover-centered py-5 px-1"
                        class=" h5 d-lg-block mt-2 mt-lg-0 nav nav-main nav-main-horizontal nav-main-horizontal-center"
                        v-if="loading === false">
                    <b-tab :title="category.display_name" v-for="(category, key) in this.categories" :key="key" @click="changingTab(category)">
                        <b-row class="py-3">
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                                   v-if="category.article[0]">
                                    <article-tile :article="category.article[0]" :category="category"></article-tile>
                                <div v-if="category.article[1]">
                                    <article-tile :article="category.article[1]" :category="category"></article-tile>
                                </div>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                                   v-if="category.article[2]">
                                    <article-tile :article="category.article[2]" :category="category"></article-tile>
                                <div v-if="category.article[3]">
                                    <article-tile :article="category.article[3]" :category="category"></article-tile>
                                </div>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.article[4]">
                                <article-tile :article="category.article[4]" :category="category"></article-tile>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.article[5]">
                                <article-tile :article="category.article[5]" :category="category"></article-tile>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="category.article[6]">
                                <article-tile :article="category.article[6]" :category="category"></article-tile>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6" v-for="(article,key) in category.article.slice(7)" :key="key">
                                <article-tile :article="article" :category="category"></article-tile>
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
import ArticleTile from "../../Component/ArticleTile";
export default {
    name: "Article",
    components: {ArticleTile},
    created() {
        this.getCategories();
        this.getAllArticles();
        this.parameter = this.$route.hash.substr(1);
    },
    data() {
        return {
            loading: true,
            categories: [],
            articles:[],
            default_image: 'storage/images/fallback.jpg',
            searchString:'',
            video_image: 'storage/images/youtube.png',
            tabs:0
        };
    },
    computed: {
        filteredArticles: function () {
            return this.articles.filter((article) => {
                let regex = new RegExp('(' + this.searchString + ')', 'i');
                if (article.title.match(regex) == null) {
                    //    TODO:: Display error message if we want to.
                } else {
                    return article.title.match(regex);
                }
            })
        }
    },
    methods: {
        changingTab(category){
            window.location.hash = (category.name)
        },
        checkWhichShouldBeActive() {
            for(let x in this.categories){
                if(this.categories[x].name === this.parameter){
                    this.tabs = parseInt(x);
                }
            }

        },
        getCategories() {
            axios.get('/axios/article/get-all-standard-categories')
                .then(response => {
                    this.categories = response.data;
                    this.loading = false;
                    this.checkWhichShouldBeActive();
                })
                .catch(error => {

                });
        },
        getAllArticles(){
            axios.get('/axios/article/get-all-articles-for-standard-categories')
                .then(response => {
                    this.articles = response.data.data;
                    this.loading = false;
                })
                .catch(error => {

                });
        },
        goBack() {
            history.back();
        },
        uselessFunction(){}
    },
}
</script>

<style scoped>

</style>
