<template>
    <div>
        <div class="bg-image">
            <div class="bg-black-25">
                <div class="content content-full">
                    <div class="py-5 text-center">
                        <a class="img-link">
                            <img class="img-avatar img-avatar96 img-avatar-thumb"
                                 v-bind:src="'https://eu.ui-avatars.com/api/?name='+user.firstname+'+'+user.infix+'+'+user.lastname+'?size=128?bold=true?color=FFFFFF'"
                                 alt="">
                        </a>
                        <h1 class="font-w700 my-2 text-white">{{
                                user.firstname + ' ' + user.infix + ' ' + user.lastname
                            }}</h1>
                        <!--                        <button type="button" class="btn btn-hero-primary">-->
                        <!--                            <i class="fa fa-fw fa-user-edit mr-1"></i> Bewerk profiel-->
                        <!--                        </button>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
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
                    <b-col cols="12" sm="12" md="6" xl="3" lg="3" v-for="(workshop,index) in this.workshops" :key="index">
                        <div class="block block-rounded text-center">
                            <div class="block-content block-content-full bg-image"
                                 v-bind:style="[workshop.image_name ?
                                    {'background': 'url(' +'../../'+ workshop.image_name + ') center'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                 style="height: 150px;">
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
