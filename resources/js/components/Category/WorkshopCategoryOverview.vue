<template>
    <div>
        <b-row class="pb-3">
            <b-col sm="6" md="6" lg="6" xl="6">
                <div class="">
                    <h5 class="font-w500">Workshop Categories</h5>
                </div>
            </b-col>
            <b-col sm="6" md="6" lg="6" xl="6">
                <b-input-group size="sm">
                    <b-form-input
                        id="filter-input"
                        v-model="filter"
                        type="search"
                        placeholder="Waar ben je naar op zoek?"
                    ></b-form-input>
                    <b-input-group-append>
                        <b-button :disabled="!filter" @click="filter = ''" variant="primary">Reset</b-button>
                    </b-input-group-append>
                </b-input-group>
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
                         striped
                         fixed
                >
                    <template v-slot:cell(id)="row" class="d-sm-none d-none">
                        {{ row.index + 1 }}
                    </template>
                    <template v-slot:cell(actions)="row" class="d-sm-none d-none"
                              :style="{ width: fields.fields === 'actions' ? '25px' : '180px' }">
                        <a v-bind:href="'/backend/categories/workshop/'+ row.item.id +'/update'" class="btn btn-primary"
                           variant="primary"><i class="fa fa-fw fa-pencil-alt"></i>
                        </a>
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
    </div>
</template>

<script>
export default {
    name: "WorkshopCategoryOverview",
    data() {
        return {
            fields: [
                {
                    key: 'id',
                    label: '#',
                    sortable: true,
                },
                {
                    key: 'name',
                    label: 'Name',
                    sortable: true,
                },
                {
                    key: 'display_name',
                    label: 'Display name',
                    sortable: true,
                },
                {
                    key: 'actions',
                    label: 'Actions',
                    sortable: false
                }
            ],
            filter: null,
            filterOn: ['name', 'display_name'],
            items: [],
            totalRows: 2,
            currentPage: 1,
            perPage: 10,
            pageOptions: [10, 15, 25, 50, 75],
        };
    },
    computed: {
        sortOptions() {
            // Create an options list from our fields
            return this.fields
                .filter(f => f.sortable)
                .map(f => {
                    return {text: f.label, value: f.key}
                })
        },
    },
    created() {
        this.getWorkshopCategories();
    },
    methods: {
        getWorkshopCategories() {
            axios.get('/axios/categories/workshop/get-all')
                .then(response => {
                    this.items = response.data;
                    this.totalRows = this.items.length
                }).catch(error => {

            });
        },
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length
            this.currentPage = 1
        },
    },
}
</script>

<style scoped>

</style>
