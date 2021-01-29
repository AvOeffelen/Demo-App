<template>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img class="img-avatar img-avatar96 img-avatar-thumb"
                                v-bind:src="'https://eu.ui-avatars.com/api/?name='+user.firstname+'+'+user.infix+'+'+user.lastname+'?size=128?bold=true?color=FFFFFF'"
                                alt="">
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                      {{user.firstname}} {{user.lastname}}
                                    </h5>
                                    <h6>
                                        {{user.type}}
                                    </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Over</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Workshops</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary profile-edit-btn" href="#" role="button" >Edit Profile</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <b>{{user.type}}</b>
                            <hr>
                            <b>Bravis Samen Vitaal</b>
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
                                        <p>{{user.firstname}} {{user.lastname}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{user.email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Geslacht</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p></p>
                                    </div>
                                </div>
                                <hr>
                                <label class="py-2">Your Bio</label><br/>
                                <p>Your detail description</p>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        
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
                        </div>
                    </div>
                </div>
            </form>           
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
