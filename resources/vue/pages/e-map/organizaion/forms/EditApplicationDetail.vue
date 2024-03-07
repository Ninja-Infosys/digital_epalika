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
                    <div v-for="type in eMapSetting?.constructionTypes??[]" class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                               @change="validateField('construction_type')"
                               v-model="form.construction_type"
                               :disabled="!editFormOpened"
                               :id="type.value"
                               :value="type.value">
                        <label class="form-check-label"
                               :for="type.value">
                            {{type.label}}
                        </label>
                    </div>
                </div>
                <p v-if="errors.construction_type" class="text-danger">
                    {{errors.construction_type}}
                </p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">१.२ प्रयोजन *</label>
                <div class="col">
                    <div v-for="usage in eMapSetting?.buildingUsages??[]" class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                               @change="validateField('usage')"
                               v-model="form.usage"
                               :disabled="!editFormOpened"
                               :id="usage.value"
                               :value="usage.value">
                        <label class="form-check-label"
                               :for="usage.value">
                            {{usage.label}}
                        </label>
                    </div>
                </div>
                <p v-if="errors.usage" class="text-danger">
                    {{errors.usage}}
                </p>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">१.३ भवन ऐन अनुसार वर्गीकरण *</label>
                <div class="col">
                    <div v-for="category in eMapSetting?.buildingCategories??[]" class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                               @change="validateField('building_category')"
                               v-model="form.building_category"
                               :id="category.value"
                               :disabled="!editFormOpened"
                               :value="category.value">
                        <label class="form-check-label"
                               :for="category.value">
                            {{category.label}}
                        </label>
                    </div>
                </div>
                <p v-if="errors.building_category" class="text-danger">
                    {{errors.building_category}}
                </p>
            </div>

            <div class="mb-3">
                <b class="form-label">१.४ स्ट्रकचर टाईप *</b> <br>
                <div class="col">
                    <div v-for="structureType in eMapSetting?.structureTypes??[]" class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                               @change="validateField('structure_type_id')"
                               v-model="form.structure_type_id"
                               :id="structureType.id"
                               :disabled="!editFormOpened"
                               :value="structureType.id">
                        <label class="form-check-label"
                               :for="structureType.id">
                            {{structureType.title}}
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio"
                               id="open_structure_type"
                               v-model="has_other_structure_type"
                               :disabled="!editFormOpened"
                               :value="true"
                        class="form-check-input">
                        <label class="form-check-label"
                               for="open_structure_type" @click.prevent="has_other_structure_type=!has_other_structure_type">अन्य</label>
                    </div>
                    <div v-if="has_other_structure_type" class="col-md-3">
                        <label for="structure-type">
                            <input type="text"
                                   v-model="form.structure_type"
                                   :disabled="!editFormOpened"
                                   id="structure-type"
                            class="form-control">
                        </label>
                    </div>
                </div>
                <p v-if="errors.structure_type_id" class="text-danger">
                    {{errors.structure_type_id}}
                </p>
            </div>
            <div class="mb-1">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="number"
                            id="current_storey"
                            v-model="form.current_storey"
                            @validate="validateField('current_storey')"
                            label="हाल निर्माण गर्ने तल्ला संख्या"
                            :disabled="!editFormOpened"
                            :error="errors.current_storey"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="number"
                            id="area_of_plinth"
                            v-model="form.area_of_plinth"
                            @validate="validateField('area_of_plinth')"
                            label="प्लिन्थको क्षेत्रफल (वर्ग फिट)"
                            :disabled="!editFormOpened"
                            :error="errors.area_of_plinth"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="number"
                            id="future_storey"
                            v-model="form.future_storey"
                            @validate="validateField('future_storey')"
                            label="भविष्यमा निर्माण गर्ने तल्ला"
                            :disabled="!editFormOpened"
                            :error="errors.future_storey"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="number"
                            id="length"
                            v-model="form.length"
                            @validate="validateField('length')"
                            label="कुल भवनको लम्बाई (मिटर)"
                            :disabled="!editFormOpened"
                            :error="errors.length"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="number"
                            id="breadth"
                            v-model="form.breadth"
                            @validate="validateField('breadth')"
                            label="कुल भवनको चौडाई (मिटर)"
                            :disabled="!editFormOpened"
                            :error="errors.breadth"
                        />
                    </div>
                    <div class="col-md-4 mb-3">
                        <VInput
                            input-type="number"
                            id="height"
                            v-model="form.height"
                            @validate="validateField('height')"
                            label="भवनको कुल उचाई जमिनको सतहबाट (मिटर)"
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

const {eMapSetting}=storeToRefs(settingStore);

const has_other_structure_type=ref(false);

const initialState={
    construction_type:'',
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
    construction_type: string().required('निर्माण कार्यको किसिम अनिवार्य छ |'),
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
