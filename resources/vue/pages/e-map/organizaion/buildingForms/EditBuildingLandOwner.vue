<template>
    <form @submit.prevent="saveFormData(buildingDocumentation.id)" class="mb-2">
        <fieldset>
            <legend>३. जग्गा धनीको विवरण </legend>
            <button type="button" class="btn btn-xs float-end btn-outline-primary waves-effect waves-light"
                    @click.prevent="editFormOpened=!editFormOpened"><i
                class="fa fa-pen"></i>
            </button>

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
                        id="landowner-former-local-body"
                        v-model="form.local_body"
                        label="साविक पालिका"
                        @validate="validateField('local_body')"
                        :disabled="!editFormOpened"
                        :error="errors.local_body"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="landowner-former-ward-no"
                        v-model="form.former_ward_no"
                        label="साविक वडा नं."
                        @validate="validateField('former_ward_no')"
                        :disabled="!editFormOpened"
                        :error="errors.former_ward_no"
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
                        :options="eBuildingSetting?.allDistricts??[]"
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
                        :default-photo="buildingLandOwner.data?.photo_url"
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
                                    :options="buildingLandOwnerProvinces??[]"
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
                                    :options="buildingLandOwnerDistricts??[]"
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
                                    :options="buildingLandOwnerLocalBodies??[]"
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
                                    :options="buildingLandOwnerWards??[]"
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
import {useBuildingSettingStore} from "../../../../stores/buildingSetting";
import {object, string} from "yup";
import {useYup} from "../../../../utils/yup";
import showErrors from "../../../../utils/showErrors";
import {toast} from "../../../../utils/toast";
import {useBuildingApplicationStore} from "../../../../stores/e-map/organization/buildingDocument";
import {useAddressStore} from "../../../../stores/address";

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
const {buildingLandOwner}=storeToRefs(buildingApplicationStore);
const landOwnerAddressStore = useAddressStore();

const initialState={
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
    local_body: '',
    former_ward_no: '',
    ward_no: '',
    tole: '',
    photo:'',
}

const form = reactive({...initialState});
const {
    provinces: buildingLandOwnerProvinces,
  districts: buildingLandOwnerDistricts,
  localBodies: buildingLandOwnerLocalBodies,
  wards: buildingLandOwnerWards,
} = storeToRefs(landOwnerAddressStore);
onMounted(()=>{
    setBuildingLandOwnerData();
    landOwnerAddressStore.getProvinces();
})

const setBuildingLandOwnerData=async () => {
    await buildingApplicationStore.getBuildingLandOwner(props.buildingDocumentation.id);
    Object.keys(form).forEach(key => {
        form[key] =buildingLandOwner.value.data[key]??'';
    })
}

const isSubmitting=ref(false);

const validations = object({
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
    former_ward_no: string().required('साबिक वडा अनिवार्य छ'),
    local_body: string().required('साबिक पालिका अनिवार्य छ'),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (building_documentation_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        const formData = new FormData()
        Object.keys(form).forEach(key => {
            formData.append(key, form[key]??'');
        });
        try {
            let res = await buildingApplicationStore.updateBuildingLandOwner(building_documentation_id,formData);
            toast(res.status,res.data.message);
            editFormOpened.value=false;
            resetForm();
            await setBuildingLandOwnerData();
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
