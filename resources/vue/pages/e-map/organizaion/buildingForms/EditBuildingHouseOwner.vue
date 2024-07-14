<template>
    <form @submit.prevent="saveFormData(buildingDocumentation.id)" class="mb-2">
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
                        :options="eBuildingSetting?.allDistricts??[]"
                        name-prop="district"
                        label="नागरिकता लिएको जिल्ला"
                        :disabled="!editFormOpened"
                        @validate="validateField('citizenship_issue_district_id')"
                        :error="errors.citizenship_issue_district_id"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VFileUpload
                        id="house-owner-photo"
                        v-model="form.photo"
                        label="घर धनीको फोटो"
                        :disabled="!editFormOpened"
                        :default-photo="buildingHouseOwner.data?.photo_url"
                    />
                </div>

                <div class="col-md-12">
                    <fieldset>
                        <legend>ठेगाना</legend>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <VMultiSelect
                                    id="houseOwner-province_id"
                                    v-model="form.province_id"
                                    :options="buildingHouseOwnerProvinces??[]"
                                    name-prop="province"
                                    label="प्रदेश"
                                    @validate="validateField('province_id')"
                                    :error="errors['province_id']"
                                    :disabled="!editFormOpened"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect
                                    id="houseOwner-district_id"
                                    v-model="form.district_id"
                                    :options="buildingHouseOwnerDistricts??[]"
                                    name-prop="district"
                                    label="जिल्ला"
                                    @validate="validateField('district_id')"
                                    :error="errors['district_id']"
                                    :disabled="!editFormOpened"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect
                                    id="houseOwner-local_body_id"
                                    v-model="form.local_body_id"
                                    :options="buildingHouseOwnerLocalBodies??[]"
                                    name-prop="local_body"
                                    label="पालिका"
                                    @validate="validateField('local_body_id')"
                                    :error="errors['local_body_id']"
                                    :disabled="!editFormOpened"
                                />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect
                                    id="houseOwner-ward_no"
                                    v-model="form.ward_no"
                                    :options="buildingHouseOwnerWards??[]"
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

const props = defineProps({
    buildingDocumentation: {
        required: true,
        type: Object
    }
})
const houseOwnerAddressStore = useAddressStore();
const buildingSettingStore=useBuildingSettingStore();
const buildingApplicationStore=useBuildingApplicationStore();

const editFormOpened = ref(false);
const {
    provinces: buildingHouseOwnerProvinces,
    districts: buildingHouseOwnerDistricts,
    localBodies: buildingHouseOwnerLocalBodies,
    wards: buildingHouseOwnerWards
} = storeToRefs(houseOwnerAddressStore);

const {eBuildingSetting}=storeToRefs(buildingSettingStore);

const {buildingHouseOwner} = storeToRefs(buildingApplicationStore);

const initialState = {
    name: '',
    phone: '',
    father_name: '',
    grandfather_name: '',
    citizenship_no: '',
    citizenship_issue_date: '',
    citizenship_issue_district_id: '',
    province_id: '',
    district_id: '',
    local_body_id: '',
    ward_no: '',
    tole: '',
    photo: '',
}

const form = reactive({...initialState});

onMounted(() => {
    setBuildingHouseOwnerData();
    houseOwnerAddressStore.getProvinces();
})

const setBuildingHouseOwnerData = async () => {
    await buildingApplicationStore.getBuildingHouseOwner(props.buildingDocumentation.id);
    Object.keys(form).forEach(key => {
        form[key] = buildingHouseOwner.value.data[key] ?? '';
    })
}

const isSubmitting = ref(false);

const validations = object({
    name: string().required('घर धनीको नाम अनिवार्य छ'),
    phone: string(),
    father_name: string().required('बुवाको नाम अनिवार्य छ'),
    grandfather_name: string().required('हजुरबुबाको नाम अनिवार्य छ'),
    citizenship_no: string().required('नागरिकता नम्बर अनिवार्य छ'),
    citizenship_issue_date: string().required('नागरिकता लिएको मिति अनिवार्य छ'),
    citizenship_issue_district_id: string().required('नागरिकता लिएको जिल्ला अनिवार्य छ'),
    province_id: string().required('प्रदेश अनिवार्य छ'),
    district_id: string().required('जिल्ला अनिवार्य छ'),
    local_body_id: string().required('पालिका अनिवार्य छ'),
    ward_no: string().required('वडा नं. अनिवार्य छ'),
    tole: string().required('टोल अनिवार्य छ'),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData = async (building_documentation_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        const formData = new FormData()
        Object.keys(form).forEach(key => {
            formData.append(key, form[key] ?? '');
        });
        try {
            let res = await buildingApplicationStore.updateBuildingHouseOwner(building_documentation_id, formData);
            toast(res.status, res.data.message);
            editFormOpened.value = false;
            resetForm();
            await setBuildingHouseOwnerData();
        } catch (e) {
            showErrors(e);
        } finally {
            isSubmitting.value = false;
        }
    }
}

const resetForm = () => {
    Object.assign(form, {...initialState});
    errors.value = {};
}

watch(() => form.province_id, (province_id) => {
    if (province_id) {
        houseOwnerAddressStore.getProvince(province_id)
    }
})
watch(() => form.district_id, (district_id) => {
    if (district_id) {
        houseOwnerAddressStore.getDistrict(district_id)
    }
})
watch(() => form.local_body_id, (local_body_id) => {
    if (local_body_id) {
        houseOwnerAddressStore.getLocalBody(local_body_id)
    }
})
</script>
