<template>
    <form @submit.prevent="saveFormData(buildingDocumentation.id)" class="mb-2">
        <fieldset>
            <legend>२. जग्गाको विवरण</legend>
            <button type="button" class="btn btn-xs float-end btn-outline-primary waves-effect waves-light"
                    @click.prevent="editFormOpened=!editFormOpened"><i
                class="fa fa-pen"></i>
            </button>
            <div class="row">

                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="text"
                        id="land_area"
                        v-model="form.land_area"
                        @validate="validateField('land_area')"
                        label=" जग्गाधनि दर्ता प्रमाण पूर्जाको क्षेत्रफल"
                        placeholder="जग्गाधनि दर्ता प्रमाण पूर्जाको क्षेत्रफल"

                        :disabled="!editFormOpened"
                        :error="errors.land_area"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="text"
                        v-model="form.field_land_area"
                        label="फिल्ड नाप अनुसार (भोगमा रहेको) जग्गाको वास्तविक क्षेत्रफल"
                        placeholder="फिल्ड नाप अनुसार (भोगमा रहेको) जग्गाको वास्तविक क्षेत्रफल"
                        @validate="validateField('field_land_area')"
                        :error="errors.field_land_area"
                        :disabled="!editFormOpened"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="text"
                        id="plot_no"
                        v-model="form.plot_no"
                        @validate="validateField('plot_no')"
                        label=" निर्माण भएको जग्गाको कित्ता नं."
                        placeholder="निर्माण भएको जग्गाको कित्ता नं."
                        :disabled="!editFormOpened"
                        :error="errors.plot_no"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="land_detail"
                        v-model="form.land_detail"
                        @validate="validateField('land_detail')"
                        label=" जग्गा विवरण"
                        :disabled="!editFormOpened"
                        :error="errors.land_detail"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="land_ward_no"
                        v-model="form.land_ward_no"
                        @validate="validateField('land_ward_no')"
                        label=" वार्ड नं."
                        :disabled="!editFormOpened"
                        :error="errors.land_ward_no"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        id="land_tole"
                        v-model="form.land_tole"
                        @validate="validateField('land_tole')"
                        label=" टोल"
                        :disabled="!editFormOpened"
                        :error="errors.land_tole"
                    />
                </div>

                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="text"
                        id="former_local_body"
                        v-model="form.former_local_body"
                        label=" साविक पालिका"
                        @validate="validateField('former_local_body')"
                        :disabled="!editFormOpened"
                        :error="errors.former_local_body"
                    />
                </div>
                <div class="col-md-4 mb-3">
                    <VInput
                        input-type="text"
                        id="former_ward_no"
                        v-model="form.former_ward_no"
                        label=" साविक वाड नं."
                        @validate="validateField('former_ward_no')"
                        :disabled="!editFormOpened"
                        :error="errors.former_ward_no"
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
import {useBuildingSettingStore} from "../../../../stores/buildingSetting";
import {object, string} from "yup";
import {useYup} from "../../../../utils/yup";
import showErrors from "../../../../utils/showErrors";
import {toast} from "../../../../utils/toast";
import {useBuildingApplicationStore} from "../../../../stores/e-map/organization/buildingDocument";


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

const initialState = {
    land_area: '',
    field_land_area: '',
    plot_no: '',
    land_detail: '',
    land_ward_no: '',
    land_tole: '',
    former_local_body: '',
    former_ward_no: '',
}

const form = reactive({...initialState});

onMounted(() => {
    Object.keys(form).forEach(key => {
        form[key] = props.buildingDocumentation[key] ?? '';
    })
})

const isSubmitting = ref(false);

const validations = object({
    land_area: string().required('अनिवार्य छ'),
    field_land_area: string().required('अनिवार्य छ'),
    plot_no: string().nullable(),
    land_detail: string().nullable(),
    land_ward_no: string().required('अनिवार्य छ'),
    land_tole: string().nullable(),
    former_local_body: string().required('अनिवार्य छ'),
    former_ward_no: string().required('अनिवार्य छ'),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData = async (building_documentation_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await buildingApplicationStore.updateBuildingLandDetail(building_documentation_id, form);
            toast(res.status, res.data.message);
            editFormOpened.value = false;
        } catch (e) {
            showErrors(e);
        } finally {
            isSubmitting.value = false;
        }
    }
}
</script>
