import router from '../../router'
import { getLocalUser } from '../../helpers/auth';
import { loginProcess } from '../../helpers/auth';
import { logoutProcess } from '../../helpers/auth';
const user = getLocalUser();
export default {
    state: {
        currentUser: user,
        isLoggedIn: !!user,
        loading: false,
        authError: null, // message error
        allowLinks: []
    },
    mutations: { // when call commit
        login(state) {
            state.loading = true;
            state.authError = null;
        },
        loginSuccess(state, payload) { // when call commit loginSuccess
            state.authError = null;
            state.isLoggedIn = true;
            state.loading = false;
            state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});
            localStorage.setItem('user', JSON.stringify(state.currentUser));
        },
        loginFailed(state, payload) {
            state.loading = false;
            state.authError = payload.error;
        },
        logout(state) {
            localStorage.removeItem('user')
            state.isLoggedIn = false;
            state.currentUser = null;
        }
    },
    actions: { // when call dispatch
        login({commit}, payload) {
            commit('setLoading', true);
            loginProcess(payload)
            .then((res) => {
                commit('loginSuccess', res);
                commit('setLoading', false); // commit in shared status
                // Xac dinh vai tro nguoi dung

                // dieu huong giao dien phu hop
                router.push({path: '/admin-dashboard'}); // log in success
            })
            .catch((error) => {
                commit('loginFailed', { error });
                commit('setLoading', false); // commit in shared status
            })
            commit('login'); // will be call to login MUTATION
        },
        logout({commit}) {
            commit('setLoading', true);
            logoutProcess().then(() => {
                commit('logout');
                commit('setLoading', false); // commit in shared status

                console.log('Actions LOGOUT SUCCESS ');
            }).catch((err) => {
                commit('setLoading', false); // commit in shared status
                console.log('Error in Actions Logout: ' + err);
            })
        }
    },
    getters: {
        isLoading(state) {
            return state.loading;
        },
        isLoggedIn(state) {
            return state.isLoggedIn;
        },
        currentUser(state) {
            return state.currentUser;
        },
        authError(state) {
            return state.authError;
        },
        allowLinks() {
            return state.allowLinks;
        }
    }
}