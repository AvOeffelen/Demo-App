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
                                <label for="title" v-bind:class="[this.errors.title ? 'text-primary':'' ]">
                                    Titel
                                </label>
                                <b-input v-model="tempWorkshop.title"
                                         v-bind:class="[this.errors.title ? 'decoratedErrorField':'' ]"
                                         type="text"
                                         class="form-control"
                                         name="title"
                                />
                                <p v-if="this.errors.title" class="text-primary">{{ this.errors['title'][0] }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="example-hosting-vps">Categorie</label>
                                <select class="custom-select" id="example-hosting-vps" name="example-hosting-vps"  v-model="workshop.workshop_category_id">
                                    <option v-for="(category,key) in this.categories" :value="category.id" :key="key">
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
                                        v-model="tempWorkshop.start"
                                        type="text"
                                        placeholder="Start datum"
                                        autocomplete="off"
                                        disabled
                                    ></b-form-input>
                                    <b-input-group-append>
                                        <b-form-datepicker
                                            v-model="tempWorkshop.start"
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
                                        v-model="tempWorkshop.end"
                                        type="text"
                                        placeholder="Eind datum"
                                        autocomplete="off"
                                        disabled
                                    ></b-form-input>
                                    <b-input-group-append>
                                        <b-form-datepicker
                                            v-model="tempWorkshop.end"
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
                                <label for="text-intro" v-bind:class="[this.errors.text ? 'text-primary':'' ]">
                                    Text
                                </label>
                                <ckeditor :editor="editorType" class="ck-content-text"
                                          v-bind:class="[this.errors.text ? 'decoratedErrorField':'' ]"
                                          v-model="tempWorkshop.text"></ckeditor>
                                <p v-if="this.errors.text" class="text-primary">{{ this.errors['text'][0] }}</p>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-md-12">
                                <label for="agenda-link" v-bind:class="[this.errors.link ? 'text-primary':'' ]">
                                    Agenda link
                                </label>
                                <textarea id="agenda-link" class="form-control"
                                          v-bind:class="[this.errors.link ? 'text-primary':'' ]"
                                          v-model="tempWorkshop.agenda_link"></textarea>
                                <p v-if="this.errors.link" class="text-primary">{{ this.errors['link'][0] }}</p>
                            </div>
                        </div>
                    </form>
                    <div class="row py-3">
                        <div class="col-md-12">
                            <div class="text-right">
                                <button class="btn btn-alt-danger btn-sm" @click="cancel">Annuleer</button>
                                <button class="btn btn-primary btn-sm" @click="openPreviewModal">Bekijk voorbeeld
                                </button>
                                <b-button class="btn btn-alt-success btn-sm" @click="submit">Opslaan</b-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <preview-modal :workshop="this.tempWorkshop" v-if="showPreview == true"></preview-modal>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
    name: "WorkshopUpdate",
    props: [
        'workshop'
    ],
    data() {
        return {
            editorType: ClassicEditor,
            showPreview: false,
            errors: false,
            image: null,
            categories:[],
            tempWorkshop:null,
        };
    },
    mounted() {
        this.tempWorkshop = this.workshop;
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
            this.errors = [];
            let data = new FormData();

            if(this.image != null){
                data.append('image_link', this.image)
                data.append('changed_image', "true")
            }else if(this.workshop.image_name !== null){
                data.append('image_name', this.workshop.image_name)
            }

            if(this.tempWorkshop.agenda_link != null){
                data.append('agenda_link',this.tempWorkshop.agenda_link);
            }

            if(this.tempWorkshop.start != null){
                data.append('start',this.tempWorkshop.start);
            }


            if(this.tempWorkshop.end != null){
                data.append('start',this.tempWorkshop.end);
            }

            data.append('uploadImage', this.uploadImage);
            data.append('id', this.tempWorkshop.id);
            data.append('title', this.tempWorkshop.title);
            data.append('start', this.tempWorkshop.start);
            data.append('end', this.tempWorkshop.end);
            data.append('workshop_category_id', this.tempWorkshop.workshop_category_id);
            data.append('text', this.tempWorkshop.text);

            axios.post('/axios/workshop/put', data)
                .then(response => {
                    if (response.status === 200) {
                        setTimeout(() => {
                            window.location = '/backend/workshop/overview';
                        }, 1000);
                    }
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        },
        cancel() {
            window.location = '/backend/workshop/overview';
        },
        openPreviewModal() {
            this.showPreview = true;
        },
        onContextEnd(ctx) {
            // The date formatted in the locale, or the `label-no-date-selected` string
            // this.workshop.end = ctx.selectedFormatted
            // The following will be an empty string until a valid date is entered
            this.tempWorkshop.end = ctx.selectedYMD
        },
        onContextStart(ctx) {
            // The date formatted in the locale, or the `label-no-date-selected` string
            // this.workshop.end = ctx.selectedFormatted
            // The following will be an empty string until a valid date is entered
            this.tempWorkshop.start = ctx.selectedYMD
        }
    }
}
</script>

<style scoped>
.ck-content-text {
    height: 500px;
}


.decoratedErrorField {
    border: 2px solid #5a268c;
}
textarea
{
    width:100%;
}
.textwrapper
{
    margin:5px 0;
    padding:3px;
}

</style>
