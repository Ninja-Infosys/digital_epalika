<template>
    <form @submit.prevent="saveFormData(mapApply.id)" class="mb-2">
        <fieldset>
            <legend> ५. निवेदकको विवरण</legend>
            <button type="button" class="btn btn-xs float-end btn-outline-primary waves-effect waves-light"
                    @click.prevent="editFormOpened=!editFormOpened"><i
                class="fa fa-pen"></i>
            </button>

            <div class="mb-3">
                <label class="form-label fw-bolder">५.१ निवेदकको प्रकार </label>
                <div class="col">
                    <div v-for="type in eMapSetting?.applicantTypes??[]" class="form-check form-check-inline">
                        <input type="radio" :id="type.value"
                               v-model="form.applicant_type"
                               :value="type.value"
                               @change="validateField('applicant_type')"
                               :disabled="!editFormOpened"
                               class="form-check-input">
                        <label class="form-check-label" :for="type.value">{{ type.label }}</label>
                    </div>
                </div>
                <p v-if="errors.applicant_type" class="text-danger">
                    {{errors.applicant_type}}
                </p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bolder">५.२ घरधनी सँगको सम्बन्ध</label>
                <div class="col">
                    <div v-for="relation in eMapSetting?.relation_with_owner??[]" class="form-check form-check-inline">
                        <input type="radio" :id="relation.value"
                               v-model="form.relation_with_owner"
                               :value="relation.value"
                               @change="validateField('relation_with_owner')"
                               :disabled="!editFormOpened"
                               class="form-check-input">
                        <label class="form-check-label" :for="relation.value">{{ relation.label }}</label>
                    </div>
                </div>
                <p v-if="errors.relation_with_owner" class="text-danger">
                    {{errors.relation_with_owner}}
                </p>
            </div>
            <div class="row">
                <label class="form-label fw-bolder">जग्गाधनी वा घरधनी भन्दा फरक भएमा</label>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="applicant-name"
                        v-model="form.name"
                        label="नाम"
                        :disabled="!editFormOpened"
                        @validate="validateField('name')"
                        :error="errors.name"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="applicant-phone"
                        v-model="form.phone"
                        label="फोन नं."
                        :disabled="!editFormOpened"
                        @validate="validateField('phone')"
                        :error="errors.phone"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="applicant-father_name"
                        v-model="form.father_name"
                        label="बुवाको नाम"
                        :disabled="!editFormOpened"
                        @validate="validateField('father_name')"
                        :error="errors.father_name"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="applicant-citizenship_no"
                        v-model="form.citizenship_no"
                        label="नागरिकता नम्बर"
                        :disabled="!editFormOpened"
                        @validate="validateField('citizenship_no')"
                        :error="errors.citizenship_no"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VNepaliDatePicker
                        id="applicant-citizenship_issue_date"
                        v-model="form.citizenship_issue_date"
                        label="नागरिकता लिएको मिति"
                        :disabled="!editFormOpened"
                        @validate="validateField('citizenship_issue_date')"
                        :error="errors.citizenship_issue_date"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VSelect
                        id="applicant-citizenship_issue_district_id"
                        v-model="form.citizenship_issue_district_id"
                        :options="eMapSetting?.allDistricts??[]"
                        name-prop="district"
                        label="नागरिकता लिएको जिल्ला"
                        :disabled="!editFormOpened"
                        @validate="validateField('citizenship_issue_district_id')"
                        :error="errors.citizenship_issue_district_id"
                    />
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="col-3">
                    <VNepaliDatePicker
                        id="application_date"
                        v-model="form.application_date"
                        label="निबेदनको मिति"
                        @validate="validateField('application_date')"
                        :error="errors.application_date"
                    />
                </div>
                <div class="col-4">
                    <VFileUpload
                        id="applicant_signature"
                        v-model="form.signature"
                        label="निवेदकको सहि"
                        :default-photo="applicantDetail.data?.signature_url"
                    />
                </div>
            </div>

            <div v-if="editFormOpened" class="d-flex mt-3 justify-content-end">
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
const {applicantDetail}=storeToRefs(applicationStore);

const initialState={
    applicant_type:'',
    relation_with_owner:'',
    name:'',
    phone:'',
    father_name:'',
    citizenship_no:'',
    citizenship_issue_date:'',
    citizenship_issue_district_id:'',
    application_date:'',
    signature:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    setApplicantDetail();
})

const setApplicantDetail=async () => {
    await applicationStore.getApplicantDetail(props.mapApply.id);
    Object.keys(form).forEach(key => {
        form[key] =applicantDetail.value.data[key]??'';
    })
}

const isSubmitting=ref(false);

const validations = object({
    applicant_type:string().required('निवेदकको प्रकार अनिवार्य छ'),
    relation_with_owner:string().required('सम्बन्ध अनिवार्य छ'),
    name:string().required('निवेदकको नाम अनिवार्य छ'),
    phone:string().required('फोन न. अनिवार्य छ'),
    father_name:string().required('बुवाको नाम अनिवार्य छ'),
    citizenship_no:string().required('नागरिकता नम्बर अनिवार्य छ'),
    citizenship_issue_date:string().required('नागरिकता लिएको मिति अनिवार्य छ'),
    citizenship_issue_district_id:string().required('नागरिकता लिएको जिल्ला अनिवार्य छ'),
    application_date:string(),
    //signature:object(),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (map_apply_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        const formData = new FormData()
        Object.keys(form).forEach(key => {
            formData.append(key, form[key]??'');
        });
        try {
            let res = await applicationStore.updateApplicantDetail(map_apply_id,formData);
            toast(res.status,res.data.message);
            editFormOpened.value=false;
            resetForm();
            await setApplicantDetail();
        }catch (e) {
            showErrors(e);
        }finally {
            isSubmitting.value=false;
        }
    }
}

const resetForm = () => {
    Object.assign(form, {...initialState});
    errors.value = {};
}
</script>
