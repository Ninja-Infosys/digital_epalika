<template>
    <form @submit.prevent="saveFormData(mapApply.id)" class="mb-2">
        <fieldset>
            <legend>२. जग्गाको विवरण</legend>
            <button type="button" class="btn btn-xs float-end btn-outline-primary waves-effect waves-light"
                    @click.prevent="editFormOpened=!editFormOpened"><i
                class="fa fa-pen"></i>
            </button>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <VSelect
                        id="land_use_area_id"
                        v-model="form.land_use_area_id"
                        :options="eMapSetting?.landUseAreas??[]"
                        label="भू-उपयोग्य क्षेत्र"
                        name-prop="title"
                        @validate="validateField('land_use_area_id')"
                        :error="errors.land_use_area_id"
                        :disabled="!editFormOpened"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="number"
                        id="ward_no"
                        v-model="form.ward_no"
                        @validate="validateField('ward_no')"
                        label="वडा नं"
                        :disabled="!editFormOpened"
                        :error="errors.ward_no"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="text"
                        id="former_ward_no"
                        v-model="form.former_ward_no"
                        @validate="validateField('former_ward_no')"
                        label="साविक वडा नं"
                        :disabled="!editFormOpened"
                        :error="errors.former_ward_no"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="tole"
                        v-model="form.tole"
                        @validate="validateField('tole')"
                        label="टोलको नाम"
                        :disabled="!editFormOpened"
                        :error="errors.tole"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="street_code_no"
                        v-model="form.street_code_no"
                        @validate="validateField('street_code_no')"
                        label="सडक कोड नं"
                        :disabled="!editFormOpened"
                        :error="errors.street_code_no"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="plot_no"
                        v-model="form.plot_no"
                        @validate="validateField('plot_no')"
                        label="जग्गा कित्ता नं"
                        :disabled="!editFormOpened"
                        :error="errors.plot_no"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="unit_value"
                        v-model="form.unit_value"
                        :label="`क्षेत्रफल (${eMapSetting?.setting?.standard_land_measurement??''})`"
                        placeholder="क्षेत्रफल"
                        @validate="validateField('unit_value')"
                        :disabled="!editFormOpened"
                        :error="errors.unit_value"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="number"
                        id="percentage_of_area_covered_by_building"
                        v-model="form.percentage_of_area_covered_by_building"
                        label="भवनले ढाक्ने क्षेत्रफलको प्रतिशत (GCR)"
                        @validate="validateField('percentage_of_area_covered_by_building')"
                        :disabled="!editFormOpened"
                        :error="errors.percentage_of_area_covered_by_building"
                    />
                </div>
            </div>
            <div v-if="editFormOpened" class="d-flex justify-content-end">
                <VButton
                    btn-label="पेश गर्नुहोस्"
                    :loading="isSubmitting"
                />
            </div>
        </fieldset>
    </form>
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

const initialState={
    land_use_area_id:'',
    ward_no:'',
    former_ward_no:'',
    tole:'',
    street_code_no:'',
    plot_no:'',
    unit_value:'',
    percentage_of_area_covered_by_building:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    Object.keys(form).forEach(key => {
        form[key] =props.mapApply.land_detail[key]??'';
    })
})

const isSubmitting=ref(false);

const validations = object({
    land_use_area_id:string().required('अनिवार्य छ'),
    ward_no:string().required('अनिवार्य छ'),
    former_ward_no:string().required('अनिवार्य छ'),
    tole:string().required('अनिवार्य छ'),
    street_code_no:string().nullable(),
    plot_no:string().required('अनिवार्य छ'),
    unit_value:string().required('अनिवार्य छ'),
    percentage_of_area_covered_by_building:string().required('अनिवार्य छ'),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (map_apply_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await applicationStore.updateLandDetail(map_apply_id,form);
            toast(res.status,res.data.message);
            editFormOpened.value=false;
        }catch (e) {
            showErrors(e);
        }finally {
            isSubmitting.value=false;
        }
    }
}
</script>
