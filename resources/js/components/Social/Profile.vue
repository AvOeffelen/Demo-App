<template>
    <div>
<div class="container test color-white">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3 test">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                      <a class="img-link">
                        <img class="img-avatar img-avatar96 img-avatar-thumb"
                                v-bind:src="'https://eu.ui-avatars.com/api/?name='+user.firstname+'+'+user.infix+'+'+user.lastname+'?size=128?bold=true?color=FFFFFF'"
                                alt="">
                        </a>
                    <div class="mt-3">
                      <h4>{{user.firstname}} {{user.lastname}}</h4>
                      <p class="text-secondary mb-1">Medewerkerr</p>
                    </div>
                 </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Naam</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{user.firstname}} {{user.lastname}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{user.email}}
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
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Dummy text</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Lorem ipsum
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>


        <div class="content content-full content-boxed">
            <h2 class="content-heading">
                <i class="si si-star mr-1"></i> Mijn favoriete workshops
            </h2>
            <div v-if="loading">
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
            <div v-else>
                <b-row>
                    <b-col cols="12" sm="12" md="6" xl="4" lg="4" v-for="(workshop,index) in this.workshops" :key="index">
                        <div class="block block-rounded text-center">
                            <div class="block-content block-content-full bg-image"
                                 v-bind:style="[workshop.image_name ?
                                    {'background': 'url(' +'../../'+ workshop.image_name + ') center'} :
                                     {'background-image': 'url('+ default_image +')'},
                                     {'background-size': 'cover'}
                                     ]"
                                 style="height: 250px;">
                            </div>
                            <div class="block-content block-content-full block-content-sm bg-body-light">
                                <div class="font-w600">{{ workshop.title }}</div>
                            </div>
                            <div class="block-content block-content-full">
                                <a class="btn btn-sm btn-light" v-bind:href="`/workshop/${workshop.id}/show`">
                                    <i class="fa fa-search text-muted mr-1"></i> Bekijk
                                </a>
                            </div>
                        </div>
                    </b-col>
                </b-row>
            </div>

        </div>

    </div>
</template>

<script>
export default {
    name: "Profile",
    props: [
        'user'
    ],
    data() {
        return {
            loading: true,
            default_image: 'https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg',
            workshops:[]
        };
    },
    created() {
      this.getFavoritesForUser();
    },
    methods: {
        getFavoritesForUser() {
            axios.get('/axios/me/favorited')
                .then(response => {
                    if(response.status === 200){
                        this.loading = false;
                        this.workshops = response.data;
                    }
                });
        },
    }
}
</script>

<style scoped>

</style>
