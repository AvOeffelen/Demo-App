<template>
    <div>
        <b-row class="row">
            <b-col align-self="center" cols="12" md="12" lg="12" sm="12">
                <b-button @click="goBack()" variant="primary">Terug</b-button>
                <div class="text-center w-100">
                    <div v-if="article.has_video === 1">
                        <div v-html="article.video_link"></div>
                    </div>
                    <div v-else-if="article.image_link != null">
                        <div class="article-show-image">
                            <img class="" v-bind:src="'../../' + article.image_link" />
                        </div>
                    </div>
                    <div v-else>
                        <div class="article-show-image">
                            <img v-bind:src="default_image" />
                        </div>
                    </div>
                </div>
            </b-col>
        </b-row>
        <div class="row py-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h3 class="h3 font-w400 mb-2 display-3">{{ article.title }}</h3>
                        </div>
                    </div>
                </div>
                <b-row>
                    <b-col cols="0" md="1" lg="1" sm="0"></b-col>
                    <b-col align-self="center" cols="12" md="10" lg="19" sm="12">
                        <div v-html="article.text"></div>
                    </b-col>
                    <b-col cols="0" md="1" lg="1" sm="0"></b-col>
                </b-row>
            </div>
            <div class="col-md-2"></div>
        </div>
        <b-row v-if="article.button_link != null">
            <b-col align-self="center">
                <div class="text-center">
                    <b-button @click="buttonFunction(article.button_link)" class="btn-primary btn" target="_blank">{{article.button_text}}</b-button>
                </div>
            </b-col>
        </b-row>
    </div>
</template>

<script>
import { LinkPlugin } from 'bootstrap-vue'
Vue.use(LinkPlugin)
export default {
    name: "ShowArticle",
    props: [
        'article'
    ],
    data() {
        return {
            currUserHasLiked: false,
            default_image: 'https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg',
        };
    },
    created() {
    },
    methods: {
        buttonFunction(link){
            window.open("https://"+link);
        },
        goBack(){
            history.back();
        }
    },
}
</script>

<style scoped>
.colorStar {
    color: orange;
}
</style>
