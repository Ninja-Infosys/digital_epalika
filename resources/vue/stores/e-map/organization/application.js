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
        },
        fourForts: {
            data:[],
            loading:false
        },
        designerDetails: {
            data:[],
            loading:false
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
        getFourForts(map_apply_id) {
            this.fourForts.loading=true;
            return axios.get(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/four-forts`)
                .then((res) => {
                    this.fourForts.data=res.data.data;
                })
                .catch((err) => {
                    showErrors(err);
                })
                .finally(()=>{
                    this.fourForts.loading=false;
                })
        },
        updateFourFortDetail(map_apply_id,form) {
            return axios.post(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/update-four-forts`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        getDesignerDetails(map_apply_id) {
            this.designerDetails.loading=true;
            return axios.get(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/designer-details`)
                .then((res) => {
                    this.designerDetails.data=res.data.data;
                })
                .catch((err) => {
                    showErrors(err);
                })
                .finally(()=>{
                    this.designerDetails.loading=false;
                })
        },
        updateDesignerDetail(map_apply_id, form) {
            return axios.post(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/update-designer-detail`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        updateApplicantDetail(map_apply_id, form) {
            return axios.post(`${baseUrl}/api/organization/admin/mapApply/${map_apply_id}/update-applicant-detail`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
    }
})
