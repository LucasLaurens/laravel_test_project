import { createStore } from "vuex";
import axiosClient from '../api/index';

const store = createStore({
    state: {
        user: {
            data: {},
            token: localStorage.getItem('auth-token'),
            role: null,
        }
    },
    actions: {
        getUserRole({ commit }) {
            axiosClient.get('getRole')
                .then(res => {
                    commit('setUserRole', res.data.is_admin)
                })
                .catch(err => console.log(err))
        }
    },
    mutations: {
        setUserRole(state, role) {
            state.user.role = role;
            console.log(state.user.role);
        }
    }
});

export default store;
