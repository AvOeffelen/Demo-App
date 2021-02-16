<template>
    <div>
        <b-row>
            <b-col align-self="center" cols="12" md="12" lg="12" sm="12">
                <b-button @click="goBack()" variant="primary">Terug</b-button>
                <div class="text-center w-100">
                    <div v-if="workshop.image_link != null">
                        <div class="article-show-image">
                            <img class="" v-bind:src="'../../' + workshop.image_link" />
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
                            <h3 class="h3 font-w400 mb-2 display-3">{{ workshop.title }}</h3>
                        </div>
                    </div>
                </div>
                <b-row>
                    <b-col cols="0" md="1" lg="1" sm="0"></b-col>
                    <b-col align-self="center" cols="12" md="10" lg="19" sm="12">
                        <div v-html="workshop.text"></div>
                    </b-col>
                    <b-col cols="0" md="1" lg="1" sm="0"></b-col>
                </b-row>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row py-3">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1 class="h4 font-w600 mb-2 display-5">Maak een afspraak</h1>
                        </div>
                    </div>
                </div>
                <div v-if="workshop.agenda_link !== null">
                    <div v-html="workshop.agenda_link"></div>
                </div>
                <div v-else>
                    <workshop-sign-up :workshop="workshop"></workshop-sign-up>
                </div>
            </div>
            <div class="col-md-2"></div>
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
                <button class="btn btn-primary" @click="likeOrDisLikeWorkshop">
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
export default {
    name: "Workshop",
    props: {
        workshop:{
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
            default_image: 'https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg',
        };
    },
    created() {
        if(this.user !== undefined){
            this.authenticated = true;
        }
        this.checkIfUserHasLiked();
    },
    methods: {
        checkIfUserHasLiked() {
            axios.get(`/axios/workshop/${this.workshop.id}/checkLikes`)
                .then(response => {
                    if (response.data === 1) {
                        this.currUserHasLiked = true;
                    } else {
                        this.currUserHasLiked = false;
                    }
                });
        },
        likeOrDisLikeWorkshop() {
            if (this.currUserHasLiked == false) {
                this.likeWorkshop();
            } else {
                this.disLikeWorkshop();
            }
        },
        likeWorkshop() {
            axios.post(`/axios/workshop/${this.workshop.id}/like`)
                .then(response => {
                    if (response.status == 200) {
                        if (response.data === 1) {
                            this.currUserHasLiked = true;
                        }
                        console.log("haaaaaaaaaaaaaaalo?");
                        this.$toast.success(`U heeft ${this.workshop.title} toegevoegd aan uw favorieten!`);
                    }
                });
        },
        disLikeWorkshop() {
            axios.post(`/axios/workshop/${this.workshop.id}/dislike`)
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
