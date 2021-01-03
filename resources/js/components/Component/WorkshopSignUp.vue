<template>
    <div>
        <b-row>
            <b-col cols="12" lg="3" xl="3" md="0" sm="0"></b-col>
            <b-col cols="12" lg="6" xl="6" md="12" sm="12">
                <b-form-group
                    v-bind:class="[this.errors.name ? 'text-primary':'' ]"
                    id="input-group-1"
                    label="Naam:"
                    label-for="input-name"
                    class="text-left"
                >
                    <b-form-input
                        v-bind:class="[this.errors.name ? 'decoratedErrorField':'' ]"
                        id="input-name"
                        v-model="contact.name"
                        placeholder=""
                    ></b-form-input>
                    <p v-if="this.errors.name" class="text-primary">{{ this.errors['name'][0] }}</p>
                </b-form-group>
            </b-col>
            <b-col cols="12" lg="3" xl="3" md="0" sm="0"></b-col>
        </b-row>
        <b-row>
            <b-col cols="12" lg="3" xl="3" md="0" sm="0"></b-col>
            <b-col cols="12" lg="6" xl="6" md="12" sm="12">
                <b-form-group
                    v-bind:class="[this.errors.email ? 'text-primary':'' ]"
                    id="input-group-email"
                    label="E-mail adres:"
                    label-for="input-email"
                    class="text-left"
                >
                    <b-form-input
                        v-bind:class="[this.errors.email ? 'decoratedErrorField':'' ]"
                        id="input-email"
                        v-model="contact.email"
                        type="email"
                        placeholder=""
                    ></b-form-input>
                    <p v-if="this.errors.email" class="text-primary">{{ this.errors['email'][0] }}</p>
                </b-form-group>
            </b-col>
            <b-col cols="12" lg="3" xl="3" md="0" sm="0"></b-col>
        </b-row>
        <b-row>
            <b-col cols="12" lg="3" xl="3" md="0" sm="0"></b-col>
            <b-col cols="12" lg="6" xl="6" md="12" sm="12">
                <b-form-group
                    v-bind:class="[this.errors.employee_id ? 'text-primary':'' ]"
                    id="input-group-employee"
                    label="Personeelsnummer"
                    label-for="input-employee"
                    class="text-left"
                >
                    <b-form-input
                        v-bind:class="[this.errors.employee_id ? 'decoratedErrorField':'' ]"
                        id="input-employee"
                        v-model="contact.employee_id"
                        placeholder=""
                    ></b-form-input>
                    <p v-if="this.errors.employee_id" class="text-primary">{{ this.errors['employee_id'][0] }}</p>
                </b-form-group>
            </b-col>
            <b-col cols="12" lg="3" xl="3" md="0" sm="0"></b-col>
        </b-row>
        <b-row>
            <b-col cols="12" lg="3" xl="3" md="0" sm="0"></b-col>
            <b-col cols="12" lg="6" xl="6" md="12" sm="12">
                <b-button @click="submit" variant="primary">Aanmelden</b-button>
            </b-col>
            <b-col cols="12" lg="3" xl="3" md="0" sm="0"></b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    name: "WorkshopSignUp",
    props:[
      'workshop'
    ],
    data() {
        return {
            contact:{
                name:'',
                email:'',
                employee_id:'',
            },
            errors:[]
        };
    },
    methods:{
        submit(){
            let url = `/axios/workshop/${this.workshop.id}/sign-up`
            axios.post(url,this.contact)
                .then(response => {
                    if(response.status === 200){
                        this.$toast.success(response.data.message);
                        this.reset();
                    }
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        },
        reset(){
            this.contact.email = '';
            this.contact.employee_id = '';
            this.contact.name = '';
        }
    }
}
</script>
<style>
.decoratedErrorField {
    border: 2px solid #5a268c;
}
</style>
