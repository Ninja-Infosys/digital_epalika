<template>
    <fieldset>
        <legend> ६. चार किल्लाको विवरण </legend>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>विवरण</th>
                    <th>पूर्व</th>
                    <th>पश्चिम</th>
                    <th>उत्तर</th>
                    <th>दक्षिण</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(fort,index) in fourForts.data" :key="index">
                    <th>
                        {{index+1}}
                    </th>
                    <th>
                        {{fort.detail_label}}
                    </th>
                    <td>
                        {{fort.east}}
                    </td>
                    <td>
                        {{fort.west}}
                    </td>
                    <td>
                        {{fort.north}}
                    </td>
                    <td>
                        {{fort.south}}
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

    <VModal title=" चार किल्लाको विवरण"
            v-model:show-modal="editFormOpened"
            @close-click="closeEditForm">
        <template #body>
            <form @submit.prevent="saveFormData(mapApply.id)">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="east"
                            v-model="form.east"
                            label="पूर्व"
                            @validate="validateField('east')"
                            :error="errors.east"
                        />
                    </div>

                    <div class="col-md-6 mb-2">
                        <VInput
                            id="west"
                            v-model="form.west"
                            label="पश्चिम"
                            @validate="validateField('west')"
                            :error="errors.west"
                        />
                    </div>
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="north"
                            v-model="form.north"
                            label="उत्तर"
                            @validate="validateField('north')"
                            :error="errors.north"
                        />
                    <div class="col-md-6 mb-2">
                        <VInput
                            id="south"
                            v-model="form.south"
                            label="दक्षिण"
                            @validate="validateField('south')"
                            :error="errors.south"
                        />
                    </div>

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

const props=defineProps({
    mapApply:{
        required:true,
        type:Object
    }
})

const settingStore=useSettingStore();
const applicationStore=useApplicationStore();

const editFormOpened=ref(false);

const {eMapSetting}=storeToRefs(settingStore);
const {fourForts}=storeToRefs(applicationStore);

const initialState={
    detail:'',
    east:'' ,
    south:'' ,
    west:'',
    north:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    getFourFortDetails();
})

const getFourFortDetails=async () => {
    applicationStore.getFourForts(props.mapApply.id);
}

const isSubmitting=ref(false);

const validations = object({
    detail: string().required('विवरण अनिवार्य छ |'),
    east: string().required('पूर्व दिशा अनिवार्य छ |'),
    west: string().required('पश्चिम दिशा अनिवार्य छ |'),
    south: string().required('दक्षिण दिशा अनिवार्य छ |'),
    north: string().required('उत्तर दिशा अनिवार्य छ |'),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (map_apply_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await applicationStore.updateFourFortDetail(map_apply_id,form);
            toast(res.status,res.data.message);
            closeEditForm();
            await getFourFortDetails();
        }catch (e) {
            showErrors(e);
        }finally {
            isSubmitting.value=false;
        }
    }
}

const openEditForm=(index)=>{
    editFormOpened.value=true;
    const selectedFort=fourForts.value.data[index];
    Object.assign(form,{
        detail:selectedFort.detail??'',
        east:selectedFort.east??'',
        west:selectedFort.west??'',
        south:selectedFort.south??'',
        north:selectedFort.north??'',
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
