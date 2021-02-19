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
                    <div class="row py-3">
                        <div class="col-md-6">
                            <label for="title" v-bind:class="[this.errors.title ? 'text-primary':'' ]">
                                Titel
                            </label>
                            <b-input v-model="article.title"
                                     v-bind:class="[this.errors.title ? 'decoratedErrorField':'' ]"
                                     type="text"
                                     class="form-control"
                                     name="title"
                            />
                            <p v-if="this.errors.title" class="text-primary">{{ this.errors['title'][0] }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="example-hosting-vps">Categorie</label>
                            <select class="custom-select" id="example-hosting-vps" name="example-hosting-vps" v-model="article.category_id">
                                <option v-for="(category,key) in this.categories" :value="category.id" :key="key">
                                    {{ category.display_name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <b-row>
                        <b-col cols="12" sm="12" md="12" lg="12" xl="12">
                            <label for="article-type">Article type</label>
                            <select class="custom-select" id="article-type"
                                    v-bind:class="[this.errors.type ? 'decoratedErrorField':'' ]"
                                    v-model="article.type" @change="checkTypeSelected($event,article)">
                                <option v-for="(option,key) in this.articleTypeOptions" :value="option" :key="key">
                                    {{ option }}
                                </option>
                            </select>
                            <p v-if="this.errors.type" class="text-primary">{{ this.errors['type'][0] }}</p>
                        </b-col>
                    </b-row>
                    <b-row class="py-3">
                        <b-col cols="12"
                               sm="12"
                               md="12"
                               xl="12"
                               lg="12"
                               class="custom-file py-2"
                               v-if="uploadImage !== false">
                            <div>
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                <b-form-file
                                    v-model="image"
                                    accept="image/*"
                                    placeholder="Kies of drop een afbeelding hier"
                                    drop-placeholder="Drop afbeelding hier"
                                    v-bind:class="[this.errors.image ? 'decoratedErrorField':'' ]"/>
                                <p v-if="this.errors.image" class="text-primary">{{
                                        this.errors['image'][0]
                                    }}</p>
                            </div>
                        </b-col>
                    </b-row>
                    <b-row v-if="this.article.type === 'video' || selectedType === 'video'" class="pb-5">
                        <b-col cols="12"
                               sm="12"
                               md="12"
                               xl="12"
                               lg="12"
                               class="custom-file py-2">
                            <label for="example-hosting-vps">Video link</label>
                            <b-textarea v-model="article.video_link"
                                        v-bind:placeholder="'Embedded video link'"></b-textarea>
                        </b-col>
                    </b-row>
                    <b-row v-else></b-row>
                    <div class="row py-3">
                        <div class="col-md-12">
                            <label for="text-intro" v-bind:class="[this.errors.text ? 'text-primary':'' ]">
                                Text
                            </label>
                            <ckeditor :editor="editorType" class="ck-content-text"
                                      v-bind:class="[this.errors.text ? 'decoratedErrorField':'' ]"
                                      v-model="article.text"></ckeditor>
                            <p v-if="this.errors.text" class="text-primary">{{ this.errors['text'][0] }}</p>
                        </div>
                    </div>
                    <b-row class="py-3">
                        <b-col cols="12" md="12" lg="12" sm="12" xl="12">
                            <b-form-checkbox
                                v-model="showButtons"
                                name="show-contact-form"
                                inline
                            ><p>Button</p></b-form-checkbox>
                        </b-col>
                    </b-row>
                    <div class="row py-3" v-if="showButtons">
                        <div class="col-md-6">
                            <label v-bind:class="[this.errors.button_link ? 'text-primary':'' ]">
                                Button link 
                            </label>
                            <small class="pl-2">Zonder https://</small>
                            <b-input v-model="article.button_link" type="text" class="form-control" name="title"
                                     v-bind:class="[this.errors.button_link ? 'decoratedErrorField':'' ]"/>
                            <p v-if="this.errors.button_link" class="text-primary">{{
                                    this.errors['button_link'][0]
                                }}</p>
                        </div>
                        <div class="col-md-6">
                            <label v-bind:class="[this.errors.button_text ? 'text-primary':'' ]">
                                Button text
                            </label>
                            <b-input v-model="article.button_text" type="text" class="form-control" name="title"
                                     v-bind:class="[this.errors.button_text ? 'decoratedErrorField':'' ]"/>
                            <p v-if="this.errors.button_text" class="text-primary">{{
                                    this.errors['button_text'][0]
                                }}</p>
                        </div>
                    </div>
                    <b-row class="py-3">
                        <b-col cols="12" md="12" lg="12" sm="12" xl="12">
                            <b-form-checkbox
                                v-model="article.show_contact"
                                name="show-contact-form"
                                inline
                            ><p>Contact formulier</p></b-form-checkbox>
                        </b-col>
                    </b-row>
                    <div class="row py-3">
                        <div class="col-md-12">
                            <div class="text-right">
                                <button class="btn btn-alt-danger btn-sm" @click="cancel">Annuleer</button>
                                <button class="btn btn-primary btn-sm" @click="openPreviewModal">Bekijk voorbeeld
                                </button>
                                <b-button class="btn btn-alt-success btn-sm" @click="update">Opslaan</b-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <article-preview :article="this.article" v-if="showPreview == true"></article-preview>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

import {FormFilePlugin} from 'bootstrap-vue'
import ArticlePreview from "./ArticlePreview";

Vue.use(FormFilePlugin)

export default {
    name: "ArticleUpdate",
    components: {ArticlePreview},
    props: [
        'article'
    ],
    data() {
        return {
            showPreview: false,
            editorType: ClassicEditor,
            errors: [],
            categories: [],
            changedImage: false,
            image: null,
            uploadImage: true,
            showButtons:false,
            articleTypeOptions:[
                'article',
                'video',
                'podcast',
                'persoonlijke_begeleiding'
            ],
            selectedType:null,
        };
    },
    mounted() {
        this.$root.$on('closeModal', () => {
            this.showPreviewModal = false;
        });
    },
    created() {
        if (this.article.button_link !== null || this.article.button_text !== null){
            this.showButtons = true;
        }
        if (this.article.has_video === 1) {
            this.uploadImage = false;
        }
        this.getCategories();
    },
    methods: {
        checkTypeSelected(event,article){
            this.selectedType = event.target.value
            article.type = event.target.value
        },
        getCategories() {
            axios.get('/axios/article/get-categories')
                .then(response => {
                    this.categories = response.data;
                })
                .catch(error => {

                });
        },
        openPreviewModal() {

        },
        cancel() {
            window.location = '/backend/article/overview';
        },
        update(){
            this.errors = [];
            let data = new FormData();

            if (this.image !== null) {
                data.append('image_link', this.image)
                data.append('changed_image', "true")
            } else if (this.article.image_link !== null) {
                data.append('image_link', this.article.image_link)
            }

            data.append('type',this.article.type)

            if(this.article.button_text !== null){
                data.append('button_text', this.article.button_text);
            }
            if(this.article.button_link !== null){
                data.append('button_link', this.article.button_link);
            }
            if (this.article.show_contact === true) {
                data.append('show_contact', this.article.show_contact);
            }
            data.append('id', this.article.id);
            data.append('image', this.image)
            data.append('title', this.article.title);
            data.append('category_id', this.article.category_id);
            data.append('text', this.article.text);
            data.append('video_link', this.article.video_link);
            data.append('button_link', this.article.button_link);
            data.append('button_text', this.article.button_text);


            axios.post('/axios/article/put', data)
                .then(response => {
                    if (response.status === 200) {
                        setTimeout(() => {
                            window.location = '/backend/article/overview';
                        }, 1000);
                    }
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        },
    }
}
</script>

<style scoped>

</style>
