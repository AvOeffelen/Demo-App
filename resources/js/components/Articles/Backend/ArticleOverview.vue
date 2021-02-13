<template>
    <div>
        <b-row class="pb-3">
            <b-col sm="6" md="6" lg="6" xl="6">
                <b-input-group size="sm">
                    <b-form-input
                        id="filter-input"
                        v-model="filter"
                        type="search"
                        placeholder="What are you looking for?"
                    ></b-form-input>
                    <b-input-group-append>
                        <b-button :disabled="!filter" @click="filter = ''" variant="primary">Reset</b-button>
                    </b-input-group-append>
                </b-input-group>
            </b-col>
            <b-col sm="3" md="3" lg="3" xl="3"></b-col>
            <b-col sm="3" md="3" lg="3" xl="3">
                <a href="/backend/article/create" class="btn btn-success btn-sm text-right" role="button" aria-disabled="true">Voeg artikel toe +</a>
            </b-col>
        </b-row>
        <b-row>
            <b-col>
                <b-table :items="items"
                         stacked="md"
                         :fields="fields"
                         :current-page="currentPage"
                         :per-page="perPage"
                         :filter="filter"
                         :filter-included-fields="filterOn"
                         @filtered="onFiltered"
                         responsive
                         selectable
                         striped
                         fixed
                         @row-selected="onRowSelected"
                >
                    <template v-slot:cell(id)="row" class="d-sm-none d-none">
                        {{ row.index + 1 }}
                    </template>
                    <template v-slot:cell(actions)="row" class="d-sm-none d-none"
                              :style="{ width: fields.fields === 'actions' ? '25px' : '180px' }">
                        <a v-bind:href="'/backend/article/overview/'+ row.item.id +'/update'" class="btn btn-primary"
                           variant="primary"><i class="fa fa-fw fa-pencil-alt"></i></a>
                        <b-button  variant="primary" @click="openPreviewModal(row.item)"><i class="fa fa-search"></i>
                        </b-button>
                        <b-button variant="primary" @click="openConfirmationModal(row.item)"><i class="fa fa-trash"></i>
                        </b-button>
                    </template>
                </b-table>
            </b-col>
        </b-row>
        <b-row align-h="between">
            <b-col sm="6" md="6" class="my-1" align-self="center">
                <b-pagination
                    v-model="currentPage"
                    :total-rows="totalRows"
                    :per-page="perPage"
                    size="sm"
                    class="my-0"
                ></b-pagination>
            </b-col>
            <b-col sm="" md="3" class="my-1">
                <b-row align-h="between">
                    <b-col>
                        <small>Per pagina</small>
                    </b-col>
                    <b-col sm="6" md="6" lg="6" xl="6">
                        <b-form-select
                            label="Aantal per pagina"
                            class="form-control"
                            v-model="perPage"
                            id="perPageSelect"
                            size="sm"
                            :options="pageOptions"
                        ></b-form-select>
                    </b-col>
                </b-row>
            </b-col>
        </b-row>
        <article-preview :article="article" v-if="showPreviewModal"></article-preview>
        <confirmation-modal v-if="showConfirmationModal" :item="workshop"></confirmation-modal>
    </div>
</template>

<script>
import ConfirmationModal from "../../ConfirmationModal";
import ArticlePreview from "./ArticlePreview";
export default {
    name: "ArticleOverview",
    components: {ArticlePreview, ConfirmationModal},
    data() {
        return {
            fields: [
                {
                    key: 'id',
                    label: 'ID',
                    sortable: false
                },
                {
                    key: 'title',
                    label: 'Titel',
                    sortable: true,
                },
                {
                    key: 'has_video',
                    label: 'Bevat video',
                    sortable: true,
                },
                {
                    key: 'category.display_name',
                    label: 'Categorie',
                    sortable: true,
                },
                {
                    key: 'actions',
                    label: 'Actions',
                    sortable: false
                }
            ],
            filter: null,
            filterOn: ['title'],
            selected: [],
            selectMode: 'single',
            items: [],
            totalRows: 2,
            currentPage: 1,
            perPage: 10,
            pageOptions: [10, 15, 25, 50, 75],
            article: null,
            showPreviewModal: false,
            showConfirmationModal: false,
        };
    },
    computed: {
        sortOptions() {
            // Create an options list from our fields
            return this.fields
                .filter(f => f.sortable)
                .map(f => {
                    return { text: f.label, value: f.key }
                })
        }
    },
    mounted() {
        this.$root.$on('closeModal', () => {
            this.showPreviewModal = false;
            this.article = null;
            console.log("tst");
        });
        this.$root.$on('closeConfirmationModal', () => {
            this.showConfirmationModal = false;
            this.article = null;
        });
        this.$root.$on('confirm', (item) => {
            this.article = null;
            this.showConfirmationModal = false;
            this.deleteWorkshop(item);
        });
    },
    created() {
        this.getArticles();
    },
    methods:{
        getArticles() {
            axios.get('/axios/article/get-all')
                .then(response => {
                    console.log("response",response);
                    this.items = response.data;
                    this.totalRows = this.items.length
                }).catch(error => {

            });
        },
        onRowSelected(items) {
            this.selected = items
        },
        openPreviewModal(article) {
            this.showPreviewModal = true;
            this.article = article;
        },
        openConfirmationModal(workshop) {
            this.workshop = workshop;
            this.showConfirmationModal = true;
        },
        deleteWorkshop(article){
            axios.delete(`/axios/article/${article.id}/delete`)
                .then(response => {
                    if(response.status == 200){
                        if(this.items.length > 1){
                            this.getArticles();
                        }
                    }
                })
                .catch(errors => {

                });
        },
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length
            this.currentPage = 1
        }
    }
}
</script>

<style scoped>

</style>
