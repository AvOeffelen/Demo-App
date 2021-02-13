<template>
    <div class="screen dashboard-screen">

        <v-app-bar app clipped-left color="primary" dark>

            <v-btn @click="showNavMenu = !showNavMenu" class="d-block d-md-none" icon>
                <v-icon>mdi-menu</v-icon>
            </v-btn>

            <span class="app-name" @click="$router.push({ name: 'management' })">BravisSamenVitaal</span>
            <v-spacer></v-spacer>

            <div class="app-bar-buttons d-flex justify-space-between align-center">

                <div class="action-buttons">

                    <v-menu offset-y transition="scroll-y-transition">
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on" class="ml-3">
                                <v-icon>mdi-dots-vertical</v-icon>
                            </v-btn>
                        </template>

                        <v-list dense>
                            <v-list-item link @click="window.location.href = '/me'">
                                <v-list-item-icon>
                                    <v-icon>mdi-account</v-icon>
                                </v-list-item-icon>

                                <v-list-item-title>Profiel</v-list-item-title>
                            </v-list-item>
                            <v-list-item
                                link @click="logout()"
                            >
                                <v-list-item-icon>
                                    <v-icon>mdi-logout</v-icon>
                                </v-list-item-icon>

                                <v-list-item-title>Uitloggen</v-list-item-title>
                            </v-list-item>
                        </v-list>
                    </v-menu>
                </div>
            </div>

        </v-app-bar>

        <v-navigation-drawer app clipped v-model="showNavMenu">
            <div class="d-flex flex-column justify-space-between fill-height">
                <v-list dense nav class="flex-grow-1">
                    <v-list-item two-line class="pa-0">
                        <v-list-item-content>
                            <div class="d-flex justify-space-between">
                                <div class="nav-header-left">
                                    <v-list-item-title>{{ user.first_name }} {{ user.infix ? `${user.infix} ` : '' }}{{ user.last_name }}</v-list-item-title>
                                    <v-list-item-subtitle>{{ user.type.toUpperCase() }}</v-list-item-subtitle>
                                </div>
                                <div class="nav-header-right">
                                    <v-tooltip top :open-delay="1000">
                                        <template v-slot:activator="{ on }">
                                            <v-btn icon v-on="on" @click="logout()">
                                                <v-icon>mdi-logout</v-icon>
                                            </v-btn>
                                        </template>
                                        <span>Uitloggen</span>
                                    </v-tooltip>
                                </div>
                            </div>
                        </v-list-item-content>
                    </v-list-item>

                    <v-divider></v-divider>

                    <v-list-item
                        v-for="route in displayRoutes"
                        :key="route.name" link
                        :class="{ 'route-active': ($route.name === route.name) }"
                        @click="$router.push({ name: route.name })"
                    >
                        <v-list-item-icon class="mr-2">
                            <v-icon :color="($route.name === route.name) ? 'secondary' : null">{{ route.meta != null && route.meta.icon != null ? route.meta.icon : 'mdi-alert-decagram'}}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title :class="{ 'secondary--text': ($route.name === route.name) }">{{ route.meta != null && route.meta.title != null ? route.meta.title() : route.name }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
                <v-footer class="nav-footer" inset>
                    <span class="caption">&copy; {{ new Date().getFullYear() }} <a class="footer-link" target="_blank" :href="'todo'">BravisSamenVitaal</a></span>
                </v-footer>
            </div>
        </v-navigation-drawer>

        <v-main class="main">
            <v-container fluid class="fill-height overflow-y-auto pa-0">
                <transition name="router-fade">
                    <router-view></router-view>
                </transition>
            </v-container>
        </v-main>
    </div>
</template>

<script>
export default {

    name: "ManagementLayout",

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

    computed: {

        displayRoutes() {

            return (this.$router.options.routes.find((r) => r.path === '/backend/management')).children.filter((r) => {

                return r.meta != null && r.meta.show;
            });
        }
    },

    methods: {

        logout() {

            document.getElementById("logout-form")?.submit();
        }
    }
}
</script>

<style lang="scss">

    @import '~vuetify/dist/vuetify.min.css';

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        user-select: none;
        outline: none;
    }

    main#main-container {

        background-color: unset;
    }

    .fill-height {

        width: 100%;
        min-width: 100%;
        max-width: 100%;

        height: 100%;
        min-height: 100%;
    }

</style>
