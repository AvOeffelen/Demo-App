<template>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title"></h3>
                </div>
                <div class="block-content">
                    <div class="row py-3">
                        <div class="col-md-6">
                            <label for="title" v-bind:class="[this.errors.title ? 'text-primary':'' ]">Workshop
                                titel</label>
                            <b-input v-model="workshop.title" type="text" class="form-control" name="title"
                                     v-bind:class="[this.errors.title ? 'decoratedErrorField':'' ]"/>
                            <p v-if="this.errors.title" class="text-primary">{{ this.errors['title'][0] }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="example-hosting-vps">Workshop categorie</label>
                            <select class="custom-select" id="example-hosting-vps" name="example-hosting-vps">
                                <option v-for="(category,key) in this.categories" :value="category.id"
                                        v-model="workshop.workshop_category_id">
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <b-row>
                        <b-col lg="12" md="12" sm="12" xl="12">
                            <div class="">
                                <label for="sub_title" v-bind:class="[this.errors.sub_title ? 'text-primary':'' ]">Workshop
                                    sub titel
                                </label>
                                <b-input v-model="workshop.sub_title" type="text" class="form-control"
                                         v-bind:class="[this.errors.sub_title ? 'decoratedErrorField':'' ]"
                                         name="sub_title"/>
                                <p v-if="this.errors.sub_title" class="text-primary">
                                    {{ this.errors['sub_title'][0] }}
                                </p>
                            </div>
                        </b-col>
                    </b-row>
                    <div class="row py-3">
                        <div class="col-md-6">
                            <label>Start datum</label>
                            <div class="input-group">
                                <flat-pickr v-model="workshop.start" :config="flatpickrConfig"
                                            placeholder="Selecteer datum"></flat-pickr>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Eind datum</label>
                            <div class="input-group">
                                <flat-pickr v-model="workshop.end" :config="flatpickrConfig"
                                            placeholder="Selecteer datum"></flat-pickr>
                            </div>
                        </div>
                    </div>
                    <b-row class="py-3">
                        <b-col cols="12">
                            <div class="form-group">
                                <label>Afbeelding</label>
                                <div class="custom-file">
                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                    <b-form-file
                                        v-model="image"
                                        @change="testFunc()"
                                        accept="image/*"
                                        placeholder="Kies of drop een afbeelding hier"
                                        drop-placeholder="Drop afbeelding hier"
                                    />
                                </div>
                            </div>
                        </b-col>
                    </b-row>
                    <div class="row py-3">
                        <div class="col-md-12">
                            <label v-bind:class="[this.errors.text ? 'text-primary':'' ]">Text</label>
                            <ckeditor :editor="editorType" id="workshop-text" class="ck-content-text"
                                      v-bind:class="[this.errors.text ? 'decoratedErrorField':'' ]"
                                      v-model="workshop.text"></ckeditor>
                            <p v-if="this.errors.text" class="text-primary">{{ this.errors['text'][0] }}</p>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-12">
                            <label for="agenda-link" v-bind:class="[this.errors.link ? 'text-primary':'' ]">Agenda
                                link</label>
                            <div class="textwrapper">
                                <textarea id="agenda-link" class="form-control"
                                          v-bind:class="[this.errors.link ? 'text-primary':'' ]"
                                          v-model="workshop.agenda_link"></textarea>
                                <p v-if="this.errors.link" class="text-primary">{{ this.errors['link'][0] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-12">
                            <div class="text-right">
                                <button class="btn btn-alt-danger btn-sm" @click="reset()">Reset</button>
                                <button class="btn btn-alt-danger btn-sm" @click="cancel">Annuleer</button>
                                <button class="btn btn-primary btn-sm" @click="openPreviewModal">Bekijk voorbeeld
                                </button>
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
import {FormFilePlugin} from 'bootstrap-vue'

Vue.use(FormFilePlugin)

export default {
    name: "WorkshopCreate",
    data() {
        return {
            categories: [],
            workshop: {
                title: '',
                sub_title: '',
                text: '',
                agenda_link: '',
                category_id: 1,
                start: new Date(),
                end: new Date(),
            },
            image: null,
            editorType: ClassicEditor,
            showPreview: false,
            flatpickrConfig: {
                wrap: true, // set wrap to true only when using 'input-group'
                altFormat: 'd-m-Y',
                altInput: true,
                dateFormat: 'd-m-Y',
                defaultDate: "today",
                locale: Dutch,
            },
            errors: false,
        };
    },
    mounted() {
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
        postImage(workshop) {

            let data = new FormData();

            let config = {
                header: {
                    'Content-Type': 'image/*'
                }
            }
            data.append('workshop_id', workshop.id)
            data.append('image', this.image);
            let url = '/axios/workshop/image/upload';
            axios.post(url, data, config)
                .then(response => {
                    if (response.status === 200) {
                        window.location = '/backend/workshop/overview';
                    }
                })
                .catch(error => {
                    console.log("couldnt upload image.. i have no clue what happend");
                });
        },
        /**
         * submit the form
         */
        submit() {
            let url = '/axios/workshop/post';
            axios.post(url, this.workshop)
                .then(response => {
                    if (response.status === 201) {
                        if (this.image != null) {
                            this.postImage(response.data)
                        } else {
                            window.location = '/backend/workshop/overview';
                        }
                    }
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        },
        reset() {
            this.workshop.title = '';
            this.workshop.agenda_link = '';
            this.workshop.text = '';
            this.workshop.sub_title = '';
            this.workshop.category_id = 1;
            this.workshop.start = '';
            this.workshop.end = '';
            this.image = null;
        },
        cancel() {

        },
        openPreviewModal() {
            this.showPreview = true;
        },
        testFunc() {
            console.log(this.workshop.image)
        }
    }
}
</script>

<style>
.ck-content-text {
    height: 500px;
}

.decoratedErrorField {
    border: 2px solid #fc0c1d;
}

textarea {
    width: 100%;
}

.textwrapper {
    margin: 5px 0;
    padding: 3px;
}

</style>
