<template>
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
        <ManagementNavigation></ManagementNavigation>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div>
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">{{ user.first_name }}{{ user.infix ? ` ${ user.infix } ` : '' }}{{ user.last_name }}</span>
                            <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                            <a class="dropdown-item">
<!--                                :href="route('me')"-->
                                <i class="far fa-fw fa-user mr-1"></i> Profiel
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" @click="logout()">
                                <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Uitloggen
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->
            </div>
            <!-- END Right Section -->
            <!-- END Header Content -->

            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary-darker">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main class="main-container">
            <transition name="router-fade">
                <router-view></router-view>
            </transition>
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <ManagementFooter></ManagementFooter>
        <!-- END Footer -->
    </div>
</template>

<script>
import ManagementNavigation from "../../components/Management/ManagementNavigation.vue";
import ManagementFooter from "../../components/Management/ManagementFooter.vue";

export default {

    name: "ManagementLayout",
    components: { ManagementFooter, ManagementNavigation },

    data() {
        return {

            showNavMenu: true,

            user: {

                //TODO: RETRIEVE USER
                first_name: "Youri",
                infix: "van der",
                last_name: "Sande",
                type: "manager"
            }
        };
    },

    methods: {

        logout() {

            document.getElementById("logout-form")?.submit();
        }
    }
}
</script>

<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        user-select: none;
        outline: none;
    }

</style>
