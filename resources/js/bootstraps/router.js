import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import ManagementLayout from '../pages/management/ManagementLayout.vue'

import ManagementDashboard from '../pages/management/ManagementDashboard.vue'
import ManagementUsers from '../pages/management/ManagementUsers.vue'
import ManagementActivity from '../pages/management/ManagementActivity.vue'


const router = new VueRouter({

    mode: 'history',

    routes: [

        {
            path: '/backend/management',
            component: ManagementLayout,
            children: [
                {
                    path: '',
                    name: 'management',
                    component: ManagementDashboard,
                    meta: {
                        show: true,
                        title: () => "Dashboard",
                        icon: "mdi-finance"
                    }
                },
                {
                    path: 'users',
                    name: 'management.users',
                    component: ManagementUsers,
                    meta: {
                        show: true,
                        title: () => "Gebruikersoverzicht",
                        icon: "mdi-account-multiple"
                    }
                },
                {
                    path: 'activity',
                    name: 'management.activity',
                    component: ManagementActivity,
                    meta: {
                        show: true,
                        title: () => "Activiteitenoverzicht",
                        icon: "mdi-cursor-default-click"
                    }
                }
            ]
        }
    ],
});

export default router;
