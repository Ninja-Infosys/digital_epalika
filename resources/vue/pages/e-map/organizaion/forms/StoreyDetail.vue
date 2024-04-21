<template>
    <fieldset class="my-3">
        <legend>१.११ तल्लाको क्षेत्रफल र उचाईको विवरण:</legend>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr class="text-center">
                    <th>तल्ला</th>
                    <th>प्रस्तावित निर्माणको क्षेत्रफल (वर्ग फिट/ वर्ग मिटर)</th>
                    <th>साविक निर्माणको क्षेत्रफल</th>
                    <th>जम्मा क्षेत्रफल</th>
                    <th>उचाई</th>
                    <th>जम्मा कोठा</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(storey,index) in storeyDetails" :key="storey.id">
                    <td>
                        {{ storey.mapFee?.storey || 'उपलब्ध छैन' }}
                    </td>
                    <td>
                        {{ storey.area_of_proposed_construction || 'उपलब्ध छैन' }}
                    </td>
                    <td>
                        {{ storey.area_of_former_construction || '-' }}
                    </td>
                    <td>
                        {{ storey.total_area || 'उपलब्ध छैन' }}
                    </td>
                    <td>
                        {{ storey.height || 'उपलब्ध छैन' }}
                    </td>
                    <td>
                        {{ storey.room || 'उपलब्ध छैन' }}
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <button type="button" class="btn btn-outline-primary btn-xs"
                                    @click.prevent="openEditForm(index)"><i
                                class="fa fa-pen"></i>
                            </button>
                            <button v-if="storey.id" type="button" class="btn btn-outline-danger btn-xs"
                                    @click.prevent="deleteStoreyDetail(mapApply.id,storey.id)"><i
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
            <form @submit.prevent="saveFormData(mapApply.id)">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <VSelect
                            id="map_fee_id"
                            v-model="form.map_fee_id"
                            :options="eMapSetting.mapFees"
                            label="तल्ला"
                            name-prop="storey"
                            @validate="validateField('map_fee_id')"
                            :error="errors.map_fee_id"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="area_of_proposed_construction"
                            v-model="form.area_of_proposed_construction"
                            label="प्रस्तावित निर्माणको क्षेत्रफल (वर्ग फिट/ वर्ग मिटर)"
                            @validate="validateField('area_of_proposed_construction')"
                            :error="errors.area_of_proposed_construction"
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
                            id="total_area"
                            v-model="form.total_area"
                            label="जम्मा क्षेत्रफल"
                            @validate="validateField('total_area')"
                            :error="errors.total_area"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="height"
                            v-model="form.height"
                            label="उचाई"
                            min="0"
                            @validate="validateField('height')"
                            :error="errors.height"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="room"
                            min-value="0"
                            v-model="form.room"
                            label="जम्मा कोठा"
                            @validate="validateField('room')"
                            :error="errors.room"
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
import {useSettingStore} from "../../../../stores/setting";
import {object, string} from "yup";
import {useYup} from "../../../../utils/yup";
import showErrors from "../../../../utils/showErrors";
import {toast} from "../../../../utils/toast";
import {useApplicationStore} from "../../../../stores/e-map/organization/application";
import Swal from "sweetalert2";

const props = defineProps({
    mapApply: {
        required: true,
        type: Object
    }
})

const settingStore = useSettingStore();
const applicationStore = useApplicationStore();

const editFormOpened = ref(false);

const {eMapSetting} = storeToRefs(settingStore);
const {storeyDetailsData} = storeToRefs(applicationStore);

const initialState = {
    id: '',
    map_fee_id: '',
    area_of_proposed_construction: '',
    area_of_former_construction: '',
    total_area: '',
    height: '',
    room: '',
}

const storeyDetails = ref([]);

const form = reactive({...initialState});

onMounted(() => {
    getStoreyDetails();
})

const getStoreyDetails = async () => {
    storeyDetails.value = [];
    await applicationStore.getStoreyDetails(props.mapApply.id);
    storeyDetailsData.value.data.forEach((storey) => {
        storeyDetails.value.push(storey);
    })
    if (storeyDetailsData.value.storey_details_count < storeyDetailsData.value.current_storey) {
        for (let i = storeyDetailsData.value.storey_details_count; i < storeyDetailsData.value.current_storey; i++) {
            storeyDetails.value.push({
                map_fee_id: '',
                area_of_proposed_construction: '',
                area_of_former_construction: '',
                total_area: '',
                height: '',
                room: '',
            });
        }
    }
}

const isSubmitting = ref(false);

const validations = object({
    map_fee_id: string().required('तल्ला अनिवार्य छ |'),
    area_of_proposed_construction: string().required('प्रस्तावित  क्षेत्रफल अनिवार्य छ |'),
    area_of_former_construction: string().required('साविक क्षेत्रफल अनिवार्य छ |'),
    total_area: string().required('जम्मा क्षेत्रफल अनिवार्य छ |'),
    height: string().required('उचाई अनिवार्य छ |'),
    room: string().required('उचाई अनिवार्य छ |'),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData = async (map_apply_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await applicationStore.updateStoreyDetail(map_apply_id, form);
            toast(res.status, res.data.message);
            closeEditForm();
            await getStoreyDetails();
        } catch (e) {
            showErrors(e);
        } finally {
            isSubmitting.value = false;
        }
    }
}

const deleteStoreyDetail = (map_apply_id, id) => {
    Swal.fire({
        title: 'Are You Sure to Delete ? ',
        showCancelButton: true,
        confirmButtonColor: 'red',
        confirmButtonText: "Yes",
    }).then(async (result) => {
        if (result.value) {
            try {
                let res = await applicationStore.deleteStoreyDetail(map_apply_id, id)
                toast(res.status, res.data.message)
                await getStoreyDetails();
            } catch (e) {
                showErrors(e)
            }
        }
    });
}

const openEditForm = (index) => {
    editFormOpened.value = true;
    const selectedStorey = storeyDetails.value[index];
    Object.assign(form, {
        id: selectedStorey.id ?? '',
        map_fee_id: selectedStorey.map_fee_id ?? '',
        area_of_proposed_construction: selectedStorey.area_of_proposed_construction ?? 0,
        area_of_former_construction: selectedStorey.area_of_former_construction ?? 0,
        total_area: selectedStorey.total_area ?? 0,
        height: selectedStorey.height ?? 0,
        room: selectedStorey.room ?? 0,
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
