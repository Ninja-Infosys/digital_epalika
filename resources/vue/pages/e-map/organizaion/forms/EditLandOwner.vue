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
                    <VFileUpload
                        id="landowner-photo"
                        v-model="form.photo"
                        label="जग्गाधनीको फोटो"
                        :default-photo="landOwner.data?.photo_url"
                        :disabled="!editFormOpened"
                    />
                </div>
                <div class="col-md-12">
                    <fieldset>
                        <legend>ठेगाना</legend>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <VMultiSelect
                                    id="landOwner-province_id"
                                    v-model="form.province_id"
                                    :options="landOwnerProvinces??[]"
                                    name-prop="province"
                                    label="प्रदेश"
                                    @validate="validateField('province_id')"
                                    :error="errors['province_id']"
                                     :disabled="!editFormOpened"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect
                                    id="landOwner-district_id"
                                    v-model="form.district_id"
                                    :options="landOwnerDistricts??[]"
                                    name-prop="district"
                                    label="जिल्ला"
                                    @validate="validateField('district_id')"
                                    :error="errors['district_id']"
                                     :disabled="!editFormOpened"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect
                                    id="landOwner-local_body_id"
                                    v-model="form.local_body_id"
                                    :options="landOwnerLocalBodies??[]"
                                    name-prop="local_body"
                                    label="पालिका"
                                    @validate="validateField('local_body_id')"
                                    :error="errors['local_body_id']"
                                     :disabled="!editFormOpened"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect
                                    id="landOwner-ward_no"
                                    v-model="form.ward_no"
                                    :options="landOwnerWards??[]"
                                    label="वार्ड"
                                    @validate="validateField('ward_no')"
                                    :error="errors['ward_no']"
                                     :disabled="!editFormOpened"
                                />
                            </div>
                            <div class="col-md-3 mb-3">
                                <VInput
                                    input-type="text"
                                    id="tole"
                                    v-model="form.tole"
                                    placeholder="टोल"
                                    label="टोल"
                                    @validate="validateField('tole')"
                                    :error="errors['tole']"
                                     :disabled="!editFormOpened"
                                />
                            </div>
                        </div>
                    </fieldset>
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
import {useAddressStore} from "../../../../stores/address";

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
const {landOwner}=storeToRefs(applicationStore);
const landOwnerAddressStore = useAddressStore();
const initialState={
    land_owner_type:'',
    name:'',
    phone:'',
    father_name:'',
    grandfather_name:'',
    citizenship_no:'',
    citizenship_issue_date:'',
    citizenship_issue_district_id:'',
    province_id: '',
    district_id: '',
    local_body_id: '',
    ward_no: '',
    tole: '',
    photo:'',
}

const form = reactive({...initialState});
const {
    provinces: landOwnerProvinces,
    districts: landOwnerDistricts,
    localBodies: landOwnerLocalBodies,
    wards: landOwnerWards
} = storeToRefs(landOwnerAddressStore);
onMounted(()=>{
    setLandOwnerData();
    landOwnerAddressStore.getProvinces();
})

const setLandOwnerData=async () => {
    await applicationStore.getLandOwner(props.mapApply.id);
    Object.keys(form).forEach(key => {
        form[key] =landOwner.value.data[key]??'';
    })
}

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
    province_id: string().required('प्रदेश अनिवार्य छ'),
    district_id: string().required('जिल्ला अनिवार्य छ'),
    local_body_id: string().required('पालिका अनिवार्य छ'),
    ward_no: string().required('वडा नं. अनिवार्य छ'),
    tole: string().required('टोल अनिवार्य छ'),
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
            let res = await applicationStore.updateLandOwner(map_apply_id,formData);
            toast(res.status,res.data.message);
            editFormOpened.value=false;
            resetForm();
            await setLandOwnerData();
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

watch(() => form.province_id, (province_id) => {
    if (province_id) {
        landOwnerAddressStore.getProvince(province_id)
    }
})
watch(() => form.district_id, (district_id) => {
    if (district_id) {
        landOwnerAddressStore.getDistrict(district_id)
    }
})
watch(() => form.local_body_id, (local_body_id) => {
    if (local_body_id) {
        landOwnerAddressStore.getLocalBody(local_body_id)
    }
})
</script>
