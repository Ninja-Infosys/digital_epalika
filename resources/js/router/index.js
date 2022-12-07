import {createRouter, createWebHashHistory} from 'vue-router'
//import {h, resolveComponent} froms "vue";
import store from "../store";
import DatewiseReport from '../views/businessRegistration/report/DatewiseReport.vue'

const routes = [
    {
        path: '/',
        //redirect: '/login'
        name:'DatewiseReport',
        component:DatewiseReport
    },
    // {
    //     path: '/admin',
    //     redirect: 'admin/dashboard',
    //     meta: {requiresAuth: true},
    //     children: [
    //         {
    //             path: 'dashboard',
    //             name: 'Dashboard',
    //             component: () => import('@/views/Dashboard')
    //         }
    //     ]
    // }
]

const router = createRouter({
    history: createWebHashHistory(),
    routes,
    linkActiveClass: 'active'
})

// router.beforeEach((to, from, next) => {
//     if (to.meta.requiresAuth && !store.state.user.access_token) {
//         next({name: "Login"});
//     } else if (store.state.user.access_token && to.meta.isGuest) {
//         next({name: "Dashboard"});
//     } else {
//         next();
//     }
// });
export default router
