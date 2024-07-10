<template>
  <form @submit.prevent="saveFormData(buildingDocumentation.id)" class="mb-2">
    <fieldset>
      <legend>५. निवेदकको विवरण</legend>
      <button
        type="button"
        class="btn btn-xs float-end btn-outline-primary waves-effect waves-light"
        @click.prevent="editFormOpened = !editFormOpened"
      >
        <i class="fa fa-pen"></i>
      </button>

      <div class="mb-3">
        <label class="form-label fw-bolder">५.१ निवेदकको प्रकार </label>
        <div class="col">
          <div
            v-for="type in eBuildingSetting?.applicantTypes ?? []"
            class="form-check form-check-inline"
          >
            <input
              type="radio"
              :id="type.value"
              v-model="form.applicant_type"
              :value="type.value"
              @change="validateField('applicant_type')"
              :disabled="!editFormOpened"
              class="form-check-input"
            />
            <label class="form-check-label" :for="type.value">{{ type.label }}</label>
          </div>
        </div>
        <p v-if="errors.applicant_type" class="text-danger">
          {{ errors.applicant_type }}
        </p>
      </div>

      <div class="row">
        <label class="form-label fw-bolder">जग्गाधनी वा घरधनी भन्दा फरक भएमा</label>
        <div class="col-md-4 mb-3">
          <VInput
            id="applicant-name"
            v-model="form.applicant_name"
            label="नाम"
            :disabled="!editFormOpened"
            @validate="validateField('applicant_name')"
            :error="errors.applicant_name"
          />
        </div>
        <div class="col-md-4 mb-3">
          <VInput
            id="applicant-phone"
            v-model="form.applicant_phone_no"
            label="फोन नं."
            :disabled="!editFormOpened"
            @validate="validateField('applicant_phone_no')"
            :error="errors.applicant_phone_no"
          />
        </div>
        <div class="col-md-4 mb-3">
          <VInput
            id="applicant-age"
            v-model="form.applicant_age"
            label="उमेर"
            :disabled="!editFormOpened"
            @validate="validateField('applicant_age')"
            :error="errors.applicant_age"
          />
        </div>

        <div class="col-md-12">
          <fieldset>
            <legend>ठेगाना</legend>
            <div class="row">
              <div class="col-md-4 mb-3">
                <VMultiSelect
                  id="applicantDetail-province_id"
                  v-model="form.province_id"
                  :options="applicantDetailProvinces ?? []"
                  name-prop="province"
                  label="प्रदेश"
                  @validate="validateField('province_id')"
                  :error="errors['province_id']"
                  :disabled="!editFormOpened"
                />
              </div>
              <div class="col-md-4 mb-3">
                <VMultiSelect
                  id="applicantDetail-district_id"
                  v-model="form.district_id"
                  :options="applicantDetailDistricts ?? []"
                  name-prop="district"
                  label="जिल्ला"
                  @validate="validateField('district_id')"
                  :error="errors['district_id']"
                  :disabled="!editFormOpened"
                />
              </div>
              <div class="col-md-4 mb-3">
                <VMultiSelect
                  id="applicantDetail-local_body_id"
                  v-model="form.local_body_id"
                  :options="applicantDetailLocalBodies ?? []"
                  name-prop="local_body"
                  label="पालिका"
                  @validate="validateField('local_body_id')"
                  :error="errors['local_body_id']"
                  :disabled="!editFormOpened"
                />
              </div>
              <div class="col-md-4 mb-3">
                <VMultiSelect
                  id="applicantDetail-ward_no"
                  v-model="form.applicant_ward_no"
                  :options="applicantDetailWards ?? []"
                  label="वार्ड"
                  @validate="validateField('applicant_ward_no')"
                  :error="errors['applicant_ward_no']"
                  :disabled="!editFormOpened"
                />
              </div>

              <div class="col-md-3 mb-3">
                <VInput
                  input-type="text"
                  id="tole"
                  v-model="form.applicant_tole"
                  placeholder="टोल"
                  label="टोल"
                  @validate="validateField('applicant_tole')"
                  :error="errors['applicant_tole']"
                  :disabled="!editFormOpened"
                />
              </div>
            </div>
          </fieldset>
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
            v-model="form.applicant_signature"
            label="निवेदकको सहि"
            :default-photo="applicant_signature_url"
            :show-preview-image="true"
            :disabled="!editFormOpened"
          />
        </div>
      </div>

      <div v-if="editFormOpened" class="d-flex mt-3 justify-content-end">
        <VButton btn-label="पेश गर्नुहोस्" :loading="isSubmitting" />
      </div>
    </fieldset>
  </form>
</template>

<script setup>
import { onMounted, reactive, ref, watch } from "vue";
import { storeToRefs } from "pinia";
import { useBuildingSettingStore } from "../../../../stores/buildingSetting";
import { object, string } from "yup";
import { useYup } from "../../../../utils/yup";
import showErrors from "../../../../utils/showErrors";
import { toast } from "../../../../utils/toast";
import { useBuildingApplicationStore } from "../../../../stores/e-map/organization/buildingDocument";
import { useAddressStore } from "../../../../stores/address";

const props = defineProps({
  buildingDocumentation: {
    required: true,
    type: Object,
  },
});

const buildingSettingStore = useBuildingSettingStore();
const buildingApplicationStore = useBuildingApplicationStore();
const applicantDetailAddressStore = useAddressStore();

const editFormOpened = ref(false);

const {
  provinces: applicantDetailProvinces,
  districts: applicantDetailDistricts,
  localBodies: applicantDetailLocalBodies,
  wards: applicantDetailWards,
} = storeToRefs(applicantDetailAddressStore);

const { eBuildingSetting } = storeToRefs(buildingSettingStore);

const initialState = {
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

onMounted(() => {
  Object.keys(form).forEach((key) => {
    form[key] = props.buildingDocumentation[key] ?? "";
  });
  applicantDetailAddressStore.getProvinces();
});

const isSubmitting = ref(false);

const validations = object({
  applicant_type: string().required("निवेदकको प्रकार अनिवार्य छ"),
  applicant_name: string().required("निवेदकको नाम अनिवार्य छ"),
  applicant_phone_no: string().required("फोन न. अनिवार्य छ"),
  applicant_age: string().required("उमेर अनिवार्य छ"),
  application_date: string(),
  province_id: string().required("प्रदेश अनिवार्य छ"),
  district_id: string().required("जिल्ला अनिवार्य छ"),
  local_body_id: string().required("पालिका अनिवार्य छ"),
  applicant_ward_no: string().required("वडा नं. अनिवार्य छ"),
  applicant_tole: string().required("टोल अनिवार्य छ"),
});

const { errors, validateField, validateForm } = useYup(form, validations);

const saveFormData = async (building_documentation_id) => {
  let validated = await validateForm(validations, form);
  if (validated) {
    isSubmitting.value = true;

    try {
      let res = await buildingApplicationStore.updateBuildingApplicantDetail(
        building_documentation_id,
        form
      );
      toast(res.status, res.data.message);
      editFormOpened.value = false;
    } catch (e) {
      showErrors(e);
    } finally {
      isSubmitting.value = false;
    }
  }
};

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
