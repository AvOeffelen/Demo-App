<template>
    <div>
        <b-modal visible header-class="preview-modal-header" size="xl" @hide="closeModal">
            <template #modal-header>ATTENTIE: DIT IS HET VOORBEELD VAN UW ARTIKEL</template>
            <b-row class="row">
                <b-col cols="0" md="3" lg="3" sm="0"></b-col>
                <b-col align-self="center" cols="12" md="6" lg="6" sm="12">
                    <div class="text-center w-100">
                        <div v-if="article.has_video === 0">
                            <div class="" v-bind:style="[article.image_link ?
                                    {'background': 'url(' +'../../'+ article.image_link + ')',
                                        'background-position':'center',
                                        'background-size':'cover',
                                        'background-repeat': 'no-repeat'} :
                                     {'background-image': 'url('+ default_image +')'}]"
                                 style=" width:100%; height: 600px;">
                            </div>
                        </div>
                        <div v-else>
                            <div v-html="article.video_link"></div>
                        </div>
                    </div>
                </b-col>
                <b-col cols="0" md="3" lg="3" sm="0"></b-col>
            </b-row>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2 class="h1 font-w600 mb-2 display-3">{{ article.title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div v-if="article.text != ''">
                        <b-row>
                            <b-col cols="0" md="3" lg="3" sm="0"></b-col>
                            <b-col align-self="center" cols="12" md="6" lg="6" sm="12">
                                <div v-html="article.text"></div>
                            </b-col>
                            <b-col cols="0" md="3" lg="3" sm="0"></b-col>
                        </b-row>
                    </div>
                    <div v-else>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus magna id leo imperdiet
                            ultrices. Ut ut magna lectus. Nunc fringilla turpis at tristique iaculis. Donec sed
                            imperdiet magna, in tincidunt orci. Donec non porttitor leo, id consectetur ligula. Nulla id
                            dui scelerisque, mollis lectus eu, maximus purus. Maecenas vestibulum, nunc ut dapibus
                            facilisis, felis nulla condimentum tortor, a volutpat lectus diam eget enim. In condimentum
                            eros non leo sagittis molestie. Nullam eget elit id arcu interdum maximus. Pellentesque
                            habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Orci varius
                            natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus vel
                            volutpat elit. Sed eu pulvinar lacus, id ornare purus. Maecenas aliquam faucibus iaculis.
                        </p>

                        <h2 class="h5 font-w400 text-muted">Alinea titel</h2>
                        <p>
                            Integer auctor cursus mauris vitae fermentum. Mauris egestas leo vel tellus dignissim
                            laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                            curae; Morbi auctor quam quis elit accumsan imperdiet. Orci varius natoque penatibus et
                            magnis dis parturient montes, nascetur ridiculus mus. Phasellus scelerisque ultrices leo, eu
                            malesuada velit dictum ac. Vivamus vitae molestie erat. Nullam dignissim nisl quis commodo
                            aliquam. Nullam at sem tempus, molestie eros vitae, ultricies magna. Donec nec enim eu velit
                            pulvinar vehicula eu nec enim. Maecenas hendrerit congue quam, eu tempor enim vulputate sed.
                            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                            Donec aliquet ante ut pulvinar imperdiet. Curabitur fringilla vitae lectus sed tristique.
                            Suspendisse rutrum ante lorem, in laoreet tellus accumsan quis.
                        </p>
                        <h2 class="h5 font-w400 text-muted">Alinea titel</h2>
                        <p>
                            Integer malesuada mi id ullamcorper aliquam. Aenean sit amet magna sit amet orci venenatis
                            porttitor vel sit amet erat. Integer sodales consequat justo. In nec pulvinar augue, vel
                            molestie leo.
                        </p>
                    </div>
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
            <template #modal-footer>
                <b-button variant="alt-danger" class="btn btn-sm" @click="closeModal">sluiten</b-button>
            </template>
        </b-modal>
    </div>
</template>

<script>
export default {
    name: "ArticlePreview",
    props: [
        'article'
    ],
    data() {
        return {
            default_image: 'https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg',
        };
    },
    created() {
    },
    methods: {
        closeModal() {
            this.$root.$emit('closeModal');
            this.$emit('close');
        },
        buttonFunction(link){
            window.open("https://"+link);
        }
    }
}
</script>

<style scoped>
/deep/ .preview-modal-header {
    background: #3DBDDE;
    color: white;
}
</style>
