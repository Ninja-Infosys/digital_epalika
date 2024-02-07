<template>
    <p class="mt-2 fw-bold">तपसिल</p>
    <p>
        <EditApplicationDetail :map-apply="mapApply"/>
    </p>
    <p class="break-page"></p>
    <StoreyDetail :map-apply="mapApply" />

    <editLandDetail :map-apply="mapApply" />
</template>

<script setup>
import {onMounted} from "vue";

import {useApplicationStore} from "../../../stores/e-map/organization/application";
import {useSettingStore} from "../../../stores/setting";
import EditApplicationDetail from "./forms/EditApplicationDetail.vue";
import StoreyDetail from "./forms/StoreyDetail.vue";
import EditLandDetail from "./forms/EditLandDetail.vue";

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
