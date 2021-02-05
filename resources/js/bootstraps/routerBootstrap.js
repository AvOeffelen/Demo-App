import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import ManagementLayout from '../pages/management/ManagementLayout.vue'

import ManagementDashboard from '../pages/management/ManagementDashboard.vue'
import ManagementUsers from '../pages/management/ManagementDashboard.vue'


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
                    component: ManagementDashboard
                },
                {
                    path: 'users',
                    name: 'management-users',
                    component: ManagementUsers
                }
            ]
        }
    ],
});

export default router;
