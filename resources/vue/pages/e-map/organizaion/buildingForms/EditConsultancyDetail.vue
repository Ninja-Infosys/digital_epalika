<template>
    <form @submit.prevent="saveFormData(buildingDocumentation.id)" class="my-2">
        <button type="button" class="btn btn-xs float-end btn-outline-primary waves-effect waves-light"
                @click.prevent="editFormOpened=!editFormOpened"><i
            class="fa fa-pen"></i>
        </button>
        <div class="d-flex flex-column align-items-end">
            <div class="col-4">


                <div class="mb-1">
                    <VFileUpload
                        id="consultant_engineer_signature"
                        v-model="form.consultant_engineer_signature"
                        label="(कन्सल्टेन्ट इंन्जिनियरको सहि)"
                        :default-photo="consultant_engineer_signature_url"
                        :show-preview-image="true"
                    />
                </div>
                <div class="mb-1">
                    <VInput
                        id="consultant_name"
                        v-model="form.consultant_engineer_name"
                        label="कन्सल्टेन्ट इंन्जिनियरको नाम"
                        @validate="validateField('consultant_engineer_name')"
                        :disabled="!editFormOpened"
                        :error="errors.consultant_engineer_name"
                    />
                </div>
                <div class="mb-1">
                    <VInput
                        id="consultant_engineer_post"
                        v-model="form.consultant_engineer_post"
                        label="पद"
                        @validate="validateField('consultant_engineer_post')"
                        :disabled="!editFormOpened"
                        :error="errors.consultant_engineer_post"
                    />
                </div>
                <div class="mb-1">
                    <VInput
                        id="consultant_nec_no"
                        v-model="form.n_e_c_registration_no"
                        label="एन. ई. सी. नं:"
                        @validate="validateField('n_e_c_registration_no')"
                        :disabled="!editFormOpened"
                        :error="errors.n_e_c_registration_no"
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
import {useFileUpload} from "../../../../utils/fileUpload";

const props=defineProps({
    buildingDocumentation:{
        required:true,
        type:Object
    }
})

const buildingSettingStore=useBuildingSettingStore();
const buildingApplicationStore=useBuildingApplicationStore();
const {onFileSelected,fileDetail}=useFileUpload();

const editFormOpened=ref(false);

const {eBuildingSetting}=storeToRefs(buildingSettingStore);

const initialState={
    consultant_engineer_signature:'',
    consultant_engineer_name:'',
    consultant_engineer_post:'',
    n_e_c_registration_no:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    Object.keys(form).forEach(key => {
        if(key!=='consultant_engineer_signature'){
            form[key] =props.buildingDocumentation[key]??'';
        }
    })
})

watch(() => fileDetail.value.file, (file) => {
    if (file) {
        form.consultant_engineer_signature=file;
    }else{
        form.consultant_engineer_signature='';
    }
})

const isSubmitting=ref(false);

const validations = object({
    consultant_engineer_name:string().required('नाम अनिवार्य छ'),
    consultant_engineer_post:string().required('मोबाइल नं. अनिवार्य छ'),
    n_e_c_registration_no:string().required('एन. ई. सी. नं')
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (building_documentation_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        const formData = new FormData()
        Object.keys(form).forEach(key => {
            formData.append(key, form[key]);
        });
        try {
            let res = await buildingApplicationStore.updateBuildingConsultancyDetail(building_documentation_id,formData);
            toast(res.status,res.data.message);
            editFormOpened.value=false;
        }catch (e) {
            showErrors(e);
        }finally {
            isSubmitting.value=false;
        }
    }
}
</script>
