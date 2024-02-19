import {defineStore} from 'pinia'
import axios from "axios";
import showErrors from "../utils/showErrors";

const baseUrl = `${window.location.origin}`

export const useAddressStore = defineStore('provinces', {
    state: () => ({
        provinces: {},
        province: {},
        districts: {},
        district: {},
        localBodies: {},
        localBody: {},
        wards: {},
    }),
    actions: {
        getProvinces() {
            return axios.get(`${baseUrl}/address/province`)
                .then((res) => {
                    this.provinces = res.data;
                })
                .catch((err) => {
                    showErrors(err);
                })
        },
        getProvince(province_id) {
            return axios.get(`${baseUrl}/address/province/` + province_id)
                .then((res) => {
                    this.province = res.data;
                    this.districts = res.data?.districts;
                })
                .catch((err) => {
                    showErrors(err);
                })
        },
        getDistricts() {
            return axios.get(`${baseUrl}/address/district`)
                .then((res) => {
                    this.districts = res.data;
                })
                .catch((err) => {
                    showErrors(err);
                })
        },
        getDistrict(district_id) {
            return axios.get(`${baseUrl}/address/district/` + district_id)
                .then((res) => {
                    this.district = res.data;
                    this.localBodies = res.data?.localBodies;
                })
                .catch((err) => {
                    showErrors(err);
                })
        },
        getLocalBodies() {
            return axios.get(`${baseUrl}/address/localBody`)
                .then((res) => {
                    this.localBodies = res.data;
                })
                .catch((err) => {
                    showErrors(err);
                })
        },
        getLocalBody(local_body_id) {
            return axios.get(`${baseUrl}/address/localBody/` + local_body_id)
                .then((res) => {
                    this.localBody = res.data;
                    this.wards = res.data?.wards;
                })
                .catch((err) => {
                    showErrors(err);
                })
        }
    }
})
