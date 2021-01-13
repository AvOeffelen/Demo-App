<template>
    <div>
        <article-category-overview></article-category-overview>
        <hr class="font-w500 py-5" />
        <workshop-category-overview></workshop-category-overview>
    </div>
</template>

<script>
import ArticleCategoryOverview from "./ArticleCategoryOverview";
import WorkshopCategoryOverview from "./WorkshopCategoryOverview";
export default {
    name: "CategoryOverview",
    components: {WorkshopCategoryOverview, ArticleCategoryOverview},
    data() {
        return {

        };
    },
}
</script>

<style scoped>

</style>
