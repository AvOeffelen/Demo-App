<template>
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">

                    <img class="img-avatar img-avatar96 img-avatar-thumb" v-if="person.avatar !== null"
                         v-bind:src="'/' + person.avatar.image_link"
                         alt="">
                    <img class="img-avatar img-avatar96 img-avatar-thumb" v-else
                         v-bind:src="'https://eu.ui-avatars.com/api/?name='+person.firstname+'+'+person.infix+'+'+person.lastname+'?size=128?bold=true?color=#FFFFFF'"
                         alt="">
                    <div class="file btn btn-lg btn-primary">
                        Change Photo
                        <b-form-file
                            v-model="avatar"
                            accept="image/*"
                            @change="detectNewAvatar"
                            placeholder="Kies of drop een afbeelding hier"
                            drop-placeholder="Drop afbeelding hier"
                            v-bind:class="[this.errors.avatar ? 'decoratedErrorField':'' ]"/>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{ person.firstname }} {{ person.infix }} {{ person.lastname }}
                    </h5>
                    <h6>
                        <span>{{ person.type === 'default' ? "medewerker" : person.type }}</span>
                    </h6>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">Over</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                               aria-controls="profile" aria-selected="false">Workshops</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="article-tab" data-toggle="tab" href="#article" role="tab"
                               aria-controls="article" aria-selected="false">Articles</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <!-- <a class="btn btn-primary profile-edit-btn text-right" href="#" role="button" >Edit Profile</a> -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <b>{{ person.type === 'default' ? "medewerker" : person.type }}</b>
                    <hr>
                    <b>Gelre Energiek</b>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Naam</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ person.firstname }} {{ person.infix }} {{ person.lastname }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ person.email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Geslacht</label>
                            </div>
                            <div class="col-md-6">
                                <p v-if="person.gender === 'woman'">Vrouw</p>
                                <p v-else-if="person.gender === 'man'">Man</p>
                                <p v-else-if="person.gender === 'different'">Anders</p>
                                <p v-else>Zeg ik liever niet</p>
                            </div>
                        </div>
                        <hr>
                        <!-- <label class="py-2">Your Bio</label><br/>
                        <p>Your detail description</p> -->
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <i class="si si-star mr-1 "></i> Mijn favoriete workshops
                                </p>
                                <div v-if="loadingWorkshops">
                                    <b-row>
                                        <b-col class="text-center">
                                            <b-spinner
                                                style="width: 3rem; height: 3rem;"
                                                variant="primary"
                                                type="grow"
                                            ></b-spinner>
                                        </b-col>
                                    </b-row>
                                </div>
                                <b-row v-else>
                                    <b-col cols="12" sm="12" md="6" xl="4" lg="4"
                                           v-for="(workshop,index) in this.workshops" :key="index">
                                        <div class="block block-rounded text-center">
                                            <div class="block-content block-content-full bg-image"
                                                 v-bind:style="[workshop.image_link ?
                                                          {'background': 'url(' +'../../'+ workshop.image_link + ') center'} :
                                                          {'background-image': 'url('+ default_image +')'},
                                                          {'background-size': 'cover'}
                                                          ]"
                                                 style="height: 250px;">
                                            </div>
                                            <div
                                                class="block-content block-content-full block-content-sm bg-body-light">
                                                <div class="font-w600">{{ workshop.title }}</div>
                                            </div>
                                            <div class="block-content block-content-full">
                                                <a class="btn btn-sm btn-light"
                                                   v-bind:href="`/workshop/${workshop.id}/show`">
                                                    <i class="fa fa-search text-muted mr-1"></i> Bekijk
                                                </a>
                                            </div>
                                        </div>
                                    </b-col>
                                </b-row>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="article" role="tabpanel" aria-labelledby="article-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <i class="si si-star mr-1 "></i>
                                    Mijn favoriete artikelen
                                </p>
                                <div v-if="loadingArticles">
                                    <b-row>
                                        <b-col class="text-center">
                                            <b-spinner
                                                style="width: 3rem; height: 3rem;"
                                                variant="primary"
                                                type="grow"
                                            ></b-spinner>
                                        </b-col>
                                    </b-row>
                                </div>
                                <b-row v-else>
                                    <b-col cols="12" sm="12" md="6" xl="4" lg="4"
                                           v-for="(article,index) in this.articles" :key="index">
                                        <div class="block block-rounded text-center">
                                            <div class="block-content block-content-full bg-image"
                                                 v-bind:style="[article.image_link ?
                                                          {'background': 'url(' +'../../'+ article.image_link + ') center'} :
                                                          {'background-image': 'url('+ default_image +')'},
                                                          {'background-size': 'cover'}
                                                          ]"
                                                 style="height: 250px;">
                                            </div>
                                            <div
                                                class="block-content block-content-full block-content-sm bg-body-light">
                                                <div class="font-w600">{{ article.title }}</div>
                                            </div>
                                            <div class="block-content block-content-full">
                                                <a class="btn btn-sm btn-light"
                                                   v-bind:href="`/article/${article.id}/show`">
                                                    <i class="fa fa-search text-muted mr-1"></i> Bekijk
                                                </a>
                                            </div>
                                        </div>
                                    </b-col>
                                </b-row>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {FormFilePlugin} from 'bootstrap-vue';

Vue.use(FormFilePlugin)
export default {
    name: "Profile",
    props: {
      user:{
          type:Object,
          required:true
      }
    },
    data() {
        return {
            loadingWorkshops: false,
            loadingArticles: false,
            default_image: 'https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg',
            workshops: [],
            articles: [],
            errors: [],
            avatar: null,
            person:null,
        };
    },
    created() {
        this.person = this.user
        this.loadingWorkshops = true
        this.getFavoriteWorkshops()
        this.loadingArticles = true
        this.getFavoriteArticles()
    },
    methods: {
        detectNewAvatar() {
            setTimeout(() => {
                this.uploadAvatar();
            }, 1000);
        },
        uploadAvatar() {

            let data = new FormData();

            data.append('avatar',this.avatar);
            data.append('user',this.user.email);

            axios.post(`axios/me/upload-avatar`, data)
                .then(response => {
                    if(response.status === 200){
                        this.$toast.success(`U avatar is gewijzigd.`);
                        this.person = this.user
                        window.location = '/me';
                    }
                }).catch(error => {
                    if(error.response.status === 422){
                        this.$toast.error(`Avatar niet gewijzigd. Probeer het nogmaals.`);
                    }
            });
        },
        getFavoriteWorkshops() {
            axios.get('/axios/me/favorite/workshop')
                .then(response => {
                    if (response.status === 200) {
                        this.loadingWorkshops = false
                        this.workshops = response.data
                    }
                });
        },
        getFavoriteArticles() {
            axios.get('/axios/me/favorite/article')
                .then(response => {
                    if (response.status === 200) {
                        this.loadingArticles = false
                        this.articles = response.data
                    }
                });
        },
    }
}
</script>

<style scoped>
.decoratedErrorField {
    border: 2px solid #fc0c1d;
}
</style>
