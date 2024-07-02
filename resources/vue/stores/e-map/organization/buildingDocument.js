import {defineStore} from 'pinia'
import axios from "axios";
import showErrors from "../../../utils/showErrors";
const baseUrl=`${window.location.origin}`

export const useBuildingApplicationStore = defineStore('buildingDocumentation', {
    state: () => ({
        buildingStoreyDetailsData: {
            storey:0,
            storey_details_count:0,
            data:[]
        },

    }),
    actions: {
        updateApplicationDetail(building_documentation_id,form) {
            return axios.put(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/update-building-documentation-detail`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        getBuildingStoreyDetails(building_documentation_id) {
            return axios.get(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/building-storey-details`)
                .then((res) => {
                    this.storeyDetailsData.current_storey=res.data.current_storey;
                    this.storeyDetailsData.storey_details_count=res.data.storey_details_count;
                    this.storeyDetailsData.data=res.data.data;
                })
                .catch((err) => {
                    showErrors(err);
                })
        },
        updateStoreyDetail(building_documentation_id,form) {
            return axios.post(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/update-building-storey-detail`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        deleteBuildingStoreyDetail(building_documentation_id,building_storey_detail_id) {
            return axios.delete(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/buildingStoreyDetail/${building_storey_detail_id}`)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },

    }
})
