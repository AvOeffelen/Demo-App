<template>
    <div>
        <b-row class="row">
            <b-col align-self="center" cols="12" md="12" lg="12" sm="12">
                <b-button @click="goBack()" variant="primary">Terug</b-button>
                <div class="text-center w-100">
                    <div v-if="article.image_link">
                        <div class="article-show-image">
                            <img class="" v-bind:src="'../../' + article.image_link" />
                        </div>
                    </div>
                    <div v-else>
                        <div class="article-show-image">
                            <img v-bind:src="fallback" />
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
                <b-row v-if="article.type === 'video'">
                    <b-col col="3"></b-col>
                    <b-col col="6">
                        <div v-html="article.video_link"></div>
                    </b-col>
                    <b-col col="3"></b-col>
                </b-row>
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
        <div class="py-5" v-if="article.show_contact === true">
            <b-row>
                <b-col xl="2" lg="2" col="0" sm="0" md="0"></b-col>
                <b-col xl="8" lg="8" col="12" sm="12" md="12">
                    <div class="text-center">
                        <h1 class="h4 font-w600 mb-2 display-5">Maak een afspraak</h1>
                    </div>
                </b-col>
                <b-col xl="2" lg="2" col="0" sm="0" md="0"></b-col>
            </b-row>
            <b-row>
                <b-col align-self="center">
                    <div class="text-center">
                        <article-contact :article="article"></article-contact>
                    </div>
                </b-col>
            </b-row>
        </div>
        <div class="row py-3" v-show="authenticated">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1 class="h4 font-w600 mb-2 display-5">Acties</h1>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" @click="likeOrDisLikeArticle">
                    <i class="fa fa-star"
                       v-bind:class="[currUserHasLiked == true ? 'colorStar' : '']"
                    >
                    </i>
                </button>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<script>
import { LinkPlugin } from 'bootstrap-vue'
Vue.use(LinkPlugin)
export default {
    name: "ShowArticle",
    props: {
        article:{
            type: Object,
            required: true,
        },
        user:{
            type: Object,
            required: false,
        }
    },
    data() {
        return {
            authenticated: false,
            currUserHasLiked: false,
            fallback: '/storage/images/fallback.jpg',
        };
    },
    created() {
        if(this.user !== undefined){
            this.authenticated = true;
        }
        this.checkIfUserHasLiked();
    },
    methods: {
        buttonFunction(link){
            window.open("https://"+link);
        },
        goBack(){
            history.back();
        },
        checkIfUserHasLiked() {
            axios.get(`/axios/article/${this.article.id}/checkLikes`)
                .then(response => {
                    if (response.data === 1) {
                        this.currUserHasLiked = true;
                    } else {
                        this.currUserHasLiked = false;
                    }
                });
        },
        likeOrDisLikeArticle() {
            if (this.currUserHasLiked == false) {
                this.likeArticle();
            } else {
                this.disLikeArticle();
            }
        },
        likeArticle() {
            axios.post(`/axios/article/${this.article.id}/like`)
                .then(response => {
                    if (response.status == 200) {
                        if (response.data === 1) {
                            this.currUserHasLiked = true;
                        }
                        this.$toast.success(`U heeft ${this.article.title} toegevoegd aan uw favorieten!`);
                    }
                });
        },
        disLikeArticle() {
            axios.post(`/axios/article/${this.article.id}/dislike`)
                .then(response => {
                    if (response.status == 200) {
                        console.log(response);
                        if (response.data === 1) {
                            this.currUserHasLiked = false;
                        } else {
                            console.log("something went wrong!")
                        }
                    }
                });
        },
    },
}
</script>
<style scoped>
.colorStar {
    color: orange;
}
</style>
