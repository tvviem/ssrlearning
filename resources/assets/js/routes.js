export const routes = [
    { 
        name: 'admin-board',
        path: '/admin-dashboard',
        component: require('./components/admin/DashboardComponent.vue')
    },
    {
        name: 'login',
        path: '/login',
        component: require('./components/credential/LoginComponent.vue')
    }
]