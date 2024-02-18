<template>
    <fieldset>
        <legend> ८. निर्माण हुने भवन तथा मापदण्ड सम्बन्धि संक्षिप्त विवरण </legend>
        <div class="col-md-12">
            <label class="form-label fw-bold">मापदण्ड सम्बन्धि विवरण</label>
            <div class="table-responsive mt-1">
                <table class="table table-sm table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>क्र.सं</th>
                        <th>विवरण</th>
                        <th>मापदण्ड अनुसार</th>
                        <th>नक्सा अनुसार</th>
                        <th>अनुपालन</th>
                        <th>कैफियत</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(criteria,index) in criteriaDetails.data" :key="index">
                        <td>{{index+1}}</td>
                        <td>
                            {{criteria.detail_label}}
                        </td>
                        <td>
                            {{criteria.according_to_criteria}}
                        </td>
                        <td>
                            {{criteria.according_to_map}}
                        </td>
                        <td>
                            {{criteria.compliance}}
                        </td>

                        <td>
                            {{criteria.remarks}}
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

    <VModal title="निर्माण हुने भवन तथा मापदण्ड सम्बन्धि विवरण"
            v-model:show-modal="editFormOpened"
            @close-click="closeEditForm">
        <template #body>
            <form @submit.prevent="saveFormData(mapApply.id)">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="according_to_criteria"
                            v-model="form.according_to_criteria"
                            label="मापदण्ड अनुसार"
                            @validate="validateField('according_to_criteria')"
                            :error="errors.according_to_criteria"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="according_to_map"
                            v-model="form.according_to_map"
                            label="नक्सा अनुसार"
                            @validate="validateField('according_to_map')"
                            :error="errors.according_to_map"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="compliance"
                            v-model="form.compliance"
                            label="अनुपालन"
                            @validate="validateField('compliance')"
                            :error="errors.compliance"
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
const {criteriaDetails}=storeToRefs(applicationStore);

const initialState={
    detail:'' ,
    according_to_criteria:'',
    according_to_map:'',
    compliance:'',
    remarks:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    getCriteriaDetails();
})

const getCriteriaDetails=async () => {
    applicationStore.getCriteriaDetails(props.mapApply.id);
}

const isSubmitting=ref(false);

const validations = object({
    detail: string().required('विवरण अनिवार्य छ |'),
    according_to_criteria: string().required('पमापदण्ड अनुसार अनिवार्य छ|'),
    according_to_map: string().required('नक्सा अनुसार अनिवार्य छ|'),
    compliance: string().required('अनुपालन अनिवार्य छ|'),
    remarks:string().nullable()
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (map_apply_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await applicationStore.updateCriteriaDetail(map_apply_id,form);
            toast(res.status,res.data.message);
            closeEditForm();
            await getCriteriaDetails();
        }catch (e) {
            showErrors(e);
        }finally {
            isSubmitting.value=false;
        }
    }
}

const openEditForm=(index)=>{
    editFormOpened.value=true;
    const selectedCriteria=criteriaDetails.value.data[index];
    Object.assign(form,{
        detail:selectedCriteria.detail??'',
        according_to_criteria:selectedCriteria.according_to_criteria??'',
        according_to_map:selectedCriteria.according_to_map??'',
        compliance:selectedCriteria.compliance??'',
        remarks:selectedCriteria.remarks??''
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
