<template>
    <div>
        <b-modal visible header-class="preview-modal-header" size="xl" @hide="closeModal">
            <template #modal-header >ATTENTIE: DIT IS EEN VOORBEELD VAN UW WORKSHOP</template>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center py-3">
                        <h1 class="h3 font-w700 mb-2" v-if="workshop.title != ''">{{ workshop.title }}</h1>
                        <h1 class="h3 font-w700 mb-2" v-else>Titel</h1>
                        <h2 class="h5 font-w400 text-muted" v-if="workshop.sub_title != ''">{{ workshop.title }}</h2>
                        <h2 class="h5 font-w400 text-muted" v-else>Sub titel</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center w-100">
                        <img src="https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg">
                    </div>
                </div>
            </div>
            <div class="row py-3">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div v-if="workshop.text != ''" v-html="workshop.text" v-else="test">
                    </div>
                    <div v-else>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus magna id leo imperdiet ultrices. Ut ut magna lectus. Nunc fringilla turpis at tristique iaculis. Donec sed imperdiet magna, in tincidunt orci. Donec non porttitor leo, id consectetur ligula. Nulla id dui scelerisque, mollis lectus eu, maximus purus. Maecenas vestibulum, nunc ut dapibus facilisis, felis nulla condimentum tortor, a volutpat lectus diam eget enim. In condimentum eros non leo sagittis molestie. Nullam eget elit id arcu interdum maximus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus vel volutpat elit. Sed eu pulvinar lacus, id ornare purus. Maecenas aliquam faucibus iaculis.
                        </p>

                        <h2 class="h5 font-w400 text-muted">Alinea titel</h2>
                        <p>
                            Integer auctor cursus mauris vitae fermentum. Mauris egestas leo vel tellus dignissim laoreet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi auctor quam quis elit accumsan imperdiet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus scelerisque ultrices leo, eu malesuada velit dictum ac. Vivamus vitae molestie erat. Nullam dignissim nisl quis commodo aliquam. Nullam at sem tempus, molestie eros vitae, ultricies magna. Donec nec enim eu velit pulvinar vehicula eu nec enim. Maecenas hendrerit congue quam, eu tempor enim vulputate sed. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec aliquet ante ut pulvinar imperdiet. Curabitur fringilla vitae lectus sed tristique. Suspendisse rutrum ante lorem, in laoreet tellus accumsan quis.
                        </p>
                        <h2 class="h5 font-w400 text-muted">Alinea titel</h2>
                        <p>
                            Integer malesuada mi id ullamcorper aliquam. Aenean sit amet magna sit amet orci venenatis porttitor vel sit amet erat. Integer sodales consequat justo. In nec pulvinar augue, vel molestie leo.
                        </p>
                    </div>
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
                    <div v-if="workshop.agenda_link != ''" v-html="workshop.agenda_link"></div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row py-3">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <h1 class="h4 font-w600 mb-2 display-5">Wil je deze workshop bij uw favorieten toevoegen?</h1>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" disabled><i class="fa fa-star"></i></button>
                </div>
                <div class="col-md-2"></div>
            </div>
            <template #modal-footer>
                <b-button variant="alt-danger" class="btn btn-sm" @click="closeModal()">sluiten</b-button>
            </template>
        </b-modal>
    </div>
</template>

<script>
export default {
    name: "PreviewModal",
    props:[
        'workshop'
    ],
    data() {
        return {
        };
    },
    created() {
    },
    methods: {
        closeModal(){
            this.$root.$emit('closeModal');
            this.$emit('close');
        }
    }
}
</script>

<style scoped>
/deep/ .preview-modal-header {
    background: #fc0c1d;
    color: white;
}

</style>
