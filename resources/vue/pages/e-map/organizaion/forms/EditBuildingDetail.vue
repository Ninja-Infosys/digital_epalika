<template>
    <fieldset>
        <legend> ९. भवन सम्बन्धि विवरण </legend>
        <div class="col-md-12">
            <div class="table-responsive mt-1">
                <table class="table table-sm table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>क्र.सं</th>
                        <th colspan="2" class="text-center">विवरण</th>
                        <th>कैफियत</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(buildingDetail,index) in buildingDetails.data" :key="index">
                        <td>{{index+1}}</td>
                        <td>
                            {{buildingDetail.detail_label}}
                        </td>
                        <td>
                            {{buildingDetail.description}}
                        </td>
                        <td>
                            {{buildingDetail.remarks}}
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="btn btn-outline-primary btn-xs"
                                        @click.prevent="openEditForm(index)"><i
                                    class="fa fa-pen"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </fieldset>

    <VModal title="भवन सम्बन्धि विवरण "
            v-model:show-modal="editFormOpened"
            @close-click="closeEditForm">
        <template #body>
            <form @submit.prevent="saveFormData(mapApply.id)">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="description"
                            v-model="form.description"
                            label="विवरण"
                            @validate="validateField('description')"
                            :error="errors.description"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="remarks"
                            v-model="form.remarks"
                            label="कैफियत"
                            @validate="validateField('remarks')"
                            :error="errors.remarks"
                        />
                    </div>
                    <div class="form-group mb-2">
                        <VButton
                            btn-label="पेश गर्नुहोस्"
                            :loading="isSubmitting"
                        />
                    </div>
                </div>
            </form>
        </template>
    </VModal>

</template>

<script setup>

import {onMounted, reactive, ref, watch} from "vue";
import {storeToRefs} from "pinia";
import {useSettingStore} from "../../../../stores/setting";
import {object, string} from "yup";
import {useYup} from "../../../../utils/yup";
import showErrors from "../../../../utils/showErrors";
import {toast} from "../../../../utils/toast";
import {useApplicationStore} from "../../../../stores/e-map/organization/application";

const props=defineProps({
    mapApply:{
        required:true,
        type:Object
    }
})

const settingStore=useSettingStore();
const applicationStore=useApplicationStore();

const editFormOpened=ref(false);

const {eMapSetting}=storeToRefs(settingStore);
const {buildingDetails}=storeToRefs(applicationStore);

const initialState={
    detail:'' ,
    description:'',
    remarks:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    getBuildingDetails();
})

const getBuildingDetails=async () => {
    applicationStore.getBuildingDetails(props.mapApply.id);
}

const isSubmitting=ref(false);

const validations = object({
    detail: string().required('विवरण अनिवार्य छ |'),
    description: string().required('विवरण अनिवार्य छ|'),
    remarks:string().nullable()
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (map_apply_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await applicationStore.updateBuildingDetail(map_apply_id,form);
            toast(res.status,res.data.message);
            closeEditForm();
            await getBuildingDetails();
        }catch (e) {
            showErrors(e);
        }finally {
            isSubmitting.value=false;
        }
    }
}

const openEditForm=(index)=>{
    editFormOpened.value=true;
    const selectedBuildingDetail=buildingDetails.value.data[index];
    Object.assign(form,{
        detail:selectedBuildingDetail.detail??'',
        description:selectedBuildingDetail.description??'',
        remarks:selectedBuildingDetail.remarks??''
    })
}

const closeEditForm=()=>{
    editFormOpened.value=false;
    resetForm();
}

const resetForm = () => {
    Object.assign(form, {...initialState});
}
</script>
