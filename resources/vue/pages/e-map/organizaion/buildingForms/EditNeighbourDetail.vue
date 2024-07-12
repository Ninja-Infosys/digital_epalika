<template>
    <fieldset>
        <legend> ६. संधियारको विवरण </legend>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>दिशा</th>
                    <th>नाम</th>
                    <th>वडा नं.</th>
                    <th>कित्ता नं.</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(fort,index) in neighbours.data" :key="index">
                    <th>
                        {{index+1}}
                    </th>
                    <th>
                        {{fort.direction_label}}
                    </th>
                    <td>
                        {{fort.neighbour_name}}
                    </td>
                    <td>
                        {{fort.ward_no}}
                    </td>
                    <td>
                        {{fort.plot_no}}
                    </td>

                    <td>
                        <div class="d-flex gap-1">
                            <button type="button" class="btn btn-outline-primary btn-xs"
                                    @click.prevent="openEditForm(index)"><i
                                class="fa fa-pen"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </fieldset>

    <VModal title=" संधियारको विवरण"
            v-model:show-modal="editFormOpened"
            @close-click="closeEditForm">
        <template #body>
            <form @submit.prevent="saveFormData(buildingDocumentation.id)">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="neighbour_name"
                            v-model="form.neighbour_name"
                            label="संधियारको नाम"
                            @validate="validateField('neighbour_name')"
                            :error="errors.neighbour_name"
                        />
                    </div>

                    <div class="col-md-6 mb-2">
                        <VInput
                            id="ward_no"
                            v-model="form.ward_no"
                            label="संधियारको वडा नं."
                            @validate="validateField('ward_no')"
                            :error="errors.ward_no"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="plot_no"
                            v-model="form.plot_no"
                            label="संधियारको कित्ता नं."
                            @validate="validateField('plot_no')"
                            :error="errors.plot_no"
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
const {neighbours}=storeToRefs(buildingApplicationStore);

const initialState={
    direction:'',
    neighbour_name:'' ,
    ward_no:'' ,
    plot_no:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    getNeighbourDetails();
})

const getNeighbourDetails=async () => {
    buildingApplicationStore.getBuildingNeighbours(props.buildingDocumentation.id);
}

const isSubmitting=ref(false);

const validations = object({
    direction: string().required('विवरण अनिवार्य छ |'),
    neighbour_name: string().required('संधियारको नाम अनिवार्य छ |'),
    ward_no: string().required('संधियारको वडा नं. अनिवार्य छ |'),
    plot_no: string().required('संधियारको कित्ता नं. अनिवार्य छ |'),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (building_documentation_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await buildingApplicationStore.updateBuildingNeighbourDetail(building_documentation_id,form);
            toast(res.status,res.data.message);
            closeEditForm();
            await getNeighbourDetails();
        }catch (e) {
            showErrors(e);
        }finally {
            isSubmitting.value=false;
        }
    }
}

const openEditForm=(index)=>{
    editFormOpened.value=true;
    const selectedFort=neighbours.value.data[index];
    Object.assign(form,{
        direction:selectedFort.direction??'',
        neighbour_name:selectedFort.neighbour_name??'',
        ward_no:selectedFort.ward_no??'',
        plot_no:selectedFort.plot_no??'',
    })
}

const closeEditForm=()=>{
    editFormOpened.value=false;
    resetForm();
}

const resetForm = () => {
    Object.assign(form, {...initialState});
}
</script>
