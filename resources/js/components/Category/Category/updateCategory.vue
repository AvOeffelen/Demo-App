<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title"></h3>
                        <div class="text-right">

                        </div>
                    </div>
                    <div class="block-content">
                        <b-row class="py-3">
                            <div class="col-md-6">
                                <label for="title" v-bind:class="[this.errors.name ? 'text-primary':'' ]">
                                    Name
                                </label>
                                <b-input v-model="category.name"
                                         v-bind:class="[this.errors.title ? 'decoratedErrorField':'' ]"
                                         type="text"
                                         class="form-control"
                                         name="name"
                                />
                                <p v-if="this.errors.name" class="text-primary">{{ this.errors['name'][0] }}</p>
                            </div>
                        </b-row>
                        <b-row class="py-3">
                            <div class="col-md-6">
                                <label for="title" v-bind:class="[this.errors.title ? 'text-primary':'' ]">
                                    Display Name
                                </label>
                                <b-input v-model="category.display_name"
                                         v-bind:class="[this.errors.display_name ? 'decoratedErrorField':'' ]"
                                         type="text"
                                         class="form-control"
                                         name="display_name"
                                />
                                <p v-if="this.errors.display_name" class="text-primary">{{ this.errors['display_name'][0] }}</p>
                            </div>
                        </b-row>
                        <b-row class="py-3">
                            <div class="col-md-12">
                                <div class="text-right">
                                    <button class="btn btn-alt-danger btn-sm" @click="cancel">Annuleer</button>
                                    <b-button class="btn btn-alt-success btn-sm" @click="submit">Opslaan</b-button>
                                </div>
                            </div>
                        </b-row>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "updateCategory",
    props:[
        'category'
    ],
    data(){
        return{
          errors:[],
        };
    },
    methods:{
        submit(){
            axios.put(`/axios/categories/article/${this.category.id}/update`,this.category)
            .then( response => {
                if (response.status === 200){
                    setTimeout(() => {
                        window.location = '/backend/categories/overview';
                    },1000);
                }
            }).catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
            })
        },
        cancel() {
            window.location = '/backend/categories/overview';
        },
    },
}
</script>

<style scoped>
.decoratedErrorField {
    border: 2px solid #fc0c1d;
}
</style>
