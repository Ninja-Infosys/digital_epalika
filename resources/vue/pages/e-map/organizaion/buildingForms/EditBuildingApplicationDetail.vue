<template>
    <form @submit.prevent="saveFormData(mapApply.id)" class="mb-2">
        <fieldset>
            <legend>१. प्रस्तावित भवनको विवरण</legend>
            <button type="button" class="btn btn-xs float-end btn-outline-primary waves-effect waves-light"
                    @click.prevent="editFormOpened=!editFormOpened"><i
                class="fa fa-pen"></i>
            </button>
            <div class="mb-2">
                <label class="form-label fw-bolder">१.१ निर्माण कार्यको किसिम *</label>
                <div class="col">
                    <div v-for="type in eBuildingSetting?.buildingCategories??[]" class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                               @change="validateField('building_category')"
                               v-model="form.building_category"
                               :disabled="!editFormOpened"
                               :id="type.value"
                               :value="type.value">
                        <label class="form-check-label"
                               :for="type.value">
                            {{type.label}}
                        </label>
                    </div>
                </div>
                <p v-if="errors.building_category" class="text-danger">
                    {{errors.building_category}}
                </p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">१.२ प्रयोजन *</label>
                <div class="col">
                    <div v-for="usage in eBuildingSetting?.buildingUsages??[]" class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                               @change="validateField('building_usage')"
                               v-model="form.building_usage"
                               :disabled="!editFormOpened"
                               :id="building_usage.value"
                               :value="building_usage.value">
                        <label class="form-check-label"
                               :for="building_usage.value">
                            {{building_usage.label}}
                        </label>
                    </div>
                </div>
                <p v-if="errors.building_usage" class="text-danger">
                    {{errors.building_usage}}
                </p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">१.३ भवनको छानाको किसिम *</label>
                <div class="col">
                    <div v-for="category in eBuildingSetting?.roofCategories??[]" class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                               @change="validateField('roof_category')"
                               v-model="form.roof_category"
                               :id="category.value"
                               :disabled="!editFormOpened"
                               :value="category.value">
                        <label class="form-check-label"
                               :for="category.value">
                            {{category.label}}
                        </label>
                    </div>
                </div>
                <p v-if="errors.roof_category" class="text-danger">
                    {{errors.roof_category}}
                </p>
            </div>


            <div class="mb-1">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="text"
                            id="house_built_year"
                            v-model="form.house_built_year"
                            @validate="validateField('house_built_year')"
                            label="भवन निर्माण भएको वर्ष"
                            :disabled="!editFormOpened"
                            :error="errors.house_built_year"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="number"
                            id="storey"
                            v-model="form.storey"
                            @validate="validateField('storey')"
                            label="भवनको तल्ला संख्या"
                            :disabled="!editFormOpened"
                            :error="errors.storey"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="number"
                            id="room"
                            v-model="form.room"
                            @validate="validateField('room')"
                            label="भवनको कोठा संख्या"
                            :disabled="!editFormOpened"
                            :error="errors.room"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="text"
                            id="plinth_area"
                            v-model="form.plinth_area"
                            @validate="validateField('plinth_area')"
                            label="भवनको प्लिनथको क्षेत्रफल (वर्ग फिट/वर्ग मिटर)"
                            :disabled="!editFormOpened"
                            :error="errors.plinth_area"
                        />
                    </div>

                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="text"
                            id="other_construction_area_new"
                            v-model="form.other_construction_area_new"
                            @validate="validateField('other_construction_area_new')"
                            label="अन्य निर्माण (भवन बाहेक जस्तै ः कम्पाउणडवाल, टहरा)ले ढाकेको क्षेत्रफल (वर्ग फिट/वर्ग मिटर)"
                            :disabled="!editFormOpened"
                            :error="errors.other_construction_area_new"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="text"
                            id="other_construction_area_old"
                            v-model="form.other_construction_area_old"
                            @validate="validateField('other_construction_area_old')"
                            label="अन्य निर्माण (भवन बाहेक जस्तै ः कम्पाउणडवाल, टहरा)ले ढाकी सकेको क्षेत्रफल (वर्ग फिट/वर्ग मिटर)"
                            :disabled="!editFormOpened"
                            :error="errors.other_construction_area_old"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="text"
                            id="total_area"
                            v-model="form.total_area"
                            @validate="validateField('total_area')"
                            label="भवन निर्माण र साबिक भवन निर्माणले ढाक्ने जम्मा क्षेत्रफल(Ground Coverage)(वर्ग फिट/वर्ग मिटर)"
                            :disabled="!editFormOpened"
                            :error="errors.total_area"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="text"
                            id="height"
                            v-model="form.height"
                            @validate="validateField('height')"
                            label="भवनको कुल उचाई जमिनको सतहबाट (मिटर/फिट)"
                            :disabled="!editFormOpened"
                            :error="errors.height"
                        />
                    </div>
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

const {eBuildingSetting}=storeToRefs(settingStore);

const has_other_structure_type=ref(false);

const initialState={
    building_category:'',
    usage:'',
    building_category:'',
    structure_type:'',
    structure_type_id:'',
    current_storey:'',
    area_of_plinth:'',
    future_storey:'',
    length:'',
    breadth:'',
    height:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    Object.keys(form).forEach(key => {
        form[key] = props.mapApply[key]??'';
    })
})

const isSubmitting=ref(false);

watch(()=>has_other_structure_type.value,(has_other_type)=>{
    if(has_other_type){
        form.structure_type_id='';
    }
})

watch(()=>form.structure_type_id,(type_id)=>{
    if(type_id){
        has_other_structure_type.value=false;
    }
})

const validations = object({
    building_category: string().required('निर्माण कार्यको किसिम अनिवार्य छ |'),
    usage: string().required('प्रयोजन अनिवार्य छ |'),
    building_category: string().required('प्रयोजन अनिवार्य छ |'),
    structure_type_id: string().nullable(),
    current_storey: string().required('तल्ला संख्या अनिवार्य छ |'),
    area_of_plinth: string().required('क्षेत्रफल अनिवार्य छ |'),
    future_storey: string().required('तल्ला संख्या अनिवार्य छ |'),
    length: string().required('भवनको लम्बाई अनिवार्य छ |'),
    breadth: string().required('भवनको चौडाई अनिवार्य छ |'),
    height: string().required('भवनको उचाई अनिवार्य छ |'),
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (map_apply_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        try {
            let res = await applicationStore.updateApplicationDetail(map_apply_id,form);
            toast(res.status,res.data.message);
            editFormOpened.value=false;
            form.structure_type='';
        }catch (e) {
            showErrors(e);
        }finally {
            isSubmitting.value=false;
        }
    }
}
</script>
