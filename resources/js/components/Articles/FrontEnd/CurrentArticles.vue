<template>
    <div>
        <div class="bg-body-dark">
            <div class="content">
                <div class="text-center py-3">
                    <h1 class="h3 font-w700 mb-2">Actuele Artikelen</h1>
                </div>
        <b-row v-if="loading === true">
           <b-col>
             <div class="text-center">               
                <b-spinner style="width: 3rem; height: 3rem;" variant="primary" type="grow" label="Spinning"></b-spinner>             
             </div>
           </b-col>
        </b-row>
        <b-row v-else>
          <b-col
            cols="12"
            sm="12"
            md="12"
            lg="6"
            xl="6"
            class="d-md-flex align-items-md-stretch"
            v-if="categories[0].article[0]"
          >
            <a
              class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-600"
              v-bind:style="[
                categories[0].article[0].image_link
                  ? {
                      background:
                        'url(' + categories[0].article[0].image_link + ')',
                      'background-position': 'center',
                      'background-size': 'cover',
                      'background-repeat': 'no-repeat',
                    }
                  : { 'background-image': 'url(' + default_image + ');' },
              ]"
              v-bind:href="'/article/' + categories[0].article[0].id + '/show'"
              data-toggle="click-ripple"
            >
              <div
                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-600"
              >
                <div class="ribbon-box">
                  {{ categories[0].name }}
                </div>
                <div class="pt-4 pb-6 px-md-3">
                  <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                    {{ categories[0].article[0].title }}
                  </h3>
                </div>
              </div>
            </a>
          </b-col>
          <b-col
            cols="12"
            sm="12"
            md="12"
            lg="6"
            xl="6"
            v-if="categories[0].article[1]"
          >
            <a
              class="block block-transparent bg-image h-286"
              v-bind:style="[
                categories[0].article[1].image_link
                  ? {
                      background:
                        'url(' + categories[0].article[1].image_link + ')',
                      'background-position': 'center',
                      'background-size': 'cover',
                      'background-repeat': 'no-repeat',
                    }
                  : { 'background-image': 'url(' + default_image + ')' },
              ]"
              v-bind:href="'/article/' + categories[0].article[1].id + '/show'"
              data-toggle="click-ripple"
            >
              <div
                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286"
              >
                <div class="ribbon-box">
                  {{ categories[0].name }}
                </div>
                <div class="pt-4 pb-6 px-md-3">
                  <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                    {{ categories[0].article[1].title }}
                  </h3>
                </div>
              </div>
            </a>
            <div v-if="categories[0].article[2]">
              <a
                class="block block-transparent bg-image h-286"
                v-bind:style="[
                  categories[0].article[2].image_link
                    ? {
                        background:
                          'url(' + categories[0].article[2].image_link + ')',
                        'background-position': 'center',
                        'background-size': 'cover',
                        'background-repeat': 'no-repeat',
                      }
                    : { 'background-image': 'url(' + default_image + ')' },
                ]"
                v-bind:href="
                  '/article/' + categories[0].article[2].id + '/show'
                "
                data-toggle="click-ripple"
              >
                <div
                  class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286"
                >
                  <div class="ribbon-box">
                    {{ categories[0].name }}
                  </div>
                  <div class="pt-4 pb-6 px-md-3">
                    <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                      {{ categories[0].article[2].title }}
                    </h3>
                  </div>
                </div>
              </a>
            </div>
          </b-col>
          <b-col
            cols="12"
            sm="12"
            md="12"
            lg="4"
            xl="4"
            v-if="categories[0].article[3]"
          >
            <a
              class="block block-transparent bg-image h-286"
              v-bind:style="[
                categories[0].article[3].image_link
                  ? {
                      background:
                        'url(' + categories[0].article[3].image_link + ')',
                      'background-position': 'center',
                      'background-size': 'cover',
                      'background-repeat': 'no-repeat',
                    }
                  : { 'background-image': 'url(' + default_image + ')' },
              ]"
              v-bind:href="'/article/' + categories[0].article[3].id + '/show'"
              data-toggle="click-ripple"
            >
              <div
                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286"
              >
                <div class="ribbon-box">
                  {{ categories[0].name }}
                </div>
                <div class="pt-4 pb-6 px-md-3">
                  <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                    {{ categories[0].article[3].title }}
                  </h3>
                </div>
              </div>
            </a>
          </b-col>
          <b-col
            cols="12"
            sm="12"
            md="12"
            lg="4"
            xl="4"
            v-if="categories[0].article[4]"
          >
            <a
              class="block block-transparent bg-image h-286"
              v-bind:style="[
                categories[0].article[4].image_link
                  ? {
                      background:
                        'url(' + categories[0].article[4].image_link + ')',
                      'background-position': 'center',
                      'background-size': 'cover',
                      'background-repeat': 'no-repeat',
                    }
                  : { 'background-image': 'url(' + default_image + ')' },
              ]"
              v-bind:href="'/article/' + categories[0].article[4].id + '/show'"
              data-toggle="click-ripple"
            >
              <div
                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286"
              >
                <div class="ribbon-box">
                  {{ categories[0].name }}
                </div>
                <div class="pt-4 pb-6 px-md-3">
                  <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                    {{ categories[0].article[4].title }}
                  </h3>
                </div>
              </div>
            </a>
          </b-col>
          <b-col
            cols="12"
            sm="12"
            md="12"
            lg="4"
            xl="4"
            v-if="categories[0].article[5]"
          >
            <a
              class="block block-transparent bg-image h-286"
              v-bind:style="[
                categories[0].article[5].image_link
                  ? {
                      background:
                        'url(' + categories[0].article[5].image_link + ')',
                      'background-position': 'center',
                      'background-size': 'cover',
                      'background-repeat': 'no-repeat',
                    }
                  : { 'background-image': 'url(' + default_image + ')' },
              ]"
              v-bind:href="'/article/' + categories[0].article[5].id + '/show'"
              data-toggle="click-ripple"
            >
              <div
                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286"
              >
                <div class="ribbon-box">
                  {{ categories[0].name }}
                </div>
                <div class="pt-4 pb-6 px-md-3">
                  <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                    {{ categories[0].article[5].title }}
                  </h3>
                </div>
              </div>
            </a>
          </b-col>
          <b-col
            v-for="(article, index) in categories[0].article.slice(6)"
            cols="12"
            sm="12"
            md="12"
            lg="6"
            xl="6"
            :key="index"
          >
            <a
              class="block block-transparent w-100 d-md-flex align-items-md-stretch bg-image h-286"
              v-bind:style="[
                article.image_link
                  ? {
                      background: 'url(' + article.image_link + ')',
                      'background-position': 'center',
                      'background-size': 'cover',
                      'background-repeat': 'no-repeat',
                    }
                  : { 'background-image': 'url(' + default_image + ')' },
              ]"
              v-bind:href="'/article/' + article.id + '/show'"
              data-toggle="click-ripple"
            >
              <div
                class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-bottom h-286"
              >
                <div class="ribbon-box">Artikel</div>
                <div class="pt-4 pb-6 px-md-3">
                  <h3 class="h1 font-w700 text-white mb-1 text-shadow-workshops">
                    {{ article.title }}
                  </h3>
                </div>
              </div>
            </a>
          </b-col>
        </b-row>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CurrentArticles",
    created() {
        this.getCategories();
    },
    data() {
        return {
            loading: true,
            categories: [],
            articles: [],
            growthWorkshops: [],
            default_image: 'https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg',
            video_image: 'storage/images/youtube.png'
        };
    },
    methods: {
        getCategories() {
            axios.get('/axios/article/get-topical-categories')
                .then(response => {
                    this.categories = response.data;
                    this.loading = false;
                })
                .catch(error => {

                });
        }
    },
}
</script>

<style scoped>

</style>
