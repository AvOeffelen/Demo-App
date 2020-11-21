<template>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title"></h3>
                    <div class="text-right">

                    </div>
                </div>
                <div class="block-content">
                    <form>
                        <div class="row py-3">
                            <div class="col-md-6">
                                <label for="title">Workshop titel</label>
                                <b-input v-model="workshop.title" type="text" class="form-control" name="title"/>
                            </div>
                            <div class="col-md-6">
                                <label for="example-hosting-vps">Workshop categorie</label>
                                <select class="custom-select" id="example-hosting-vps" name="example-hosting-vps">
                                    <option v-for="(category,key) in this.categories" :value="category.id">{{category.name}}</option>
                                </select>
                            </div>
                        </div>
                        <b-row>
                            <b-col lg="12" md="12" sm="12" xl="12">
                                <div class="">
                                    <label for="sub_title">Workshop subtitel</label>
                                    <b-input v-model="workshop.sub_title" type="text" class="form-control" name="sub_title"/>
                                </div>
                            </b-col>
                        </b-row>
                        <div class="row py-3">
                            <div class="col-md-6">
                                <label>Start datum</label>
                                <div class="input-group">
                                    <flat-pickr v-model="workshop.start" :config="flatpickrConfig" placeholder="Selecteer datum"></flat-pickr>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Eind datum</label>
                                <div class="input-group">
                                    <flat-pickr v-model="workshop.end" :config="flatpickrConfig"  placeholder="Selecteer datum"></flat-pickr>
                                </div>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Afbeelding</label>
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" class="custom-file-input custom-file-input-alt"
                                               data-toggle="custom-file-input"
                                               id="example-file-input-custom" name="example-file-input-custom">
                                        <label class="custom-file-label" for="example-file-input-custom">Selecteer
                                            afbeelding</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md-12">
                                <label for="text-intro">Omschrijving</label>
                                <ckeditor :editor="editorType" class="ck-content-text" v-model="workshop.text"></ckeditor>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md-12">
                                <label for="agenda-link">Agenda link</label>
                                <ckeditor :editor="editorType" v-model="workshop.link"></ckeditor>
                            </div>
                        </div>
                    </form>
                    <div class="row py-3">
                        <div class="col-md-12">
                            <div class="text-right">
                                <button class="btn btn-alt-danger btn-sm" @click="reset()">Reset</button>
                                <button class="btn btn-alt-danger btn-sm" @click="cancel">Annuleer</button>
                                <button class="btn btn-primary btn-sm" @click="openPreviewModal">Bekijk voorbeeld</button>
                                <b-button @click="submit" class="btn btn-alt-success btn-sm">Opslaan</b-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <preview-modal :workshop="this.workshop" v-if="showPreview == true"></preview-modal>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import {Dutch} from 'flatpickr/dist/l10n/nl.js';

export default {
    name: "WorkshopCreate",
    data() {
        return {
            categories: [],
            workshop: {
                title: '',
                sub_title: '',
                text:'',
                link:'',
                category_id: 1,
                start:  new Date(),
                end:  new Date(),
                image: '',
            },
            editorType:ClassicEditor,
            showPreview:false,
            flatpickrConfig:{
                wrap: true, // set wrap to true only when using 'input-group'
                altFormat: 'd-m-Y',
                altInput: true,
                dateFormat: 'd-m-Y',
                defaultDate: "today",
                locale: Dutch,
            }
        };
    },
    mounted(){
        this.getCategories();
        this.$root.$on('closeModal', () => {
            this.showPreview = false;
        });
    },
    methods: {
        getCategories() {
            axios.get('/axios/workshop/get-categories')
                .then(response => {
                    this.categories = response.data;
                })
                .catch(error => {

                });
        },
        /**
         * submit the form
         */
        submit() {
            console.log("posting");
            let url = '/axios/workshop/post';
            axios.post(url, this.workshop)
                .then(response => {

                })
                .catch(error => {

                });
        },
        reset() {
            this.workshop.title = '';
            this.workshop.sub_title = '';
            this.workshop.category_id = 1;
            this.workshop.start = '';
            this.workshop.end = '';
            this.workshop.image = '';
        },
        cancel() {

        },
        openPreviewModal() {
            this.showPreview = true;
        },
    }
}
</script>

<style scoped>
    .ck-content-text { height:500px; }
</style>
