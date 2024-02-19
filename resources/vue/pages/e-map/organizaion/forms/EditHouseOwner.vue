<template>
    <form @submit.prevent="saveFormData(mapApply.id)" class="mb-2">
        <fieldset>
            <legend>४. घर धनीको विवरण (जग्गाधनी भन्दा फरक भएमा)</legend>
            <button type="button" class="btn btn-xs float-end btn-outline-primary waves-effect waves-light"
                    @click.prevent="editFormOpened=!editFormOpened"><i
                class="fa fa-pen"></i>
            </button>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-name"
                        v-model="form.name"
                        label="घर धनीको नाम"
                        :disabled="!editFormOpened"
                        @validate="validateField('name')"
                        :error="errors.name"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-phone"
                        v-model="form.phone"
                        label="फोन नं."
                        :disabled="!editFormOpened"
                        @validate="validateField('phone')"
                        :error="errors.phone"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-father_name"
                        v-model="form.father_name"
                        label="बुवाको नाम"
                        :disabled="!editFormOpened"
                        @validate="validateField('father_name')"
                        :error="errors.father_name"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-grandfather_name"
                        v-model="form.grandfather_name"
                        label="हजुरबुबाको नाम"
                        :disabled="!editFormOpened"
                        @validate="validateField('grandfather_name')"
                        :error="errors.grandfather_name"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-citizenship_no"
                        v-model="form.citizenship_no"
                        label="नागरिकता नम्बर"
                        :disabled="!editFormOpened"
                        @validate="validateField('citizenship_no')"
                        :error="errors.citizenship_no"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VNepaliDatePicker
                        id="houseOwner-citizenship_issue_date"
                        v-model="form.citizenship_issue_date"
                        label="नागरिकता लिएको मिति"
                        :disabled="!editFormOpened"
                        @validate="validateField('citizenship_issue_date')"
                        :error="errors.citizenship_issue_date"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VSelect
                        id="houseOwner-citizenship_issue_district_id"
                        v-model="form.citizenship_issue_district_id"
                        :options="eMapSetting?.allDistricts??[]"
                        name-prop="district"
                        label="नागरिकता लिएको जिल्ला"
                        :disabled="!editFormOpened"
                        @validate="validateField('citizenship_issue_district_id')"
                        :error="errors.citizenship_issue_district_id"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-address"
                        v-model="form.address"
                        label="ठेगाना"
                        :disabled="!editFormOpened"
                        @validate="validateField('address')"
                        :error="errors.address"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="houseOwner-local_body"
                        v-model="form.local_body"
                        label="पालिका"
                        :disabled="!editFormOpened"
                        @validate="validateField('local_body')"
                        :error="errors.local_body"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="number"
                        id="houseOwner-ward_no"
                        v-model="form.ward_no"
                        label="वडा नं."
                        :disabled="!editFormOpened"
                        @validate="validateField('ward_no')"
                        :error="errors.ward_no"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VFileUpload
                        id="house-owner-photo"
                        v-model="form.photo"
                        label="घर धनीको फोटो"
                        :default-photo="houseOwner.data?.photo_url"
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
const {houseOwner}=storeToRefs(applicationStore);

const initialState={
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
    photo:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    setHouseOwnerData();
})

const setHouseOwnerData=async () => {
    await applicationStore.getHouseOwner(props.mapApply.id);
    Object.keys(form).forEach(key => {
        form[key]=houseOwner.value.data[key]??'';
    })
}

const isSubmitting=ref(false);

const validations = object({
    name:string().required('घर धनीको नाम अनिवार्य छ'),
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
        const formData = new FormData()
        Object.keys(form).forEach(key => {
            formData.append(key, form[key]??'');
        });
        try {
            let res = await applicationStore.updateHouseOwner(map_apply_id,formData);
            toast(res.status,res.data.message);
            editFormOpened.value=false;
            resetForm();
            await setHouseOwnerData();
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
