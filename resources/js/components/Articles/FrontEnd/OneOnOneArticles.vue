<template>
    <div>
        <div class="bg-body-dark">
            <div class="content">
                <b-row>
                    <b-col cols="12" md="12" lg="3" xl="3" sm="12">
                        <b-button @click="goBack()" variant="primary">Terug</b-button>
                    </b-col>
                    <b-col cols="12" md="12" lg="6" xl="6" sm="12">
                        <div class="text-center py-3 oneOnOneimage">
                            <h1 class="h1 font-w700 mb-2 text-primary text-shadow-workshops">Persoonlijke
                                begeleiding</h1>
                        </div>
                    </b-col>
                    <b-col cols="12" md="12" lg="3" xl="3" sm="12">
                        <b-form-group size="lg">
                            <b-form-input
                                id="filter-input"
                                v-model="searchString"
                                type="search"
                                placeholder="Type om te zoeken">
                            <b-input-group-append>
                                <b-button @click="searchString = ''" variant="primary">Reset</b-button>
                            </b-input-group-append></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row v-if="loading === true">
                    <b-col>
                        <div class="text-center">
                            <b-spinner style="width: 3rem; height: 3rem;" variant="primary" type="grow"
                                       label="Spinning"></b-spinner>
                        </div>
                    </b-col>
                </b-row>
                <b-row v-else-if="searchString === ''">

                    <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                           v-if="filteredArticles[0]">
                        <a v-if="filteredArticles[0].has_video === false"
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="{
                                        'background':'url(/' + filteredArticles[0].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                           v-bind:href="'/article/'+filteredArticles[0].id +'/show'"
                           data-toggle="click-ripple">
                            <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ filteredArticles[0].title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <a v-else
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="{
                                        'background':'url(/' + video_image + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                           v-bind:href="'/article/'+filteredArticles[0].id +'/show'"
                           data-toggle="click-ripple">
                            <div
                                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ filteredArticles[0].title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <div v-if="filteredArticles[1]">
                            <a v-if="filteredArticles[1].has_video === false"
                               class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                               v-bind:style="[filteredArticles[1].image_link ?
                                    {
                                        'background':'url(/' + filteredArticles[1].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                               v-bind:href="'/article/'+filteredArticles[1].id +'/show'"
                               data-toggle="click-ripple">
                                <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                    <div class="ribbon-box">
                                        Persoonlijke begeleiding
                                    </div>
                                    <div class="pt-4 pb-6 px-md-3">
                                        <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                            {{ filteredArticles[1].title }}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                            <a v-else
                               class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                               v-bind:style="{
                                        'background':'url(/' + video_image + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                               v-bind:href="'/article/'+filteredArticles[1].id +'/show'"
                               data-toggle="click-ripple">
                                <div
                                    class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                    <div class="ribbon-box">
                                        Persoonlijke begeleiding
                                    </div>
                                    <div class="pt-4 pb-6 px-md-3">
                                        <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                            {{ filteredArticles[1].title }}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </b-col>
                    <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                           v-if="filteredArticles[2]">
                        <a v-if="filteredArticles[2].has_video === false"
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="{
                                        'background':'url(/' + filteredArticles[2].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                           v-bind:href="'/article/'+filteredArticles[2].id +'/show'"
                           data-toggle="click-ripple">
                            <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ filteredArticles[2].title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <a v-else
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="{
                                        'background':'url(/' + video_image + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                           v-bind:href="'/article/'+filteredArticles[2].id +'/show'"
                           data-toggle="click-ripple">
                            <div
                                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ filteredArticles[2].title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <div v-if="filteredArticles[3]">
                            <a v-if="filteredArticles[3].has_video === false"
                               class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                               v-bind:style="[filteredArticles[3].image_link ?
                                    {
                                        'background':'url(/' + filteredArticles[3].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                               v-bind:href="'/article/'+filteredArticles[3].id +'/show'"
                               data-toggle="click-ripple">
                                <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                    <div class="ribbon-box">
                                        Persoonlijke begeleiding
                                    </div>
                                    <div class="pt-4 pb-6 px-md-3">
                                        <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                            {{ filteredArticles[3].title }}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                            <a v-else
                               class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                               v-bind:style="{
                                        'background':'url(/' + video_image + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                               v-bind:href="'/article/'+filteredArticles[3].id +'/show'"
                               data-toggle="click-ripple">
                                <div
                                    class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                    <div class="ribbon-box">
                                        Persoonlijke begeleiding
                                    </div>
                                    <div class="pt-4 pb-6 px-md-3">
                                        <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                            {{ filteredArticles[3].title }}
                                        </h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </b-col>
                    <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="filteredArticles[4]">
                        <a v-if="filteredArticles[4].has_video === false"
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="[filteredArticles[4].image_link ?
                                    {
                                        'background':'url(/' + filteredArticles[4].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                           v-bind:href="'/article/'+ filteredArticles[4].id +'/show'"
                           data-toggle="click-ripple">
                            <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ filteredArticles[4].title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <a v-else
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="{
                                        'background':'url(/' + video_image + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                           v-bind:href="'/article/'+ filteredArticles[4].id +'/show'"
                           data-toggle="click-ripple">
                            <div
                                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ filteredArticles[4].title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </b-col>
                    <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="filteredArticles[5]">
                        <a v-if="filteredArticles[5].has_video === false"
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="[filteredArticles[4].image_link ?
                                    {
                                        'background':'url(/' + filteredArticles[4].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                           v-bind:href="'/article/'+filteredArticles[4].id +'/show'"
                           data-toggle="click-ripple">
                            <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ filteredArticles[4].title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <a v-else
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="{
                                        'background':'url(/' + video_image + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                           v-bind:href="'/article/'+filteredArticles[4].id +'/show'"
                           data-toggle="click-ripple">
                            <div
                                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ filteredArticles[4].title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </b-col>
                    <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="filteredArticles[6]">
                        <a v-if="filteredArticles[6].has_video === false"
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="[filteredArticles[6].image_link ?
                                    {
                                        'background':'url(/' + filteredArticles[6].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                           v-bind:href="'/article/'+filteredArticles[6].id +'/show'"
                           data-toggle="click-ripple">
                            <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ filteredArticles[6].title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <a v-else
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="{
                                        'background':'url(/' + video_image + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                           v-bind:href="'/article/'+filteredArticles[6].id +'/show'"
                           data-toggle="click-ripple">
                            <div
                                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ filteredArticles[6].title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </b-col>
                    <b-col cols="12" sm="12" md="12" lg="6" xl="6" v-for="(article,key) in filteredArticles.slice(7)" :key="key">
                        <a v-if="article.has_video === false"
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="[article.image_link ?
                                    {
                                        'background':'url(/' + article.image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                           v-bind:href="'/article/'+ article.id +'/show'"
                           data-toggle="click-ripple">
                            <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ article.title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <a v-else
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="{
                                        'background':'url(/' + video_image + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                           v-bind:href="'/article/'+article.id +'/show'"
                           data-toggle="click-ripple">
                            <div
                                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ article.title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </b-col>
                </b-row>
                <b-row v-else>
                    <b-col cols="12" sm="12" md="12" lg="6" xl="6" v-for="(article) in filteredArticles">
                        <a v-if="article.has_video === false"
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="[article.image_link ?
                                    {
                                        'background':'url(/' + article.image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                           v-bind:href="'/article/'+ article.id +'/show'"
                           data-toggle="click-ripple">
                            <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ article.title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <a v-else
                           class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                           v-bind:style="{
                                        'background':'url(/' + video_image + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                           v-bind:href="'/article/'+article.id +'/show'"
                           data-toggle="click-ripple">
                            <div
                                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                <div class="ribbon-box">
                                    Persoonlijke begeleiding
                                </div>
                                <div class="pt-4 pb-6 px-md-3">
                                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                        {{ article.title }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                    </b-col>
                </b-row>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "OneOnOneArticles",
    created() {
        this.getCategories();
    },
    data() {
        return {
            loading: true,
            categories: [],
            default_image: 'storage/images/fallback.jpg',
            video_image: 'storage/images/youtube.png',
            searchString:'',
        };
    },
    computed: {
        filteredArticles: function () {
            return this.categories[0].article.filter((article) => {
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
        getCategories() {
            axios.get('/axios/article/get-one-on-one-categories')
                .then(response => {
                    console.log(this.categories);
                    this.categories = response.data;
                    this.loading = false;
                    console.log(this.categories);
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

<style>

</style>
