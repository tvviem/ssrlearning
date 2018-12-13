export function initialize(store, router) {
    router.beforeEach((to, from, next) => {
        const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
        const currentUser = store.getters.currentUser;
        if(requiresAuth && !currentUser) {
            next('/login');
        } else if((to.path == '/login' || to.path == '/') && currentUser) {
            // can phai xac dinh vai tro roi chuyen tiep giao dien phu hop
            next('/admin-dashboard');
        } else {
            next();
        }
    })
    // Chưa kiểm chứng được !!!
    axios.interceptors.response.use(null, (error) => {
        if(error.response.status == 401) {
            store.commit('logout');
            router.push('/login');
        }
    })
}