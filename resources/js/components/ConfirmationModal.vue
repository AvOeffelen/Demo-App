<template>
    <b-modal visible @hide="closeModal">
        <p>Weet je zeker dat je dit wilt verwijderen?</p>
        <template #modal-footer>
            <b-button
                variant="primary"
                size="sm"
                class="float-right"
                @click="closeModal"
            >
                Close
            </b-button>
            <b-button
                variant="primary"
                size="sm"
                class="float-right"
                @click="confirm()"
            >
                Confirm
            </b-button>
        </template>
    </b-modal>
</template>

<script>
export default {
    name: "ConfirmationModal",
    props:[
      'item'
    ],
    mounted() {
        console.log("attemptingToOpen");
    },
    methods: {
        closeModal() {
            this.$root.$emit('closeConfirmationModal');
            this.$emit('close');
        },
        confirm(){
            this.$root.$emit('confirm',this.item);
            this.$emit('close');
        }
    }
}
</script>

<style scoped>

</style>
