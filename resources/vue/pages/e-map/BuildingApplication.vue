<template>
    <form @submit.prevent="registerBuildingApplication">
        <div class="row mb-3">
            <div class="col-md-4">
                <VMultiSelect id="organization_id" v-model="form.organization_id" label="संस्था" name-prop="org_name_ne"
                    :options="eBuildingSetting?.organizations ?? []" @validate="validateField('organization_id')"
                    :error="errors.organization_id" />
            </div>

        </div>
        <div class="card p-4 mb-4">
            <legend>
                <h5>१. प्रस्तावित भवनको विवरण</h5>
            </legend>

            <div class="mb-1">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <VInput id="plinth_area" v-model="form.plinth_area" placeholder="भवनको प्लिथको क्षेत्रफल"
                            label="१.१ भवनको प्लिथको क्षेत्रफल" @validate="validateField('plinth_area')"
                            :error="errors.plinth_area" />
                    </div>

                    <div class="col-md-3 mb-3">
                        <VInput input-type="number" id="room" v-model="form.room" placeholder="कोठा संख्या"
                            label="१.२ कोठा संख्या" @validate="validateField('room')" :error="errors.room" />
                    </div>

                    <div class="col-md-3 mb-3">
                        <VInput input-type="number" id="storey" v-model="form.storey" placeholder="तल्ला संख्या"
                            label="१.३ तल्ला संख्या" @validate="validateField('storey')" :error="errors.storey" />
                    </div>

                    <div class="col-md-3 mb-3">
                        <VInput input-type="number" id="house_built_year" v-model="form.house_built_year"
                            placeholder="घर बनेको साल" label="१.४ घर बनेको साल"
                            @validate="validateField('house_built_year')" :error="errors.house_built_year" />
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-4 mb-4">
            <legend>
                <h5>२. जग्गाको विवरण</h5>
            </legend>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <VInput input-type="number" v-model="form.land_ward_no" label="२.१ वडा नं" placeholder="वडा नं"
                        @validate="validateField('land_ward_no')" :error="errors['land_ward_no']" />
                </div>

                <div class="col-md-4 mb-3">
                    <VInput input-type="text" v-model="form.former_local_body" label="२.२ साविक पालिका"
                        placeholder="साविक पालिका" @validate="
                            validateField('former_local_body')
                            " :error="errors['former_local_body']" />
                </div>

                <div class="col-md-4 mb-3">
                    <VInput input-type="text" v-model="form.former_ward_no" label="२.२ साविक वडा नं"
                        placeholder="साविक वडा नं" @validate="validateField('former_ward_no')"
                        :error="errors['former_ward_no']" />
                </div>

                <div class="col-md-4 mb-3">
                    <VInput v-model="form.land_tole" label="२.३ टोलको नाम" placeholder="टोलको नाम"
                        @validate="validateField('land_tole')" :error="errors['land_tole']" />
                </div>

                <div class="col-md-4 mb-3">
                    <VInput id="plot_no" v-model="form.plot_no" label="२.४ जग्गा कित्ता नं"
                        placeholder="जग्गा कित्ता नं" @validate="validateField('plot_no')" :error="errors['plot_no']" />
                </div>

            </div>
        </div>

        <div class="card p-4 mb-4">
            <legend>
                <h5>३. जग्गा धनीको विवरण</h5>
            </legend>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <VInput id="landowner-name" v-model="form.buildingLandOwner.name" label="जग्गा धनीको नाम"
                        @validate="validateField('buildingLandOwner.name')" :error="errors['buildingLandOwner.name']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput id="landowner-phone" v-model="form.buildingLandOwner.phone" label="फोन नं."
                        @validate="validateField('buildingLandOwner.phone')"
                        :error="errors['buildingLandOwner.phone']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput id="landowner-citizenship_no" v-model="form.buildingLandOwner.citizenship_no"
                        label="नागरिकता नम्बर" @validate="validateField('buildingLandOwner.citizenship_no')"
                        :error="errors['buildingLandOwner.citizenship_no']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VNepaliDatePicker id="landowner-citizenship_issue_date"
                        v-model="form.buildingLandOwner.citizenship_issue_date" label="नागरिकता लिएको मिति" @validate="
                            validateField('buildingLandOwner.citizenship_issue_date')
                            " :error="errors['buildingLandOwner.citizenship_issue_date']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VMultiSelect id="landowner-citizenship_issue_district_id"
                        v-model="form.buildingLandOwner.citizenship_issue_district_id"
                        :options="eBuildingSetting?.allDistricts ?? []" name-prop="district"
                        label="नागरिकता लिएको जिल्ला" @validate="
                            validateField(
                                'buildingLandOwner.citizenship_issue_district_id'
                            )
                            " :error="errors['buildingLandOwner.citizenship_issue_district_id']
                            " />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput id="landowner-father-name" v-model="form.buildingLandOwner.father_name" label="बुवाको नाम"
                        @validate="validateField('buildingLandOwner.father_name')"
                        :error="errors['buildingLandOwner.father_name']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput id="landowner-grandfather-name" v-model="form.buildingLandOwner.grandfather_name"
                        label="हजुरबुबाको नाम" @validate="validateField('buildingLandOwner.grandfather_name')"
                        :error="errors['buildingLandOwner.grandfather_name']" />
                </div>

                <div class="col-md-4 mb-3">
                    <VFileUpload id="landowner-photo" v-model="form.buildingLandOwner.photo" label="जग्गाधनीको फोटो"
                        :show-preview-image="false" />
                </div>
                <div class="col-md-4 mb-3">
                    <VFileUpload id="landowner-signature" v-model="form.buildingLandOwner.signature"
                        label="जग्गाधनीको सहि" :show-preview-image="false" />
                </div>
                <div class="col-md-12">
                    <fieldset>
                        <legend>ठेगाना</legend>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <VMultiSelect id="landOwner-province_id" v-model="form.buildingLandOwner.province_id"
                                    :options="buildingLandOwnerProvinces ?? []" name-prop="province" label="प्रदेश"
                                    @validate="
                                        validateField('buildingLandOwner.province_id')
                                        " :error="errors['buildingLandOwner.province_id']" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect id="landOwner-district_id" v-model="form.buildingLandOwner.district_id"
                                    :options="buildingLandOwnerDistricts ?? []" name-prop="district" label="जिल्ला"
                                    @validate="
                                        validateField('buildingLandOwner.district_id')
                                        " :error="errors['buildingLandOwner.district_id']" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect id="landOwner-local_body_id"
                                    v-model="form.buildingLandOwner.local_body_id"
                                    :options="buildingLandOwnerLocalBodies ?? []" name-prop="local_body" label="पालिका"
                                    @validate="
                                        validateField('buildingLandOwner.local_body_id')
                                        " :error="errors['buildingLandOwner.local_body_id']" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect id="landOwner-ward_no" v-model="form.buildingLandOwner.ward_no"
                                    :options="buildingLandOwnerWards ?? []" label="वार्ड" @validate="
                                        validateField('buildingLandOwner.ward_no')
                                        " :error="errors['buildingLandOwner.ward_no']" />
                            </div>
                            <div class="col-md-3 mb-3">
                                <VInput input-type="text" id="tole" v-model="form.buildingLandOwner.tole"
                                    placeholder="टोल" label="टोल" @validate="validateField('buildingLandOwner.tole')"
                                    :error="errors['buildingLandOwner.tole']" />
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="card p-4 mb-4">
            <legend>
                <h5>४. घर धनीको विवरण (जग्गाधनी भन्दा फरक भएमा)</h5>
            </legend>
            <div class="d-flex align-items-center gap-2 mb-3">
                <label for="detail_check">के घर धनीको विवरण र जग्गाधनीको विवरण एउटै हो ?</label>
                <button type="button" @click.prevent="
                    building_house_owner_as_building_land_owner = !building_house_owner_as_building_land_owner
                    " class="btn btn-link btn-sm border-none" id="detail_check">
                    <i :class="'fa fa-2x fa-toggle-' +
                        (building_house_owner_as_building_land_owner ? 'on' : 'off')
                        "></i>
                </button>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <VInput id="houseOwner-name" v-model="form.buildingHouseOwner.name" label="घर धनीको नाम"
                        :disabled="building_house_owner_as_building_land_owner"
                        @validate="validateField('buildingHouseOwner.name')"
                        :error="errors['buildingHouseOwner.name']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput id="houseOwner-phone" v-model="form.buildingHouseOwner.phone" label="फोन नं."
                        :disabled="building_house_owner_as_building_land_owner"
                        @validate="validateField('buildingHouseOwner.phone')"
                        :error="errors['buildingHouseOwner.phone']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput id="houseOwner-citizenship_no" v-model="form.buildingHouseOwner.citizenship_no"
                        label="नागरिकता नम्बर" :disabled="building_house_owner_as_building_land_owner"
                        @validate="validateField('buildingHouseOwner.citizenship_no')"
                        :error="errors['buildingHouseOwner.citizenship_no']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VNepaliDatePicker id="houseOwner-citizenship_issue_date"
                        v-model="form.buildingHouseOwner.citizenship_issue_date" label="नागरिकता लिएको मिति"
                        :disabled="building_house_owner_as_building_land_owner" @validate="
                            validateField('buildingHouseOwner.citizenship_issue_date')
                            " :error="errors['buildingHouseOwner.citizenship_issue_date']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VMultiSelect id="houseOwner-citizenship_issue_district_id"
                        v-model="form.buildingHouseOwner.citizenship_issue_district_id"
                        :options="eBuildingSetting?.allDistricts ?? []" name-prop="district"
                        label="नागरिकता लिएको जिल्ला" :disabled="building_house_owner_as_building_land_owner" @validate="
                            validateField(
                                'buildingHouseOwner.citizenship_issue_district_id'
                            )
                            " :error="errors['buildingHouseOwner.citizenship_issue_district_id']
                            " />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput id="houseOwner-father_name" v-model="form.buildingHouseOwner.father_name" label="बुवाको नाम"
                        :disabled="building_house_owner_as_building_land_owner"
                        @validate="validateField('buildingHouseOwner.father_name')"
                        :error="errors['buildingHouseOwner.father_name']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput id="houseOwner-grandfather_name" v-model="form.buildingHouseOwner.grandfather_name"
                        label="हजुरबुबाको नाम" :disabled="building_house_owner_as_building_land_owner"
                        @validate="validateField('buildingHouseOwner.grandfather_name')"
                        :error="errors['buildingHouseOwner.grandfather_name']" />
                </div>

                <div class="col-md-4 mb-3">
                    <VFileUpload id="houseowner-photo" v-model="form.buildingHouseOwner.photo" label="घर धनीको फोटो"
                        :show-preview-image="false" />
                </div>
                <div class="col-md-4 mb-3">
                    <VFileUpload id="houseowner-signature" v-model="form.buildingHouseOwner.signature"
                        label="घर धनीको सहि" :show-preview-image="false" />
                </div>
                <div class="col-md-12">
                    <fieldset>
                        <legend>ठेगाना</legend>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <VMultiSelect id="buildingHouseOwner-province_id"
                                    v-model="form.buildingHouseOwner.province_id"
                                    :options="buildingHouseOwnerProvinces ?? []" name-prop="province" label="प्रदेश"
                                    :disabled="building_house_owner_as_building_land_owner" @validate="
                                        validateField('buildingHouseOwner.province_id')
                                        " :error="errors['buildingHouseOwner.province_id']" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect id="buildingHouseOwner-district_id"
                                    v-model="form.buildingHouseOwner.district_id"
                                    :options="buildingHouseOwnerDistricts ?? []" name-prop="district" label="जिल्ला"
                                    :disabled="building_house_owner_as_building_land_owner" @validate="
                                        validateField('buildingHouseOwner.district_id')
                                        " :error="errors['buildingHouseOwner.district_id']" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect id="buildingHouseOwner-local_body_id"
                                    v-model="form.buildingHouseOwner.local_body_id"
                                    :options="buildingHouseOwnerLocalBodies ?? []" name-prop="local_body" label="पालिका"
                                    :disabled="building_house_owner_as_building_land_owner" @validate="
                                        validateField(
                                            'buildingHouseOwner.local_body_id'
                                        )
                                        " :error="errors['buildingHouseOwner.local_body_id']" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <VMultiSelect id="buildingHouseOwner-ward_no" v-model="form.buildingHouseOwner.ward_no"
                                    :options="buildingHouseOwnerWards ?? []" label="वार्ड"
                                    :disabled="building_house_owner_as_building_land_owner" @validate="
                                        validateField('buildingHouseOwner.ward_no')
                                        " :error="errors['buildingHouseOwner.ward_no']" />
                            </div>

                            <div class="col-md-3 mb-3">
                                <VInput input-type="text" id="tole" v-model="form.buildingHouseOwner.tole"
                                    placeholder="टोल" label="टोल" @validate="validateField('buildingHouseOwner.tole')"
                                    :error="errors['buildingHouseOwner.tole']" />
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="card p-4 mb-4">
            <legend>
                <h5>५. निवेदकको विवरण</h5>
            </legend>
            <div class="mb-3">
                <label class="form-label fw-bolder">५.१ निवेदकको प्रकार </label>
                <div class="col">
                    <div v-for="type in eBuildingSetting?.applicantTypes ?? []" class="form-check form-check-inline">
                        <input type="radio" :id="type.value" v-model="form.applicant_type" :value="type.value" @change="
                            validateField('applicant_type')
                            " class="form-check-input" />
                        <label class="form-check-label" :for="type.value">{{
                            type.label
                            }}</label>
                    </div>
                </div>
                <p v-if="errors['applicant_type']" class="text-danger">
                    {{ errors["applicant_type"] }}
                </p>
            </div>

            <div class="row">
                <label class="form-label fw-bolder">जग्गाधनी वा घरधनी भन्दा फरक भएमा</label>
                <div class="col-md-4 mb-3">
                    <VInput id="applicant-name" v-model="form.applicant_name" label="नाम" :disabled="isApplicantSame"
                        @validate="validateField('applicant_name')" :error="errors['applicant_name']" />
                </div>

                <div class="col-md-4 mb-3">
                    <VInput id="applicant-phone-no" v-model="form.applicant_phone_no" label="फोन नं."
                        :disabled="isApplicantSame" @validate="validateField('applicant_phone_no')"
                        :error="errors['applicant_phone_no']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput id="applicant-age" v-model="form.applicant_age" label="उमेर" :disabled="isApplicantSame"
                        @validate="
                            validateField('applicant_age')
                            " :error="errors['applicant_age']" />
                </div>
                <div class="col-md-4 mb-3">
                    <VFileUpload id="applicant-signature" v-model="form.applicant_signature" label="घर धनीको सहि"
                        :show-preview-image="false" />
                </div>

            </div>
            <div class="col-md-12">
                <fieldset>
                    <legend>ठेगाना</legend>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <VMultiSelect id="applicantDetail-province_id" v-model="form.province_id"
                                :options="applicantDetailProvinces ?? []" name-prop="province" label="प्रदेश"
                                :disabled="isApplicantSame" @validate="
                                    validateField('province_id')
                                    " :error="errors['province_id']" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <VMultiSelect id="applicantDetail-district_id" v-model="form.district_id"
                                :options="applicantDetailDistricts ?? []" name-prop="district" label="जिल्ला"
                                :disabled="isApplicantSame" @validate="
                                    validateField('district_id')
                                    " :error="errors['district_id']" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <VMultiSelect id="applicantDetail-local_body_id" v-model="form.local_body_id"
                                :options="applicantDetailLocalBodies ?? []" name-prop="local_body" label="पालिका"
                                :disabled="isApplicantSame" @validate="
                                    validateField(
                                        'local_body_id'
                                    )
                                    " :error="errors['local_body_id']" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <VMultiSelect id="applicantDetail-ward_no" v-model="form.applicant_ward_no"
                                :options="applicantDetailWards ?? []" label="वार्ड" :disabled="isApplicantSame"
                                @validate="
                                    validateField('applicant_ward_no')
                                    " :error="errors['applicant_ward_no']" />
                        </div>

                        <div class="col-md-3 mb-3">
                            <VInput input-type="text" id="tole" v-model="form.applicant_tole" placeholder="टोल"
                                label="टोल" @validate="
                                    validateField('applicant_tole')
                                    " :error="errors['applicant_tole']" />
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <div class="col-3">
                <VNepaliDatePicker id="application_date" v-model="form.application_date" label="निबेदनको मिति"
                    @validate="
                        validateField('application_date')
                        " :error="errors['application_date']" />
            </div>

        </div>
        <div class="mt-4 d-flex justify-content-end">
            <VButton :loading="isSubmitting" btn-label="पेश गर्नुहोस्" />
        </div>
    </form>
</template>
<script setup>
import { onMounted, reactive, ref, watch } from "vue";
import { useBuildingSettingStore } from "../../stores/setting";
import { useBuildingApplicationStore } from "../../stores/e-map/buildingApplication";
import { storeToRefs } from "pinia";
import showErrors from "../../utils/showErrors";
import { useYup } from "../../utils/yup";
import { object, string } from "yup";
import Swal from "sweetalert2";
import { useFileUpload } from "../../utils/fileUpload";
import { useAddressStore } from "../../stores/address";

const settingStore = useBuildingSettingStore();
const houseOwnerAddressStore = useAddressStore();
const landOwnerAddressStore = useAddressStore();
const applicantDetailAddressStore = useAddressStore();
const buildingApplicationStore = useBuildingApplicationStore();
const { onFileSelected, fileDetail } = useFileUpload();

const { eBuildingSetting } = storeToRefs(settingStore);
const {
    provinces: buildingHouseOwnerProvinces,
    districts: buildingHouseOwnerDistricts,
    localBodies: buildingHouseOwnerLocalBodies,
    wards: buildingHouseOwnerWards,
} = storeToRefs(houseOwnerAddressStore);
const {
    provinces: buildingLandOwnerProvinces,
    districts: buildingLandOwnerDistricts,
    localBodies: buildingLandOwnerLocalBodies,
    wards: buildingLandOwnerWards,
} = storeToRefs(landOwnerAddressStore);

const {
    provinces: applicantDetailProvinces,
    districts: applicantDetailDistricts,
    localBodies: applicantDetailLocalBodies,
    wards: applicantDetailWards,
} = storeToRefs(applicantDetailAddressStore);

onMounted(() => {
    settingStore.getBuildingSetting();
    houseOwnerAddressStore.getProvinces();
    landOwnerAddressStore.getProvinces();
    applicantDetailAddressStore.getProvinces();
});

const building_house_owner_as_building_land_owner = ref(false);

const initialState = {
    organization_id: "",
    plinth_area: "",
    house_built_year: "",
    room: "",
    storey: "",
    former_local_body: "",
    former_ward_no: "",
    land_ward_no: "",
    plot_no: "",
    land_tole: "",

    buildingLandOwner: {
        name: "",
        phone: "",
        father_name: "",
        grandfather_name: "",
        citizenship_no: "",
        citizenship_issue_date: "",
        citizenship_issue_district_id: "",
        province_id: "",
        district_id: "",
        local_body_id: "",
        ward_no: "",
        tole: "",
        photo: "",
        signature: "",
    },
    buildingHouseOwner: {
        name: "",
        phone: "",
        father_name: "",
        grandfather_name: "",
        citizenship_no: "",
        citizenship_issue_date: "",
        citizenship_issue_district_id: "",
        province_id: "",
        district_id: "",
        local_body_id: "",
        ward_no: "",
        tole: "",
        photo: "",
        signature: "",
    },

    applicant_type: "",
    applicant_name: "",
    applicant_phone_no: "",
    applicant_age: "",
    application_date: "",
    applicant_signature: "",
    province_id: "",
    district_id: "",
    local_body_id: "",
    applicant_ward_no: "",
    applicant_tole: "",

};

const form = reactive({ ...initialState });

const isSubmitting = ref(false);
const isApplicantSame = ref(false);

watch(
    () => building_house_owner_as_building_land_owner.value,
    () => {
        setBuildingLandOwnerToBuildingHouseOwner();
    }
);

watch(
    () => form.buildingLandOwner,
    () => {
        setBuildingLandOwnerToBuildingHouseOwner();
    },
    { deep: true }
);

const setBuildingLandOwnerToBuildingHouseOwner = () => {
    if (building_house_owner_as_building_land_owner.value) {
        form.buildingHouseOwner.name = form.buildingLandOwner.name;
        form.buildingHouseOwner.phone = form.buildingLandOwner.phone;
        form.buildingHouseOwner.father_name = form.buildingLandOwner.father_name;
        form.buildingHouseOwner.grandfather_name = form.buildingLandOwner.grandfather_name;
        form.buildingHouseOwner.citizenship_no = form.buildingLandOwner.citizenship_no;
        form.buildingHouseOwner.citizenship_issue_date =
            form.buildingLandOwner.citizenship_issue_date;
        form.buildingHouseOwner.citizenship_issue_district_id =
            form.buildingLandOwner.citizenship_issue_district_id;
        form.buildingHouseOwner.province_id = form.buildingLandOwner.province_id;
        form.buildingHouseOwner.district_id = form.buildingLandOwner.district_id;
        form.buildingHouseOwner.local_body_id = form.buildingLandOwner.local_body_id;
        form.buildingHouseOwner.ward_no = form.buildingLandOwner.ward_no;
        form.buildingHouseOwner.tole = form.buildingLandOwner.tole;
        form.buildingHouseOwner.photo = form.buildingLandOwner.photo;
        form.buildingHouseOwner.signature = form.buildingLandOwner.signature;
    } else {
        form.buildingHouseOwner.name = "";
        form.buildingHouseOwner.phone = "";
        form.buildingHouseOwner.father_name = "";
        form.buildingHouseOwner.grandfather_name = "";
        form.buildingHouseOwner.citizenship_no = "";
        form.buildingHouseOwner.citizenship_issue_date = "";
        form.buildingHouseOwner.citizenship_issue_district_id = "";
        form.buildingHouseOwner.province_id = "";
        form.buildingHouseOwner.district_id = "";
        form.buildingHouseOwner.local_body_id = "";
        form.buildingHouseOwner.ward_no = "";
        form.buildingHouseOwner.tole = "";
        form.buildingHouseOwner.photo = "";
        form.buildingHouseOwner.signature = "";
    }
};

watch(
    () => form.applicant_type,
    (type) => {
        if (type === "house owner") {
            isApplicantSame.value = true;
            form.applicant_name = form.buildingHouseOwner.name;
            form.applicant_phone_no = form.buildingHouseOwner.phone;
            form.applicant_signature = form.buildingHouseOwner.signature;

            form.province_id = form.buildingHouseOwner.province_id;
            form.district_id = form.buildingHouseOwner.district_id;
            form.local_body_id = form.buildingHouseOwner.local_body_id;
            form.applicant_ward_no = form.buildingHouseOwner.ward_no;
            form.applicant_tole = form.buildingHouseOwner.tole;
        } else if (type === "land owner") {
            isApplicantSame.value = true;
            form.applicant_name = form.buildingLandOwner.name;
            form.applicant_phone_no = form.buildingLandOwner.phone;
            form.applicant_signature = form.buildingLandOwner.signature;
            form.province_id = form.buildingLandOwner.province_id;
            form.district_id = form.buildingLandOwner.district_id;
            form.local_body_id = form.buildingLandOwner.local_body_id;
            form.applicant_ward_no = form.buildingLandOwner.ward_no;
            form.applicant_tole = form.buildingLandOwner.tole;
        } else {
            isApplicantSame.value = false;
            form.applicant_name = "";
            form.applicant_phone_no = "";
            form.applicant_signature = "";
            form.application_date = "";
            form.province_id = "";
            form.district_id = "";
            form.local_body_id = "";
            form.applicant_ward_no = "";
            form.applicant_tole = "";
        }
    }
);

const validations = object({
    organization_id: string().required("अनिवार्य छ"),
    plinth_area: string().required("अनिवार्य छ"),
    house_built_year: string().required("भवन बनेको साल अनिवार्य छ |"),
    room: string().required("कोठा संख्या अनिवार्य छ|"),
    storey: string().required("तल्ला संख्या अनिवार्य छ|"),
    future_storey: string().required("अनिवार्य छ"),
    former_local_body: string().nullable(),
    former_ward_no: string().nullable(),
    land_ward_no: string().required("अनिवार्य छ"),
    plot_no: string().required("अनिवार्य छ"),
    land_tole: string().required("अनिवार्य छ"),
    buildingLandOwner: object().shape({
        name: string().required("जग्गा धनीको नाम अनिवार्य छ"),
        phone: string(),
        father_name: string().required("बुवाको नाम अनिवार्य छ"),
        grandfather_name: string().required("हजुरबुबाको नाम अनिवार्य छ"),
        citizenship_no: string().required("नागरिकता नम्बर अनिवार्य छ"),
        citizenship_issue_date: string().required("नागरिकता लिएको मिति अनिवार्य छ"),
        citizenship_issue_district_id: string().required("नागरिकता लिएको जिल्ला अनिवार्य छ"),
        province_id: string().required("प्रदेश अनिवार्य छ"),
        district_id: string().required("जिल्ला अनिवार्य छ"),
        local_body_id: string().required("पालिका अनिवार्य छ"),
        ward_no: string().required("वडा नं. अनिवार्य छ"),
        tole: string().required("टोल अनिवार्य छ"),
    }),
    buildingHouseOwner: object().shape({
        name: string().required("घर धनीको नाम अनिवार्य छ"),
        phone: string(),
        father_name: string().required("बुवाको नाम अनिवार्य छ"),
        grandfather_name: string().required("हजुरबुबाको नाम अनिवार्य छ"),
        citizenship_no: string().required("नागरिकता नम्बर अनिवार्य छ"),
        citizenship_issue_date: string().required("नागरिकता लिएको मिति अनिवार्य छ"),
        citizenship_issue_district_id: string().required("नागरिकता लिएको जिल्ला अनिवार्य छ"),
        province_id: string().required("प्रदेश अनिवार्य छ"),
        district_id: string().required("जिल्ला अनिवार्य छ"),
        local_body_id: string().required("पालिका अनिवार्य छ"),
        ward_no: string().required("वडा नं. अनिवार्य छ"),
        tole: string().required("टोल अनिवार्य छ"),
    }),
    applicant_type: string().required("निवेदकको प्रकार अनिवार्य छ"),
    applicant_name: string().required("निवेदकको नाम अनिवार्य छ"),
    applicant_phone_no: string().required("फोन न. अनिवार्य छ"),
    applicant_age: string().nullable(),
    application_date: string(),
    province_id: string().required("प्रदेश अनिवार्य छ"),
    district_id: string().required("जिल्ला अनिवार्य छ"),
    local_body_id: string().required("पालिका अनिवार्य छ"),
    applicant_ward_no: string().required("वडा नं. अनिवार्य छ"),
    applicant_tole: string().required("टोल अनिवार्य छ"),


});

const { errors, validateField, validateForm } = useYup(form, validations);

const registerBuildingApplication = async () => {
    let validated = await validateForm(validations, form);
    if (validated) {
        isSubmitting.value = true;
        const formData = new FormData();
        Object.keys(form).forEach((key) => {
            if (typeof form[key] === "object" && form[key] !== null) {
                Object.keys(form[key]).forEach((innerKey) => {
                    formData.append(`${key}[${innerKey}]`, form[key][innerKey]);
                });
            } else {
                formData.append(key, form[key]);
            }
        });
        try {
            let res = await buildingApplicationStore.storeBuildingApplication(formData);
            resetForm();
            toastMessage(res.data.data);
        } catch (e) {
            showErrors(e);
        } finally {
            isSubmitting.value = false;
        }
    }
};

const toastMessage = (data) => {
    Swal.fire({
        title: "धन्यबाद!!!",
        text: `तपाईंको फारम सफलतापूर्वक पेश भएको छ, तपाईंको सबमिशन नं. ${data?.submission_no } हो। कृपया भविष्यमा प्रयोगको लागि सबमिशन नं. सुरक्षित राख्नुहोस् ।`,
        icon: "success",
    });
};

const resetForm = () => {
    errors.value = {};
    resetNestedObject(form);
};

const resetNestedObject = (obj) => {
    for (const key in obj) {
        if (obj.hasOwnProperty(key)) {
            if (typeof obj[key] === "object" && obj[key] !== null) {
                if (obj[key] instanceof File) {
                    obj[key] = "";
                } else {
                    resetNestedObject(obj[key]);
                }
            } else {
                obj[key] = "";
            }
        }
    }
};

watch(
    () => form.buildingHouseOwner.province_id,
    (province_id) => {
        if (province_id) {
            houseOwnerAddressStore.getProvince(province_id);
        }
    }
);
watch(
    () => form.buildingHouseOwner.district_id,
    (district_id) => {
        if (district_id) {
            houseOwnerAddressStore.getDistrict(district_id);
        }
    }
);
watch(
    () => form.buildingHouseOwner.local_body_id,
    (local_body_id) => {
        if (local_body_id) {
            houseOwnerAddressStore.getLocalBody(local_body_id);
        }
    }
);
watch(
    () => form.buildingLandOwner.province_id,
    (province_id) => {
        if (province_id) {
            landOwnerAddressStore.getProvince(province_id);
        }
    }
);
watch(
    () => form.buildingLandOwner.district_id,
    (district_id) => {
        if (district_id) {
            landOwnerAddressStore.getDistrict(district_id);
        }
    }
);
watch(
    () => form.buildingLandOwner.local_body_id,
    (local_body_id) => {
        if (local_body_id) {
            landOwnerAddressStore.getLocalBody(local_body_id);
        }
    }
);

watch(
    () => form.province_id,
    (province_id) => {
        if (province_id) {
            applicantDetailAddressStore.getProvince(province_id);
        }
    }
);
watch(
    () => form.district_id,
    (district_id) => {
        if (district_id) {
            applicantDetailAddressStore.getDistrict(district_id);
        }
    }
);
watch(
    () => form.local_body_id,
    (local_body_id) => {
        if (local_body_id) {
            applicantDetailAddressStore.getLocalBody(local_body_id);
        }
    }
);
</script>
