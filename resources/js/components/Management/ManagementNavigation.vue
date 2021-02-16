<template>
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="bg-header-dark">
            <div class="content-header bg-white-10">
                <!-- Logo -->
                <a class="link-fx font-w600 font-size-lg text-white" href="/">
                    <span class="smini-visible">
                        <span class="text-white-75">{{ $config.app.name }}</span>
                    </span>
                    <span class="smini-hidden">
                        <span class="text-white-75">{{ $config.app.name }}</span>
                    </span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div>
                    <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times-circle"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">

                <li class="nav-main-item" v-for="route in displayRoutes" :key="route.name">
                    <a class="nav-main-link" :class="{ 'active': ($route.name === route.name) }" @click="$router.push({ name: route.name })">
                        <i :class="['nav-main-link-icon', route.meta != null && route.meta.icon != null ? route.meta.icon : '']"></i>
                        <span class="nav-main-link-name">{{ route.meta != null && route.meta.title != null ? route.meta.title() : route.name }}</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link" href="/backend/dashboard">
<!--                        :href="route('show.frontend.dashboard')"-->
                        <i class="nav-main-link-icon fas fa-user"></i>
                        <span class="nav-main-link-name">Admin Dashboard</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- END Side Navigation -->
    </nav>
</template>

<script>
export default {

    name: "ManagementNavigation",

    computed: {

        displayRoutes() {

            return (this.$router.options.routes.find((r) => r.path === '/backend/management')).children.filter((r) => {

                return r.meta != null && r.meta.show;
            });
        }
    }
}
</script>

<style scoped>

</style>

