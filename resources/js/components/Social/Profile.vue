<template>
    <div class="container emp-profile">
        <div class="row">
           <div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <div class="profile-img">
                        <img class="img-avatar img-avatar128 img-avatar-thumb" v-if="person.avatar !== null"
                            v-bind:src="'/' + person.avatar.image_link"
                            alt="">
                        <img class="img-avatar img-avatar128 img-avatar-thumb" v-else
                            v-bind:src="'https://eu.ui-avatars.com/api/?name='+person.firstname+'+'+person.infix+'+'+person.lastname+'?size=128?bold=true?color=#FFFFFF'"
                            alt="">
                    </div>
                    <div class="">
                      <h4>{{ person.firstname }} {{ person.infix }} {{ person.lastname }}</h4>
                       <div class="file">
                            Pas foto aan
                            <b-form-file
                                v-model="avatar"
                                accept="image/*"
                                @change="detectNewAvatar"
                                placeholder="Kies of drop een afbeelding hier"
                                drop-placeholder="Drop afbeelding hier"
                                v-bind:class="[this.errors.avatar ? 'decoratedErrorField':'' ]"/>
                        </div>
                     <div class="mt-5"></div>
                      <button class="btn btn-primary">Voeg toe +</button>
                      <button class="btn btn-outline-primary">Bericht</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <i class="fas fa-heart"> Favoriete workshops</i> 
                    <span class="text-secondary">5</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <i class="far fa-heart"> Favoriete Artikelen</i> 
                    <span class="text-secondary">3</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                     <i class="fas fa-praying-hands"> Een statestiek</i> 
                    <span class="text-secondary">14</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                     <i class="far fa-address-book"> Andere statestiek</i>
                    <span class="text-secondary">1</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <i class="fas fa-balance-scale-left"> Stats hierplaatsen</i> 
                    <span class="text-secondary">5</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-7 mt-5">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Naam</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ person.firstname }} {{ person.infix }} {{ person.lastname }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ person.email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Geslacht</h6>
                    </div>
                    <div class="col-sm-9 text-secondary nostyle-p">
                        <p v-if="person.gender === 'woman'">Vrouw</p>
                        <p v-else-if="person.gender === 'man'">Man</p>
                        <p v-else-if="person.gender === 'different'">Anders</p>
                        <p v-else>Zeg ik liever niet</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Geboorte Datum</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      12-11-1996
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary">
                    <i class="fas fa-edit">Edit</i>      
                </button>
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
