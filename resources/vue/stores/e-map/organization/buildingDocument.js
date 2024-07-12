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
        neighbours: {
            data:[],
            loading:false
        },
        contractorDetails: {
            data:[],
            loading:false
        },
        buildingDescriptions: {
            data:[],
            loading:false
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
        updateBuildingStoreyDetail(building_documentation_id,form) {
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

        updateBuildingApplicantDetail(building_documentation_id, form) {
            return axios.post(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/update-building-applicant-detail`,form)
                 .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },

        getBuildingNeighbours(building_documentation_id) {
            this.neighbours.loading=true;
            return axios.get(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/building-neighbours`)
                .then((res) => {
                    this.neighbours.data=res.data.data;
                })
                .catch((err) => {
                    showErrors(err);
                })
                .finally(()=>{
                    this.neighbours.loading=false;
                })
        },
        updateBuildingNeighbourDetail(building_documentation_id,form) {
            return axios.post(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/update-building-neighbours`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        getContractorDetails(building_documentation_id) {
            this.contractorDetails.loading=true;
            return axios.get(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/contractor-details`)
                .then((res) => {
                    this.contractorDetails.data=res.data.data;
                })
                .catch((err) => {
                    showErrors(err);
                })
                .finally(()=>{
                    this.contractorDetails.loading=false;
                })
        },
        updateContractorDetail(building_documentation_id, form) {
            return axios.post(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/update-contractor-detail`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        getBuildingDescriptions(building_documentation_id) {
            this.buildingDescriptions.loading=true;
            return axios.get(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/building-descriptions`)
                .then((res) => {
                    this.buildingDescriptions.data=res.data.data;
                })
                .catch((err) => {
                    showErrors(err);
                })
                .finally(()=>{
                    this.buildingDescriptions.loading=false;
                })
        },
        updateBuildingDescription(building_documentation_id,form) {
            return axios.post(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/update-building-description`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },
        updateBuildingConsultancyDetail(building_documentation_id,form) {
            return axios.post(`${baseUrl}/api/organization/admin/buildingDocumentation/${building_documentation_id}/update-building-consultancy-detail`,form)
                .then((res) => {
                    return res;
                })
                .catch((err) => {
                    throw err;
                })

        },

    }
})
