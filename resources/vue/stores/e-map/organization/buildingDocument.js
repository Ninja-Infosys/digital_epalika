import {defineStore} from 'pinia'
import axios from "axios";
import showErrors from "../../../utils/showErrors";
const baseUrl=`${window.location.origin}`

export const useBuildingApplicationStore = defineStore('buildingDocument', {
    state: () => ({
        buildingStoreyDetailsData: {
            buildingStorey:0,
            storey_details_count:0,
            data:[]
        },
        buildingHouseOwner:{
            data:{},
            loading:false
        },
        buildingLandOwner:{
            data:{},
            loading:false
        }
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
                    this.buildingStoreyDetailsData.current_storey=res.data.current_storey;
                    this.buildingStoreyDetailsData.storey_details_count=res.data.storey_details_count;
                    this.buildingStoreyDetailsData.data=res.data.data;
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
        updateBuildingLandDetail(building_documentation_id,form) {
            return axios.put(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/update-building-land-detail`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        getBuildingLandOwner(building_documentation_id) {
            this.buildingLandOwner.loading=true;
            return axios.get(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/building-land-owner`)
                .then((res) => {
                    this.buildingLandOwner.data=res.data;
                })
                .catch((err) => {
                    showErrors(err);
                }).finally(()=>{
                    this.buildingLandOwner.loading=false;
                })
        },
        updateBuildingLandOwner(building_documentation_id,form) {
            return axios.post(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/update-building-land-owner`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        getBuildingHouseOwner(building_documentation_id) {
            this.buildingHouseOwner.loading=true;
            return axios.get(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/building-house-owner`)
                .then((res) => {
                    this.buildingHouseOwner.data=res.data;
                })
                .catch((err) => {
                    showErrors(err);
                }).finally(()=>{
                    this.buildingHouseOwner.loading=false;
                })
        },
        updateBuildingHouseOwner(building_documentation_id,form) {
            return axios.post(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/update-building-house-owner`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })
        },
    }
})
