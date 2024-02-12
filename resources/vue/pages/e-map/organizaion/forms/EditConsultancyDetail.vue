<template>
    <form @submit.prevent="saveFormData(mapApply.id)" class="my-2">
        <button type="button" class="btn btn-xs float-end btn-outline-primary waves-effect waves-light"
                @click.prevent="editFormOpened=!editFormOpened"><i
            class="fa fa-pen"></i>
        </button>
        <div class="d-flex flex-column align-items-end">
            <div class="col-4">
                <div class="mb-1">
                    <label class="form-label" for="consultant_signature">(कन्सल्टेन्ट इंन्जिनियरको सहि)</label>
                    <input type="file"
                           id="applyMap.consultant_signature"
                           @change="onFileSelected"
                           :disabled="!editFormOpened"
                           class="form-control form-control-sm">
                </div>
                <div class="mb-1">
                    <VInput
                        id="consultant_name"
                        v-model="form.consultant_name"
                        label="नाम"
                        @validate="validateField('consultant_name')"
                        :disabled="!editFormOpened"
                        :error="errors.consultant_name"
                    />
                </div>
                <div class="mb-1">
                    <VInput
                        id="consultant_mobile_no"
                        v-model="form.consultant_mobile_no"
                        label="मोबाइल नं."
                        @validate="validateField('consultant_mobile_no')"
                        :disabled="!editFormOpened"
                        :error="errors.consultant_mobile_no"
                    />
                </div>
                <div class="mb-1">
                    <VInput
                        id="consultant_nec_no"
                        v-model="form.consultant_nec_no"
                        label="एन. ई. सी. नं:"
                        @validate="validateField('consultant_nec_no')"
                        :disabled="!editFormOpened"
                        :error="errors.consultant_nec_no"
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
import {useSettingStore} from "../../../../stores/setting";
import {object, string} from "yup";
import {useYup} from "../../../../utils/yup";
import showErrors from "../../../../utils/showErrors";
import {toast} from "../../../../utils/toast";
import {useApplicationStore} from "../../../../stores/e-map/organization/application";
import {useFileUpload} from "../../../../utils/fileUpload";

const props=defineProps({
    mapApply:{
        required:true,
        type:Object
    }
})

const settingStore=useSettingStore();
const applicationStore=useApplicationStore();
const {onFileSelected,fileDetail}=useFileUpload();

const editFormOpened=ref(false);

const {eMapSetting}=storeToRefs(settingStore);

const initialState={
    consultant_signature:'',
    consultant_name:'',
    consultant_mobile_no:'',
    consultant_nec_no:'',
}

const form = reactive({...initialState});

onMounted(()=>{
    Object.keys(form).forEach(key => {
        if(key!=='consultant_signature'){
            form[key] =props.mapApply[key]??'';
        }
    })
})

watch(() => fileDetail.value.file, (file) => {
    if (file) {
        form.consultant_signature=file;
    }else{
        form.consultant_signature='';
    }
})

const isSubmitting=ref(false);

const validations = object({
    consultant_name:string().required('नाम अनिवार्य छ'),
    consultant_mobile_no:string().required('मोबाइल नं. अनिवार्य छ'),
    consultant_nec_no:string().required('एन. ई. सी. नं')
});

const {errors, validateField, validateForm} = useYup(form, validations);

const saveFormData=async (map_apply_id) => {
    let validated = await validateForm(validations, form)
    if (validated) {
        isSubmitting.value = true;
        const formData = new FormData()
        Object.keys(form).forEach(key => {
            formData.append(key, form[key]);
        });
        try {
            let res = await applicationStore.updateConsultancyDetail(map_apply_id,formData);
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
