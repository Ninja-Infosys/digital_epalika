<template>
    <fieldset>
        <legend> ७. ठेकेदारको विवरण</legend>

        <template v-for="(contractor,index) in contractorDetails.data" :key="index">

                    <button type="button" class="btn btn-xs float-end btn-outline-primary waves-effect waves-light"
                            @click.prevent="openEditForm(contractor,index)"><i
                        class="fa fa-pen"></i>
                    </button>

            <div class="row">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label" :for="'contractor-'+index+'name'">नाम </label>
                        <input type="text"
                               readonly
                               class="form-control form-control-sm"
                               :value="contractor.name"
                               :id="'contractor-'+index+'name'">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" :for="'contractor-'+index+'father_name'">बुवाको नाम </label>
                        <input type="text"
                               readonly
                               class="form-control form-control-sm"
                               :value="contractor.father_name"
                               :id="'contractor-'+index+'father_name'">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label" :for="'contractor-'+index+'grandfather_name'">हजुरबुबाको नाम </label>
                        <input type="text"
                               readonly
                               class="form-control form-control-sm"
                               :value="contractor.grandfather_name"
                               :id="'contractor-'+index+'grandfather_name'">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label" :for="'contractor-'+index+'phone'">फोन </label>
                        <input type="text"
                               readonly
                               class="form-control form-control-sm"
                               :value="contractor.phone"
                               :id="'contractor-'+index+'phone'">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label" :for="'contractor-'+index+'nec_council_no'">NEC Council No. </label>
                        <input type="text"
                               readonly
                               class="form-control form-control-sm"
                               :value="contractor.nec_council_no"
                               :id="'contractor-'+index+'nec_council_no'">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label" :for="'contractor-'+index+'local_body_registration_no'">पालिकाको दर्ता
                            नं. </label>
                        <input type="text"
                               readonly
                               class="form-control form-control-sm"
                               :value="contractor.local_body_registration_no"
                               :id="'contractor-'+index+'local_body_registration_no'">
                    </div>
                    <div class="col-md-12">
                        <fieldset>
                            <legend>ठेगाना</legend>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" :for="'contractor-'+index+'province'">प्रदेश</label>
                                    <input type="text"
                                           readonly
                                           class="form-control form-control-sm"
                                           :value="contractor.province"
                                           :id="'contractor-'+index+'province'">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" :for="'contractor-'+index+'district'">जिल्ला</label>
                                    <input type="text"
                                           readonly
                                           class="form-control form-control-sm"
                                           :value="contractor.district"
                                           :id="'contractor-'+index+'district'">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" :for="'contractor-'+index+'local_body'">पालिका</label>
                                    <input type="text"
                                           readonly
                                           class="form-control form-control-sm"
                                           :value="contractor.local_body"
                                           :id="'contractor-'+index+'local_body'">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" :for="'contractor-'+index+'ward_no'">वार्ड</label>
                                    <input type="text"
                                           readonly
                                           class="form-control form-control-sm"
                                           :value="contractor.ward_no"
                                           :id="'contractor-'+index+'ward_no'">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" :for="'contractor-'+index+'tole'">टोल</label>
                                    <input type="text"
                                           readonly
                                           class="form-control form-control-sm"
                                           :value="contractor.tole"
                                           :id="'contractor-'+index+'tole'">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </template>
    </fieldset>

    <VModal title="ठेकेदारको विवरण"
            v-model:show-modal="editFormOpened"
            modal-class="extra-medium-modal"
            @close-click="closeEditForm">
        <template #body>
            <form @submit.prevent="saveFormData(buildingDocumentation.id)">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <VInput
                            id="contractor-name"
                            v-model="form.name"
                            label="नाम"
                            @validate="validateField('name')"
                            :error="errors.name"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            id="contractor-father-name"
                            v-model="form.father_name"
                            label="बुवाको नाम"
                            @validate="validateField('father_name')"
                            :error="errors.father_name"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            id="contractor-grandfather-name"
                            v-model="form.grandfather_name"
                            label="हजुरबुबाको नाम"
                            @validate="validateField('grandfather_name')"
                            :error="errors.grandfather_name"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            id="contractor-phone"
                            v-model="form.phone"
                            label="फोन नं."
                            @validate="validateField('phone')"
                            :error="errors.phone"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            id="contractor-nec_council_no"
                            v-model="form.nec_council_no"
                            label="NEC Council No."
                            @validate="validateField('nec_council_no')"
                            :error="errors.nec_council_no"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            id="contractor-local_body_registration_no"
                            v-model="form.local_body_registration_no"
                            label="पालिकाको दर्ता नं."
                            @validate="validateField('local_body_registration_no')"
                            :error="errors.local_body_registration_no"
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
                                        :options="provinces??[]"
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
                                        :options="districts??[]"
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
                                        :options="localBodies??[]"
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
                                        :options="wards??[]"
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
                <div class="form-group mb-2">
                    <VButton
                        btn-label="पेश गर्नुहोस्"
                        :loading="isSubmitting"
                    />
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
import {useAddressStore} from "../../../../stores/address";

const props = defineProps({
    buildingDocumentation: {
        required: true,
        type: Object
    }
})

const buildingSettingStore=useBuildingSettingStore();
const buildingApplicationStore=useBuildingApplicationStore();

const editFormOpened = ref(false);

const {eBuildingSetting}=storeToRefs(buildingSettingStore);
const {contractorDetails} = storeToRefs(buildingApplicationStore);
const addressStore = useAddressStore();
const initialState = {
    name: '',
    father_name: '',
    grandfather_name: '',
    phone: '',
    province: '',
    district: '',
    local_body: '',
    province_id: '',
    district_id: '',
    local_body_id: '',
    ward_no: '',
    tole: '',
    nec_council_no: '',
    local_body_registration_no: '',
}
const {
    provinces,
    districts,
    localBodies,
    wards
} = storeToRefs(addressStore);
const form = reactive({...initialState});

onMounted(() => {
    getContractorDetails();
    addressStore.getProvinces()
})

const getContractorDetails = async () => {
    buildingApplicationStore.getContractorDetails(props.buildingDocumentation.id);
}

const isSubmitting = ref(false);

const validations = object({
    name: string().required('नाम अनिवार्य छ |'),
    father_name: string().required('बुबाको नाम अनिवार्य छ |'),
    grandfather_name: string().required('हजुरबुबाको नाम अनिवार्य छ |'),
    phone: string().required('फोन अनिवार्य छ |'),
    province: string().nullable(),
    district: string().nullable(),
    local_body: string().nullable(),
    province_id: string().required('प्रदेश अनिवार्य छ'),
    district_id: string().required('जिल्ला अनिवार्य छ'),
    local_body_id: string().required('पालिका अनिवार्य छ'),
    ward_no: string().required('वडा नं. अनिवार्य छ'),
    tole: string().required('टोल अनिवार्य छ'),
    nec_council_no: string().nullable(),
    local_body_registration_no: string().nullable(),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData = async (building_documentation_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await buildingApplicationStore.updateContractorDetail(building_documentation_id, form);
            toast(res.status, res.data.message);
            closeEditForm();
            await getContractorDetails();
        } catch (e) {
            showErrors(e);
        } finally {
            isSubmitting.value = false;
        }
    }
}

const openEditForm = (index) => {
    editFormOpened.value = true;
    const contractor = contractorDetails.value.data[index];
    Object.assign(form, {
        name: contractor?.name,
        father_name: contractor?.father_name,
        grandfather_name: contractor?.grandfather_name,
        phone: contractor?.phone,
        province: contractor?.province,
        district: contractor?.district,
        local_body: contractor?.local_body,
        province_id: contractor?.province_id,
        district_id: contractor?.district_id,
        local_body_id: contractor?.local_body_id,
        ward_no: contractor?.ward_no,
        tole: contractor?.tole,
        nec_council_no: contractor?.nec_council_no,
        local_body_registration_no: contractor?.local_body_registration_no,
    })
}

const closeEditForm = () => {
    editFormOpened.value = false;
    resetForm();
}

const resetForm = () => {
    Object.assign(form, {...initialState});
}

watch(() => form.province_id, (province_id) => {
    if (province_id) {
        addressStore.getProvince(province_id)
    }
})
watch(() => form.district_id, (district_id) => {
    if (district_id) {
        addressStore.getDistrict(district_id)
    }
})
watch(() => form.local_body_id, (local_body_id) => {
    if (local_body_id) {
        addressStore.getLocalBody(local_body_id)
    }
})
</script>
