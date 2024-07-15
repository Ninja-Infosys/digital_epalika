<template>
    <fieldset class="my-3">
        <legend>१३) प्रत्येक तल्लाको लम्बाई र सिलिङ्गसम्मको उचाईः</legend>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr class="text-center">
                    <th>तल्ला</th>
                    <th> लम्बाई</th>
                    <th> चौडाई</th>
                    <th>उचाई</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="(buildingStorey,index) in storeyDescriptions" :key="buildingStorey.id" class="text-center">
                    <td>
                        {{ buildingStorey.mapFee?.storey || 'उपलब्ध छैन' }}
                    </td>

                    <td>
                        {{ buildingStorey.length || '-' }}
                    </td>
                    <td>
                        {{ buildingStorey.width || 'उपलब्ध छैन' }}
                    </td>
                    <td>
                        {{ buildingStorey.height || 'उपलब्ध छैन' }}
                    </td>

                    <td >
                        <div class="d-flex gap-1 ">
                            <button type="button" class="btn btn-outline-primary btn-xs"
                                    @click.prevent="openEditForm(index)"><i
                                class="fa fa-pen"></i>
                            </button>
                            <button v-if="buildingStorey.id" type="button" class="btn btn-outline-danger btn-xs"
                                    @click.prevent="deleteStoreyDescription(buildingDocumentation.id,buildingStorey.id)"><i
                                class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </fieldset>

    <VModal title="प्रत्येक तल्लाको लम्बाई र सिलिङ्गसम्मको उचाईः"
            v-model:show-modal="editFormOpened"
            @close-click="closeEditForm">
        <template #body>
            <form @submit.prevent="saveFormData(buildingDocumentation.id)">
                <div class="row">

                    <div class="col-md-6 mb-2">
                        <VSelect
                            id="map_fee_id"
                            v-model="form.map_fee_id"
                            :options="eBuildingSetting.mapFees"
                            label="तल्ला"
                            name-prop="storey"
                            @validate="validateField('map_fee_id')"
                            :error="errors.map_fee_id"
                        />
                    </div>

                    <div class="col-md-6 mb-2">
                        <VInput
                            id="length"
                            v-model="form.length"
                            label="लम्बाई"
                            @validate="validateField('length')"
                            :error="errors.length"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="width"
                            v-model="form.width"
                            label="चौडाई"
                            @validate="validateField('width')"
                            :error="errors.width"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="height"
                            v-model="form.height"
                            label="उचाई"
                            @validate="validateField('height')"
                            :error="errors.height"
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
const {storeyDescriptionsData} = storeToRefs(buildingApplicationStore);

const initialState = {
    id: '',
    map_fee_id: '',
    length: '',
    width: '',
    height: '',
}

const storeyDescriptions = ref([]);

const form = reactive({...initialState});

onMounted(() => {
    getStoreyDescriptions();
})

const getStoreyDescriptions = async () => {
    storeyDescriptions.value = [];
    await buildingApplicationStore.getStoreyDescriptions(props.buildingDocumentation.id);
    storeyDescriptionsData.value.data.forEach((buildingStorey) => {
        storeyDescriptions.value.push(buildingStorey);
    })
    if (storeyDescriptionsData.value.storey_descriptions_count < storeyDescriptionsData.value.current_storey) {
        for (let i = storeyDescriptionsData.value.storey_descriptions_count; i < storeyDescriptionsData.value.current_storey; i++) {
            storeyDescriptions.value.push({
                map_fee_id: '',
                length: '',
                width: '',
                height: '',
            });
        }
    }
}

const isSubmitting = ref(false);

const validations = object({
    map_fee_id: string().required('तल्ला अनिवार्य छ |'),
    length: string().required('लम्बाई अनिवार्य छ |'),
    width: string().required('चौडाई क्षेत्रफल अनिवार्य छ |'),
    height: string().required(' उचाई अनिवार्य छ |'),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData = async (building_documentation_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await buildingApplicationStore.updateStoreyDescription(building_documentation_id, form);
            toast(res.status, res.data.message);
            closeEditForm();
            await getStoreyDescriptions();
        } catch (e) {
            showErrors(e);
        } finally {
            isSubmitting.value = false;
        }
    }
}

const deleteStoreyDescription = (building_documentation_id, id) => {
    Swal.fire({
        title: 'Are You Sure to Delete ? ',
        showCancelButton: true,
        confirmButtonColor: 'red',
        confirmButtonText: "Yes",
    }).then(async (result) => {
        if (result.value) {
            try {
                let res = await buildingApplicationStore.deleteStoreyDescription(building_documentation_id, id)
                toast(res.status, res.data.message)
                await getStoreyDescriptions();
            } catch (e) {
                showErrors(e)
            }
        }
    });
}

const openEditForm = (index) => {
    editFormOpened.value = true;
    const selectedStorey = storeyDescriptions.value[index];
    Object.assign(form, {
        id: selectedStorey.id ?? '',
        map_fee_id: selectedStorey.map_fee_id ?? '',
        length: selectedStorey.length ?? 0,
        width: selectedStorey.width ?? 0,
        height: selectedStorey.height ?? 0,
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
