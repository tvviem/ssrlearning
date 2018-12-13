export const routes = [
    { 
        path: '/admin-dashboard',
        component: require('../components/admin/DashboardComponent.vue'),
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/login',
        component: require('../components/credential/LoginComponent.vue')
    },
    {
        path: '/',
        component: require('../components/credential/LoginComponent.vue')
    }
]