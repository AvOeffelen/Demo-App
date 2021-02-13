<template>
    <div>
        <div class="row">
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
                <a href="javascript:history.back()" class="btn btn-primary">Back</a>
            </div>
            <div class="col-md-12 col-lg-8 col-xl-8 col-12 col-sm-12 col-xs-12">
                <h3>Contact</h3>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2 col-12 col-sm-12 col-xs-12 cols-12">
            </div>
        </div>
        <b-row>
            <b-col cols="12" md="12">
                <b-row>
                    <b-col cols="3"></b-col>
                    <b-col cols="6">
                        <b-form-group
                            v-bind:class="[this.errors.name ? 'text-primary':'' ]"
                            id="input-group-1"
                            label="Naam"
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
                        <b-form-group
                            v-bind:class="[this.errors.email ? 'text-primary':'' ]"
                            id="input-group-2"
                            label="Email"
                            label-for="input-email"
                            class="text-left"
                            type="email"
                        >
                            <b-form-input
                                v-bind:class="[this.errors.email ? 'decoratedErrorField':'' ]"
                                id="input-name"
                                v-model="contact.email"
                                placeholder=""
                            ></b-form-input>
                            <p v-if="this.errors.email" class="text-primary">{{ this.errors['email'][0] }}</p>
                        </b-form-group>
                        <b-form-group
                            v-bind:class="[this.errors.subject ? 'text-primary':'' ]"
                            id="input-group-3"
                            label="Onderwerp"
                            label-for="input-subject"
                            class="text-left"
                        >
                            <b-form-input
                                v-bind:class="[this.errors.subject ? 'decoratedErrorField':'' ]"
                                id="input-name"
                                v-model="contact.subject"
                                placeholder=""
                            ></b-form-input>
                            <p v-if="this.errors.subject" class="text-primary">{{ this.errors['subject'][0] }}</p>
                        </b-form-group>
                        <b-form-group
                            v-bind:class="[this.errors.message ? 'text-primary':'' ]"
                            id="input-group-4"
                            label="Bericht"
                            label-for="input-message"
                            class="text-left"
                        >
                            <b-textarea
                                v-bind:class="[this.errors.message ? 'decoratedErrorField':'' ]"
                                id="input-message"
                                v-model="contact.message"
                                placeholder=""
                            ></b-textarea>
                            <p v-if="this.errors.message" class="text-primary">{{ this.errors['message'][0] }}</p>
                        </b-form-group>
                        <div class="text-right">
                            <b-button variant="primary" @click="submit">Verstuur</b-button>
                        </div>
                    </b-col>
                    <b-col cols="3"></b-col>
                </b-row>
            </b-col>
        </b-row>
    </div>
</template>

<script>

export default {
    name: "GeneralContactForm",
    data() {
        return {
            errors: [],
            contact: {
                name: null,
                email: null,
                subject: null,
                message: null,
            }
        };
    },
    methods: {
        reset(){
          this.contact.name = null;
          this.contact.email = null;
          this.contact.subject = null;
          this.contact.message = null;
        },
        submit() {
            axios.post('/axios/contact/send', this.contact)
                .then(response => {
                    if (response.status === 200){
                        this.reset();
                        this.errors = [];
                        this.$toast.success(response.data.message);
                    }
                }).catch(error => {

                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
            });
        },
        cancel() {
            //magic..
        }
    }
}
</script>

<style scoped>

</style>
