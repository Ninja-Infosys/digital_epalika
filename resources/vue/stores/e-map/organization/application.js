import {defineStore} from 'pinia'
import axios from "axios";
const baseUrl=`${window.location.origin}`

export const useApplicationStore = defineStore('application', {
    state: () => ({
        applications: {}
    }),
    actions: {
        getMapApplications() {
            return axios.get(`${baseUrl}/sanctum/csrf-cookie`,{
                withCredentials:true
            }).then(()=>{
                return axios.get(`${baseUrl}/api/organization/admin/applications`)
                    .then((res) => {
                        return res;
                    })
                    .catch((err) => {
                        throw err;
                    })
            })

        }
    }
})
