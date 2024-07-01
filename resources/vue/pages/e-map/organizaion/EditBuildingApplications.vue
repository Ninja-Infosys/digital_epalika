<template>
    <p class="mt-2 fw-bold">तपसिल</p>
    <p>
        <EditBuildingApplicationDetail :building-documentation="buildingDocumentation"/>
    </p>
    <p class="break-page"></p>

</template>

<script setup>
import {onMounted} from "vue";

import {useBuildingDocumentApplicationStore} from "../../../stores/e-map/organization/buildingApplication";

import { useBuildingSettingStore } from "../../stores/buildingSetting";

import EditBuildingApplicationDetail from "./buildingForms/EditBuildingApplicationDetail.vue";



defineProps({
    buildingDocumentation:{
        required:true,
        type:Object
    }
})

const buildingDocumentApplicationStore=useBuildingDocumentApplicationStore();
const buildingSettingStore=useBuildingSettingStore();

onMounted(()=>{
    buildingSettingStore.getBuildingSetting();
})
</script>
