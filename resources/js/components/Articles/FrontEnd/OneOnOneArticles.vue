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
                            <h1 class="h1 font-w700 mb-2 text-secondary text-shadow-workshops">Persoonlijke
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
                    <div v-else>
                        <b-row class="py-3">
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                                   v-if="categories[0].article[0]">
                                <a v-if="categories[0].article[0].has_video === false"
                                   class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                                   v-bind:style="{
                                        'background':'url(/' + categories[0].article[0].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                                   v-bind:href="'/article/'+categories[0].article[0].id +'/show'"
                                   data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            Persoonlijke begeleiding
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                {{ categories[0].article[0].title }}
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
                                   v-bind:href="'/article/'+categories[0].article[0].id +'/show'"
                                   data-toggle="click-ripple">
                                    <div
                                        class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            Persoonlijke begeleiding
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                {{ categories[0].article[0].title }}
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                                <div v-if="categories[0].article[1]">
                                    <a v-if="categories[0].article[1].has_video === false"
                                       class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                                       v-bind:style="[categories[0].article[1].image_link ?
                                    {
                                        'background':'url(/' + categories[0].article[1].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                                       v-bind:href="'/article/'+categories[0].article[1].id +'/show'"
                                       data-toggle="click-ripple">
                                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                            <div class="ribbon-box">
                                                Persoonlijke begeleiding
                                            </div>
                                            <div class="pt-4 pb-6 px-md-3">
                                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                    {{ categories[0].article[1].title }}
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
                                       v-bind:href="'/article/'+categories[0].article[1].id +'/show'"
                                       data-toggle="click-ripple">
                                        <div
                                            class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                            <div class="ribbon-box">
                                                Persoonlijke begeleiding
                                            </div>
                                            <div class="pt-4 pb-6 px-md-3">
                                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                    {{ categories[0].article[1].title }}
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6"
                                   v-if="categories[0].article[2]">
                                <a v-if="categories[0].article[2].has_video === false"
                                   class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                                   v-bind:style="{
                                        'background':'url(/' + categories[0].article[2].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                        }"
                                   v-bind:href="'/article/'+categories[0].article[2].id +'/show'"
                                   data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            Persoonlijke begeleiding
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                {{ categories[0].article[2].title }}
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
                                   v-bind:href="'/article/'+categories[0].article[2].id +'/show'"
                                   data-toggle="click-ripple">
                                    <div
                                        class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            Persoonlijke begeleiding
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                {{ categories[0].article[2].title }}
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                                <div v-if="categories[0].article[3]">
                                    <a v-if="categories[0].article[3].has_video === false"
                                       class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                                       v-bind:style="[categories[0].article[3].image_link ?
                                    {
                                        'background':'url(/' + categories[0].article[3].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                                       v-bind:href="'/article/'+categories[0].article[3].id +'/show'"
                                       data-toggle="click-ripple">
                                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                            <div class="ribbon-box">
                                                Persoonlijke begeleiding
                                            </div>
                                            <div class="pt-4 pb-6 px-md-3">
                                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                    {{ categories[0].article[3].title }}
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
                                       v-bind:href="'/article/'+categories[0].article[3].id +'/show'"
                                       data-toggle="click-ripple">
                                        <div
                                            class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                            <div class="ribbon-box">
                                                Persoonlijke begeleiding
                                            </div>
                                            <div class="pt-4 pb-6 px-md-3">
                                                <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                    {{ categories[0].article[3].title }}
                                                </h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="categories[0].article[4]">
                                <a v-if="categories[0].article[4].has_video === false"
                                   class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                                   v-bind:style="[categories[0].article[4].image_link ?
                                    {
                                        'background':'url(/' + categories[0].article[4].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                                   v-bind:href="'/article/'+categories[0].article[4].id +'/show'"
                                   data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            Persoonlijke begeleiding
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                {{ categories[0].article[4].title }}
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
                                   v-bind:href="'/article/'+categories[0].article[4].id +'/show'"
                                   data-toggle="click-ripple">
                                    <div
                                        class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            Persoonlijke begeleiding
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                {{ categories[0].article[4].title }}
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="categories[0].article[5]">
                                <a v-if="categories[0].article[5].has_video === false"
                                   class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                                   v-bind:style="[categories[0].article[5].image_link ?
                                    {
                                        'background':'url(/' + categories[0].article[5].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                                   v-bind:href="'/article/'+categories[0].article[5].id +'/show'"
                                   data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            Persoonlijke begeleiding
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                {{ categories[0].article[5].title }}
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
                                   v-bind:href="'/article/'+categories[0].article[5].id +'/show'"
                                   data-toggle="click-ripple">
                                    <div
                                        class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            Persoonlijke begeleiding
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                {{ categories[0].article[5].title }}
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="4" xl="4" v-if="categories[0].article[6]">
                                <a v-if="categories[0].article[6].has_video === false"
                                   class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
                                   v-bind:style="[categories[0].article[6].image_link ?
                                    {
                                        'background':'url(/' + categories[0].article[6].image_link + ')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',
                                    } :
                                     {'background': 'url(/'+ default_image +')',
                                        'background-position': 'center',
                                        'background-size': 'cover',
                                        'background-repeat': 'no-repeat',}]"
                                   v-bind:href="'/article/'+categories[0].article[6].id +'/show'"
                                   data-toggle="click-ripple">
                                    <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            Persoonlijke begeleiding
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                {{ categories[0].article[6].title }}
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
                                   v-bind:href="'/article/'+categories[0].article[6].id +'/show'"
                                   data-toggle="click-ripple">
                                    <div
                                        class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                                        <div class="ribbon-box">
                                            Persoonlijke begeleiding
                                        </div>
                                        <div class="pt-4 pb-6 px-md-3">
                                            <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                                                {{ categories[0].article[6].title }}
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </b-col>
                            <b-col cols="12" sm="12" md="12" lg="6" xl="6" v-for="(article,key) in categories[0].article.slice(7)" :key="key">
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
            articles: [],
            default_image: 'storage/images/fallback.jpg',
            video_image: 'storage/images/youtube.png',
            searchString:'',
            foundResult:false,
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
            axios.get('/axios/article/get-one-on-one-categories')
                .then(response => {
                    console.log(this.categories);
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

<style>

</style>
