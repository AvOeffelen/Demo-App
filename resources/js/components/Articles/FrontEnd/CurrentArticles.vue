<template>
    <div>
        <div class="bg-body-dark">
            <div class="content">
                <b-row>
                    <b-col cols="12" md="12" lg="3" xl="3" sm="12">
                        <b-button @click="goBack()" variant="primary">Terug</b-button></b-col>
                    <b-col cols="12" md="12" lg="6" xl="6" sm="12">
                        <div class="text-center py-3">
                            <h1 class="h3 font-w700 mb-2 text-primary">Thuiswerken</h1>
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
                <div v-if="loading === true">
                    <b-row>
                        <b-col>
                            <div class="text-center">
                                <b-spinner style="width: 3rem; height: 3rem;" variant="primary" type="grow"
                                           label="Spinning"></b-spinner>
                            </div>
                        </b-col>
                    </b-row>
                </div>
                <div v-else>
                    <div v-if="searchString != ''">
                        <b-row class="py-3">
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6" v-for="(article,key) in filteredArticles" :key="key">
                                <article-tile :article="article" :category="categories[0]"></article-tile>
                            </b-col>
                        </b-row>
                    </div>
                    <div v-else>
                        <b-row class="py-3">
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                                   v-if="categories[0].article[0]">
                                <article-tile :article="categories[0].article[0]" :category="categories[0]"></article-tile>
                                <div v-if="categories[0].article[1]">
                                    <article-tile :article="categories[0].article[1]" :category="categories[0]"></article-tile>
                                </div>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                                   v-if="categories[0].article[2]">
                                <article-tile :article="categories[0].article[2]" :category="categories[0]"></article-tile>
                                <div v-if="categories[0].article[3]">
                                    <article-tile :article="categories[0].article[3]" :category="categories[0]"></article-tile>
                                </div>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="categories[0].article[4]">
                                <article-tile :article="categories[0].article[4]" :category="categories[0]"></article-tile>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="categories[0].article[5]">
                                <article-tile :article="categories[0].article[5]" :category="categories[0]"></article-tile>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="categories[0].article[6]">
                                <article-tile :article="categories[0].article[6]" :category="categories[0]"></article-tile>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6" v-for="(article,key) in categories[0].article.slice(7)" :key="key">
                                <article-tile :article="article" :category="categories[0]"></article-tile>
                            </b-col>
                        </b-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ArticleTile from "../../Component/ArticleTile";
export default {
    name: "CurrentArticles",
    components: {ArticleTile},
    created() {
        this.getCategories();
    },
    data() {
        return {
            loading: true,
            categories: [],
            articles: [],
            searchString:'',
            growthWorkshops: [],
            default_image: 'storage/images/fallback.jpg',
            video_image: 'storage/images/youtube.png'
        };
    },
    computed: {
        filteredArticles: function () {
            return this.articles.filter((article) => {
                let regex = new RegExp('(' + this.searchString + ')', 'i');
                if (article.title.match(regex) === null) {
                    this.foundResult = false;
                } else {
                    this.foundResult = true;
                    return article.title.match(regex);
                }
            })
        }
    },
    methods: {
        getCategories() {
            axios.get('/axios/article/get-topical-categories')
                .then(response => {
                    this.categories = response.data;
                    this.articles = this.categories[0].article;
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
