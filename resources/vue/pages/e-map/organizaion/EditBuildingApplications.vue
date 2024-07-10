<template>
    <p class="mt-2 fw-bold">तपसिल</p>
    <p>
        <EditBuildingApplicationDetail :building-documentation="buildingDocumentation"/>
    </p>
    <p class="break-page"></p>
    <BuildingStoreyDetail :building-documentation="buildingDocumentation" />
    <EditBuildingLandDetail :building-documentation="buildingDocumentation" />
    <EditBuildingLandOwner :building-documentation="buildingDocumentation" />
    <EditBuildingHouseOwner :building-documentation="buildingDocumentation" />
    <EditBuildingApplicantDetail :building-documentation="buildingDocumentation" />
    <EditNeighbourDetail :building-documentation="buildingDocumentation" />
    <EditContractorDetail :building-documentation="buildingDocumentation" />
    <p class="break-page"></p>
    <EditBuildingDescription :building-documentation="buildingDocumentation" />
    <EditConsultancyDetail :building-documentation="buildingDocumentation" />

</template>

<script setup>
import {onMounted} from "vue";

import {useBuildingApplicationStore} from "../../../stores/e-map/organization/buildingDocument";
import {useBuildingSettingStore} from "../../../stores/buildingSetting";
import BuildingStoreyDetail from "./buildingForms/BuildingStoreyDetail.vue";
import EditBuildingLandDetail from "./buildingForms/EditBuildingLandDetail.vue";
import EditBuildingLandOwner from "./buildingForms/EditBuildingLandOwner.vue";
import EditBuildingHouseOwner from "./buildingForms/EditBuildingHouseOwner.vue";
import EditNeighbourDetail from "./buildingForms/EditNeighbourDetail.vue";
import EditContractorDetail from "./buildingForms/EditContractorDetail.vue";
import EditBuildingDescription from "./buildingForms/EditBuildingDescription.vue";
import EditConsultancyDetail from "./buildingForms/EditConsultancyDetail.vue";
import EditBuildingApplicantDetail from "./buildingForms/EditBuildingApplicantDetail.vue";


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
    buildingSettingStore.getBuildingSetting();

})
</script>
