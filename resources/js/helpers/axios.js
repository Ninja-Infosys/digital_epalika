import axios from "axios";
import store from "../store";
import showErrors from "./showErrors";

//axios for admin
const axiosForAdmin = axios.create({
    baseURL: `${import.meta.env.VITE_APP_URL}/api/v1/admin/`
})

axiosForAdmin.interceptors.request.use(config => {
    config.headers.Authorization = `Bearer ${store.state.auth_token}`
    return config;
})

axiosForAdmin.interceptors.response.use(response => {
    return response;
}, error => {
    if (error.response.status === 401) {
        showErrors(error.response.status,error.response.data.message)
    } else if (error.response.status === 404) {
        showErrors(error.response.status,error.response.data.message)
    }
    throw error;

})

export const axiosAdmin = axiosForAdmin

//axios for frontend
export const axiosFront = axios.create({
    baseURL: `/front`
})
