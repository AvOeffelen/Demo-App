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
                            <select class="custom-select" id="example-hosting-vps" name="example-hosting-vps"  v-model="workshop.workshop_category_id">
                                <option v-for="(category,key) in this.categories"
                                        v-bind:value="category.id"
                                        :key="key">
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-6">
                            <label for="start">Start datum</label>
                            <b-input-group class="mb-3">
                                <b-form-input
                                    id="start"
                                    v-model="workshop.start"
                                    type="text"
                                    placeholder="Start datum"
                                    autocomplete="off"
                                    disabled
                                ></b-form-input>
                                <b-input-group-append>
                                    <b-form-datepicker
                                        v-model="workshop.start"
                                        button-variant="primary"
                                        button-only
                                        right
                                        locale="en-US"
                                        aria-controls="example-input"
                                        @context="onContextStart"
                                    ></b-form-datepicker>
                                </b-input-group-append>
                            </b-input-group>
                        </div>
                        <div class="col-md-6">
                            <label for="end">Eind datum</label>
                            <b-input-group class="mb-3">
                                <b-form-input
                                    id="end"
                                    v-model="workshop.end"
                                    type="text"
                                    placeholder="Eind datum"
                                    autocomplete="off"
                                    disabled
                                ></b-form-input>
                                <b-input-group-append>
                                    <b-form-datepicker
                                        v-model="workshop.end"
                                        button-variant="primary"
                                        button-only
                                        right
                                        locale="en-US"
                                        aria-controls="start"
                                        @context="onContextEnd"
                                    ></b-form-datepicker>
                                </b-input-group-append>
                            </b-input-group>
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
                text: '',
                agenda_link: null,
                workshop_category_id: 1,
                start: null,
                end:null,
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
        /**
         * submit the form
         */
        submit() {
            let config = {
                header: {
                    'Content-Type': 'multipart/form-data'
                }
            }

            let data = new FormData();
            if(this.image != null){
                data.append('image',this.image);
            }

            if(this.workshop.agenda_link != null) {
                data.append('agenda_link', this.workshop.agenda_link);
            }

            if(this.workshop.start != null){
                data.append('start',this.workshop.start);
            }


            if(this.workshop.end != null){
                data.append('end',this.workshop.end);
            }

            data.append('title',this.workshop.title);
            data.append('workshop_category_id',this.workshop.workshop_category_id);
            data.append('text',this.workshop.text);
            let url = '/axios/workshop/post';
            axios.post(url, data)
                .then(response => {
                    if(response.status === 200){
                        setTimeout(()=>{
                            window.location = '/backend/workshop/overview';
                        },1000)
                    }
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        },
        getCategories() {
            axios.get('/axios/workshop/get-categories')
                .then(response => {
                    this.categories = response.data;
                })
                .catch(error => {

                });
        },
        reset() {
            this.workshop.title = '';
            this.workshop.agenda_link = null;
            this.workshop.text = '';
            this.workshop.workshop_category_id = 1;
            this.workshop.start = '';
            this.workshop.end = '';
            this.image = null;
        },
        cancel() {

        },
        openPreviewModal() {
            this.showPreview = true;
        },
        onContextEnd(ctx) {
            // The date formatted in the locale, or the `label-no-date-selected` string
            // this.workshop.end = ctx.selectedFormatted
            // The following will be an empty string until a valid date is entered
            this.workshop.end = ctx.selectedYMD
        },
        onContextStart(ctx) {
            // The date formatted in the locale, or the `label-no-date-selected` string
            // this.workshop.end = ctx.selectedFormatted
            // The following will be an empty string until a valid date is entered
            this.workshop.start = ctx.selectedYMD
        }
    }
}
</script>

<style>
.ck-content-text {
    height: 500px;
}

.decoratedErrorField {
    border: 2px solid #5a268c;
}

textarea {
    width: 100%;
}

.textwrapper {
    margin: 5px 0;
    padding: 3px;
}

</style>
