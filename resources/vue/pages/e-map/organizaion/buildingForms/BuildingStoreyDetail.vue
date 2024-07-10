<template>
    <fieldset class="my-3">
        <legend>१.१२  साविक भवन/निर्माण तला र क्षेत्रफल सम्बन्धित विवरण:</legend>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr class="text-center">
                    <th>तल्ला</th>
                    <th>  निर्माणको क्षेत्रफल फिट/मिटर</th>
                    <th>  निर्माण भैसकेको जम्मा क्षेत्रफल वर्ग/मिटर फिट/मिटर</th>
                    <th>कैफियत</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(buildingStorey,index) in buildingStoreyDetails" :key="buildingStorey.id">
                    <td>
                        {{ buildingStorey.storey || 'उपलब्ध छैन' }}
                    </td>

                    <td>
                        {{ buildingStorey.area_of_former_construction || '-' }}
                    </td>
                    <td>
                        {{ buildingStorey.land_area || 'उपलब्ध छैन' }}
                    </td>
                    <td>
                        {{ buildingStorey.remarks || 'उपलब्ध छैन' }}
                    </td>

                    <td>
                        <div class="d-flex gap-1">
                            <button type="button" class="btn btn-outline-primary btn-xs"
                                    @click.prevent="openEditForm(index)"><i
                                class="fa fa-pen"></i>
                            </button>
                            <button v-if="buildingStorey.id" type="button" class="btn btn-outline-danger btn-xs"
                                    @click.prevent="deleteStoreyDetail(buildingDocumentation.id,buildingStorey.id)"><i
                                class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </fieldset>

    <VModal title="तल्लाको क्षेत्रफल र उचाईको विवरण"
            v-model:show-modal="editFormOpened"
            @close-click="closeEditForm">
        <template #body>
            <form @submit.prevent="saveFormData(buildingDocumentation.id)">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <VSelect
                            id="storey"
                            v-model="form.storey"
                            :options="eBuildingSetting?.storeys ?? []"
                            label="तल्ला"
                            name-prop="label"
                            @validate="validateField('storey')"
                            :error="errors.storey"
                        />
                    </div>

                    <div class="col-md-6 mb-2">
                        <VInput
                            id="area_of_former_construction"
                            v-model="form.area_of_former_construction"
                            label="साविक निर्माणको क्षेत्रफल"
                            @validate="validateField('area_of_former_construction')"
                            :error="errors.area_of_former_construction"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="land_area"
                            v-model="form.land_area"
                            label="जम्मा क्षेत्रफल"
                            @validate="validateField('land_area')"
                            :error="errors.land_area"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="remarks"
                            v-model="form.remarks"
                            label="उचाई"
                            @validate="validateField('remarks')"
                            :error="errors.remarks"
                        />
                    </div>

                    <div class="form-group mb-2">
                        <VButton
                            btn-label="पेश गर्नुहोस्"
                            :loading="isSubmitting"
                        />
                    </div>
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
import Swal from "sweetalert2";

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
const {buildingStoreyDetailsData} = storeToRefs(buildingApplicationStore);

const initialState = {
    id: '',
    storey: '',
    area_of_former_construction: '',
    land_area: '',
    remarks: '',
}

const buildingStoreyDetails = ref([]);

const form = reactive({...initialState});

onMounted(() => {
    getBuildingStoreyDetails();
})

const getBuildingStoreyDetails = async () => {
    buildingStoreyDetails.value = [];
    await buildingApplicationStore.getBuildingStoreyDetails(props.buildingDocumentation.id);
    buildingStoreyDetailsData.value.data.forEach((buildingStorey) => {
        buildingStoreyDetails.value.push(buildingStorey);
    })
    if (buildingStoreyDetailsData.value.storey_details_count < buildingStoreyDetailsData.value.current_storey) {
        for (let i = buildingStoreyDetailsData.value.storey_details_count; i < buildingStoreyDetailsData.value.current_storey; i++) {
            buildingStoreyDetails.value.push({
                storey: '',
                area_of_former_construction: '',
                land_area: '',
                remarks: '',
            });
        }
    }
}

const isSubmitting = ref(false);

const validations = object({
    storey: string().required('तल्ला अनिवार्य छ |'),
    area_of_former_construction: string().required('निर्माणको क्षेत्रफल अनिवार्य छ |'),
    land_area: string().required('निर्माण भैसकेको जम्मा क्षेत्रफल अनिवार्य छ |'),
    remarks: string().required('कैफियत अनिवार्य छ |'),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData = async (building_documentation_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await buildingApplicationStore.updateBuildingStoreyDetail(building_documentation_id, form);
            toast(res.status, res.data.message);
            closeEditForm();
            await getBuildingStoreyDetails();
        } catch (e) {
            showErrors(e);
        } finally {
            isSubmitting.value = false;
        }
    }
}

const deleteBuildingStoreyDetail = (building_documentation_id, id) => {
    Swal.fire({
        title: 'Are You Sure to Delete ? ',
        showCancelButton: true,
        confirmButtonColor: 'red',
        confirmButtonText: "Yes",
    }).then(async (result) => {
        if (result.value) {
            try {
                let res = await buildingApplicationStore.deleteBuildingStoreyDetail(building_documentation_id, id)
                toast(res.status, res.data.message)
                await getBuildingStoreyDetails();
            } catch (e) {
                showErrors(e)
            }
        }
    });
}

const openEditForm = (index) => {
    editFormOpened.value = true;
    const selectedStorey = buildingStoreyDetails.value[index];
    Object.assign(form, {
        id: selectedStorey.id ?? '',
        storey: selectedStorey.storey ?? '',
        area_of_former_construction: selectedStorey.area_of_former_construction ?? 0,
        land_area: selectedStorey.land_area ?? 0,
        remarks: selectedStorey.remarks ?? 0,
    })
}

const closeEditForm = () => {
    editFormOpened.value = false;
    resetForm();
}

const resetForm = () => {
    Object.assign(form, {...initialState});
}
</script>
