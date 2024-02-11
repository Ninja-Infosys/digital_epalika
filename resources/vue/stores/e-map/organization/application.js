import {defineStore} from 'pinia'
import axios from "axios";
import showErrors from "../../../utils/showErrors";
const baseUrl=`${window.location.origin}`

export const useApplicationStore = defineStore('application', {
    state: () => ({
        storeyDetailsData: {
            current_storey:0,
            storey_details_count:0,
            data:[]
        }
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

        },
        getStoreyDetails(map_apply_id) {
            return axios.get(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/storey-details`)
                .then((res) => {
                    this.storeyDetailsData.current_storey=res.data.current_storey;
                    this.storeyDetailsData.storey_details_count=res.data.storey_details_count;
                    this.storeyDetailsData.data=res.data.data;
                })
                .catch((err) => {
                    showErrors(err);
                })
        },
        updateStoreyDetail(map_apply_id,form) {
            return axios.post(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/update-storey-detail`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        deleteStoreyDetail(map_apply_id,storey_detail_id) {
            return axios.delete(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/storeyDetail/${storey_detail_id}`)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        updateLandDetail(map_apply_id,form) {
            return axios.put(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/update-land-detail`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        updateLandOwner(map_apply_id,form) {
            return axios.put(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/update-land-owner`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        updateHouseOwner(map_apply_id,form) {
            return axios.put(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/update-house-owner`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
    }
})
