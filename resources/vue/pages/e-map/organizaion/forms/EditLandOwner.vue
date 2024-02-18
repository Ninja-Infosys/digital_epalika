<template>
    <form @submit.prevent="saveFormData(mapApply.id)" class="mb-2">
        <fieldset>
            <legend>३. जग्गा धनीको विवरण </legend>
            <button type="button" class="btn btn-xs float-end btn-outline-primary waves-effect waves-light"
                    @click.prevent="editFormOpened=!editFormOpened"><i
                class="fa fa-pen"></i>
            </button>
            <div class="mb-3">
                <label class="form-label fw-bolder"> जग्गा धनीको किसिम <span class="text-danger">*</span></label>
                <div class="col">
                    <div v-for="ownerType in eMapSetting?.ownerTypes??[]" class="form-check form-check-inline">
                        <input type="radio" class="form-check-input"
                               :id="ownerType.value"
                               v-model="form.land_owner_type"
                               @change="validateField('land_owner_type')"
                               :disabled="!editFormOpened"
                               :value="ownerType.value">
                        <label class="form-check-label"
                               :for="ownerType.value">
                            {{ownerType.label}}
                        </label>
                    </div>
                </div>
                <p v-if="errors.land_owner_type" class="text-danger">
                    {{errors.land_owner_type}}
                </p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-name"
                        v-model="form.name"
                        label="जग्गा धनीको नाम"
                        @validate="validateField('name')"
                        :disabled="!editFormOpened"
                        :error="errors.name"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-phone"
                        v-model="form.phone"
                        label="फोन नं."
                        @validate="validateField('phone')"
                        :disabled="!editFormOpened"
                        :error="errors.phone"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-father-name"
                        v-model="form.father_name"
                        label="बुवाको नाम"
                        @validate="validateField('father_name')"
                        :disabled="!editFormOpened"
                        :error="errors.father_name"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-grandfather-name"
                        v-model="form.grandfather_name"
                        label="हजुरबुबाको नाम"
                        @validate="validateField('grandfather_name')"
                        :disabled="!editFormOpened"
                        :error="errors.grandfather_name"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-citizenship_no"
                        v-model="form.citizenship_no"
                        label="नागरिकता नम्बर"
                        @validate="validateField('citizenship_no')"
                        :disabled="!editFormOpened"
                        :error="errors.citizenship_no"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VNepaliDatePicker
                        id="landowner-citizenship_issue_date"
                        v-model="form.citizenship_issue_date"
                        label="नागरिकता लिएको मिति"
                        @validate="validateField('citizenship_issue_date')"
                        :disabled="!editFormOpened"
                        :error="errors.citizenship_issue_date"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VSelect
                        id="landowner-citizenship_issue_district_id"
                        v-model="form.citizenship_issue_district_id"
                        :options="eMapSetting?.allDistricts??[]"
                        name-prop="district"
                        label="नागरिकता लिएको जिल्ला"
                        @validate="validateField('citizenship_issue_district_id')"
                        :disabled="!editFormOpened"
                        :error="errors.citizenship_issue_district_id"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-address"
                        v-model="form.address"
                        label="ठेगाना"
                        @validate="validateField('address')"
                        :disabled="!editFormOpened"
                        :error="errors.address"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-local_body"
                        v-model="form.local_body"
                        label="पालिका"
                        @validate="validateField('local_body')"
                        :disabled="!editFormOpened"
                        :error="errors.local_body"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="number"
                        id="landowner-ward_no"
                        v-model="form.ward_no"
                        label="वडा नं."
                        @validate="validateField('ward_no')"
                        :disabled="!editFormOpened"
                        :error="errors.ward_no"
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
    land_owner_type:'',
    name:'',
    phone:'',
    father_name:'',
    grandfather_name:'',
    citizenship_no:'',
    citizenship_issue_date:'',
    citizenship_issue_district_id:'',
    address:'',
    local_body:'',
    ward_no:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    Object.keys(form).forEach(key => {
        form[key] =props.mapApply.land_owner[key]??'';
    })
})

const isSubmitting=ref(false);

const validations = object({
    land_owner_type:string().required('जग्गा धनीको किसिम अनिवार्य छ'),
    name:string().required('जग्गा धनीको नाम अनिवार्य छ'),
    phone:string(),
    father_name:string().required('बुवाको नाम अनिवार्य छ'),
    grandfather_name:string().required('हजुरबुबाको नाम अनिवार्य छ'),
    citizenship_no:string().required('नागरिकता नम्बर अनिवार्य छ'),
    citizenship_issue_date:string().required('नागरिकता लिएको मिति अनिवार्य छ'),
    citizenship_issue_district_id:string().required('नागरिकता लिएको जिल्ला अनिवार्य छ'),
    address:string().required('ठेगाना अनिवार्य छ'),
    local_body:string().required('पालिका अनिवार्य छ'),
    ward_no:string().required('वडा नं. अनिवार्य छ'),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (map_apply_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await applicationStore.updateLandOwner(map_apply_id,form);
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
