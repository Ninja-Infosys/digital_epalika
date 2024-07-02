import {defineStore} from 'pinia'
import axios from "axios";
import showErrors from "../utils/showErrors";
const baseUrl=`${window.location.origin}`


export const useBuildingSettingStore = defineStore('buildingSetting', {
    state: () => ({
        eBuildingSetting: {}

    }),
    actions: {
        getBuildingSetting() {
            return axios.get(`${baseUrl}/ebps/api/v1/buildingApplicationSetting`)
                .then((res) => {
                    this.eBuildingSetting = res.data;
                })
                .catch((err) => {
                    showErrors(err);
                })
        }
    }
})
