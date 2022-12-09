import {createStore} from "vuex";
import {axiosAdmin,axiosFront} from "../helpers/axios";
import showErrors from "@/helpers/showErrors";

const store = createStore({
    state: {
        auth_token: localStorage.getItem("auth_token")
    },
    getters: {},
    actions: {
        getAuthToken({state, commit}) {
            if (!state.auth_token) {
                return axiosAdmin.get('get-auth-token')
                    .then((res) => {
                        commit('SET_AUTH_TOKEN', res.data.data)
                        return res
                    }).catch((err) => {
                        showErrors(err)
                    });
            }
        }
    },
    mutations: {
        SET_AUTH_TOKEN: (state, token) => {
            state.auth_token = token;
            localStorage.setItem('auth_token', token);
        }
    },
    modules:{

    }
});

export default store;
