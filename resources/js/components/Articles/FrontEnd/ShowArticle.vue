<template>
    <div>
        <b-row class="row">
            <b-col cols="0" md="3" lg="3" sm="0"></b-col>
            <b-col align-self="center" cols="12" md="6" lg="6" sm="12">
                <div class="text-center w-100">
                    <img v-bind:src="'../../' + article.image_link" />
                </div>
            </b-col>
            <b-col cols="0" md="3" lg="3" sm="0"></b-col>
        </b-row>
        <div class="row py-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h2 class="h1 font-w600 mb-2 display-3">{{ article.title }}</h2>
                        </div>
                    </div>
                </div>
                <b-row>
                    <b-col cols="0" md="3" lg="3" sm="0"></b-col>
                    <b-col align-self="center" cols="12" md="6" lg="6" sm="12">
                        <div v-html="article.text"></div>
                    </b-col>
                    <b-col cols="0" md="3" lg="3" sm="0"></b-col>
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
        }
    },
}
</script>
<style scoped>

</style>
