<template>
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-0">
            <div class="row font-size-sm">
                <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                    <span><a class="font-w600" href="/">{{ $config.app.name }}</a> &copy; {{ new Date().getFullYear() }}</span>&nbsp;
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {

    name: "ManagementFooter",
}
</script>

<style scoped>

</style>
