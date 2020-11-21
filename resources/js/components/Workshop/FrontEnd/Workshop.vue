<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center py-3">
                    <h1 class="h1 font-w700 mb-2 display-3">{{ workshop.title }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center w-100">
                    <img :src="workshop.image_location">
                </div>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h2 class="h1 font-w600 mb-2 display-3">{{ workshop.title }}</h2>
                        </div>
                    </div>
                </div>
                <div v-html="workshop.text"></div>
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
                <div v-html="workshop.agenda_link"></div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row py-3">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1 class="h4 font-w600 mb-2 display-5">Acties</h1>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" disabled><i class="fa fa-star"></i></button>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<script>
export default {
name: "Workshop",
    props:[
      'workshop'
    ],
}
</script>

<style scoped>

</style>
