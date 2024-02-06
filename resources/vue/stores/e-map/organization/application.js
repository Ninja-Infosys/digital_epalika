import {defineStore} from 'pinia'
import axios from "axios";
const baseUrl=`${window.location.origin}`

export const useApplicationStore = defineStore('application', {
    state: () => ({
        applications: {}
    }),
    actions: {
        updateApplicationDetail(map_apply_id,form) {
            return axios.put(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/update-detail`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        }
    }
})
