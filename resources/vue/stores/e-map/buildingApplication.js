import {defineStore} from 'pinia'
import axios from "axios";
const baseUrl=`${window.location.origin}`

export const useBuildingApplicationStore = defineStore('building-application', {
    actions: {
        storeBuildingApplication(form) {
            return axios.post(`${baseUrl}/ebps/api/v1/building-application`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })
        }
    }
})
