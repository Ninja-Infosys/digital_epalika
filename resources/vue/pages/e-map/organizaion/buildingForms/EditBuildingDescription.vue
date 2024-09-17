<template>
    <fieldset>
        <legend> ८. भवनको बाहिरि पर्खाल र सिमानासम्माको दुरीको विवरण </legend>
        <div class="col-md-12">
            <label class="form-label fw-bold">मापदण्ड सम्बन्धि विवरण</label>
            <div class="table-responsive mt-1">
                <table class="table table-sm table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>क्र.सं</th>
                        <th> दिशा</th>
                        <th> सडक छ, छैन (छ भने सडकको प्रकार)</th>
                        <th>झ्याल ढोका छ, छैन ? भए सोको विवरण</th>
                        <th>न्यूनतम छाड्नु पर्ने</th>
                        <th>छाडिएको</th>
                        <th>कैफियत</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(criteria,index) in buildingDescriptions.data" :key="index">
                        <td>{{index+1}}</td>
                        <td>
                            {{criteria.direction_label}}
                        </td>
                        <td>
                            {{criteria.has_road}}
                        </td>
                        <td>
                            {{criteria.has_window}}
                        </td>
                        <td>
                            {{criteria.minimum_distance_to_leave}}
                        </td>
                        <td>
                            {{criteria.leave}}
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

    <VModal title="भवनको बाहिरि पर्खाल र सिमानासम्माको दुरीको विवरण"
            v-model:show-modal="editFormOpened"
            @close-click="closeEditForm">
        <template #body>
            <form @submit.prevent="saveFormData(buildingDocumentation.id)">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="has_road"
                            v-model="form.has_road"
                            label="सडक छ, छैन"
                            @validate="validateField('has_road')"
                            :error="errors.has_road"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="has_window"
                            v-model="form.has_window"
                            label="झ्याल ढोका छ, छैन ? भए सोको विवरण"
                            @validate="validateField('has_window')"
                            :error="errors.has_window"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="minimum_distance_to_leave"
                            v-model="form.minimum_distance_to_leave"
                            label="न्यूनतम छाड्नु पर्ने"
                            @validate="validateField('minimum_distance_to_leave')"
                            :error="errors.minimum_distance_to_leave"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="leave"
                            v-model="form.leave"
                            label="छाडिएको"
                            @validate="validateField('leave')"
                            :error="errors.leave"
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
import {useBuildingSettingStore} from "../../../../stores/buildingSetting";
import {object, string} from "yup";
import {useYup} from "../../../../utils/yup";
import showErrors from "../../../../utils/showErrors";
import {toast} from "../../../../utils/toast";
import {useBuildingApplicationStore} from "../../../../stores/e-map/organization/buildingDocument";


const props=defineProps({
    buildingDocumentation:{
        required:true,
        type:Object
    }
})

const buildingSettingStore=useBuildingSettingStore();
const buildingApplicationStore=useBuildingApplicationStore();

const editFormOpened=ref(false);

const {eBuildingSetting}=storeToRefs(buildingSettingStore);
const {buildingDescriptions}=storeToRefs(buildingApplicationStore);

const initialState={
    direction:'' ,
    has_road:'',
    has_window:'',
    minimum_distance_to_leave:'',
    leave:'',
    remarks:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    getBuildingDescriptions();
})

const getBuildingDescriptions=async () => {
    buildingApplicationStore.getBuildingDescriptions(props.buildingDocumentation.id);
}

const isSubmitting=ref(false);

const validations = object({
    direction: string().required('विवरण अनिवार्य छ |'),
    has_road: string().required('सडक छ, छैन अनिवार्य छ|'),
    has_window: string().required('झ्याल ढोका छ, छैन ? भए सोको विवरण अनिवार्य छ|'),
    minimum_distance_to_leave: string().required('न्यूनतम छाड्नु पर्ने अनिवार्य छ|'),
    leave: string().required('छाडिएको अनिवार्य छ|'),
    remarks:string().nullable()
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (building_documentation_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await buildingApplicationStore.updateBuildingDescription(building_documentation_id,form);
            toast(res.status,res.data.message);
            closeEditForm();
            await getBuildingDescriptions();
        }catch (e) {
            showErrors(e);
        }finally {
            isSubmitting.value=false;
        }
    }
}

const openEditForm=(index)=>{
    editFormOpened.value=true;
    const selectedCriteria=buildingDescriptions.value.data[index];
    Object.assign(form,{
        direction:selectedCriteria.direction??'',
        has_road:selectedCriteria.has_road??'',
        has_window:selectedCriteria.has_window??'',
        minimum_distance_to_leave:selectedCriteria.minimum_distance_to_leave??'',
        leave:selectedCriteria.leave??'',
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
