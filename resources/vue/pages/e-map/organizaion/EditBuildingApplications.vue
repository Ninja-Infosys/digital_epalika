<template>
    console.log('hello');
    <p class="mt-2 fw-bold">तपसिल</p>
    <p>
        <EditBuildingApplicationDetail :building-documentation="buildingDocumentation"/>
    </p>
    <p class="break-page"></p>

</template>

<script setup>
import {onMounted} from "vue";

import {useBuildingApplicationStore} from "../../../stores/e-map/organization/buildingDocument";
import {useBuildingSettingStore} from "../../../stores/buildingSetting";


import EditBuildingApplicationDetail from "./buildingForms/EditBuildingApplicationDetail.vue";


defineProps({
    buildingDocumentation:{
        required:true,
        type:Object
    }
})

const buildingApplicationStore=useBuildingApplicationStore();
const buildingSettingStore=useBuildingSettingStore();


onMounted(()=>{
    console.log(data);
    buildingSettingStore.getBuildingSetting();

})
</script>
