<template>
    <div>
        <div class="article-container">

            <a class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
               v-bind:style="[article.image_link ?
                                        {
                                            'background':'url(/' + article.image_link + ')',
                                            'background-position': 'center',
                                            'background-size': 'cover',
                                            'background-repeat': 'no-repeat',
                                        } :
                                         {'background': 'url(/'+ default_image +')',
                                            'background-position': 'center',
                                            'background-size': 'cover',
                                            'background-repeat': 'no-repeat',}]"
               v-bind:href="'/article/'+ article.id +'/show'"
               data-toggle="click-ripple">
                <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286">
                    <div class="ribbon-box">
                        {{ category.display_name }}
                    </div>
                    <div class="pt-4 pb-6 px-md-3">
                        <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                            {{ article.title }}
                        </h3>
                        <div class="icon-container ">
                            <span v-if="article.type === 'video'"><i class="tile-icon fa fa-play fa-2x"></i></span>
                            <span v-else-if="article.type === 'podcast'"><i class="tile-icon fas fa-microphone-alt fa-2x"></i></span>
                            <span v-else><i class="tile-icon fas fa-glasses fa-2x"></i></span>
                        </div>
                    </div>

                </div>
            </a>

        </div>
    </div>
</template>

<script>
export default {
    name: "ArticleTile",
    props:{
        article:{
            type: Object,
            required:true
        },
        category:{
            type:Object,
            required:true,
        }
    },
    data(){
        return {
            default_image: 'storage/images/fallback.jpg',
        };
    }
}
</script>

<style scoped>

</style>
