<template>
    <p class="mt-2 fw-bold">तपसिल</p>
    <p>
        <EditApplicationDetail :map-apply="mapApply"/>
    </p>
    <p class="break-page"></p>
    <StoreyDetail :map-apply="mapApply" />

    <EditLandDetail :map-apply="mapApply" />

    <EditLandOwner :map-apply="mapApply" />

    <EditHouseOwner :map-apply="mapApply" />

    <EditFourForts :map-apply="mapApply" />

    <EditDesignerDetail :map-apply="mapApply" />

    <EditApplicantDetail :map-apply="mapApply" />

    <p class="break-page"></p>

    <EditCriteriaDetail :map-apply="mapApply" />

    <EditBuildingDetail :map-apply="mapApply" />

    <EditConsultancyDetail :map-apply="mapApply" />
</template>

<script setup>
import {onMounted} from "vue";

import {useApplicationStore} from "../../../stores/e-map/organization/application";
import {useSettingStore} from "../../../stores/setting";
import StoreyDetail from "./forms/StoreyDetail.vue";
import EditLandDetail from "./forms/EditLandDetail.vue";
import EditLandOwner from "./forms/EditLandOwner.vue";
import EditHouseOwner from "./forms/EditHouseOwner.vue";
import EditFourForts from "./forms/EditFourForts.vue";
import EditDesignerDetail from "./forms/EditDesignerDetail.vue";
import EditApplicantDetail from "./forms/EditApplicantDetail.vue";
import EditApplicationDetail from "./forms/EditApplicationDetail.vue";
import EditCriteriaDetail from "./forms/EditCriteriaDetail.vue";
import EditBuildingDetail from "./forms/EditBuildingDetail.vue";
import EditConsultancyDetail from "./forms/EditConsultancyDetail.vue";

defineProps({
    mapApply:{
        required:true,
        type:Object
    }
})

const applicationStore=useApplicationStore();
const settingStore=useSettingStore();

onMounted(()=>{
    settingStore.getEMapSetting();
})
</script>
