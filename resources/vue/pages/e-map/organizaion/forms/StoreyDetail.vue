<template>
    <form class="mb-2">
        <fieldset>
            <legend>१.११ तल्लाको क्षेत्रफल र उचाईको विवरण:</legend>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th>तल्ला</th>
                        <th>प्रस्तावित निर्माणको क्षेत्रफल</th>
                        <th>साविक निर्माणको क्षेत्रफल</th>
                        <th>जम्मा क्षेत्रफल</th>
                        <th>उचाई</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($storeyDetails as $index=>$storeyDetail)
                    <tr>
                        <td>
                            <select wire:model="storeyDetails.{{$index}}.map_fee_id"
                                    {{$dataToEdit !== $index ?'disabled':''}} class="form-select form-select-sm">
                            <option value="">--- छान्नुहोस् ---</option>
                            @foreach($mapFees as $mapFee)
                            <option value="{{$mapFee->id}}">{{$mapFee->storey}}</option>
                            @endforeach
                            </select>
                            @error("storeyDetails.".$index.".map_fee_id")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td>
                            <input type="number"
                                   step="any"
                                   id="storeyDetails.{{$index}}.area_of_proposed_construction"
                                   wire:model="storeyDetails.{{$index}}.area_of_proposed_construction"
                                   {{$dataToEdit !== $index ?'disabled':''}}
                            class="form-control form-control-sm" min="0">
                            @error("storeyDetails.".$index.".area_of_proposed_construction")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td>
                            <input type="number"

                                   step="any"

                                   id="storeyDetails.{{$index}}.area_of_former_construction"
                                   wire:model="storeyDetails.{{$index}}.area_of_former_construction"
                                   {{$dataToEdit !== $index ?'disabled':''}}
                            class="form-control form-control-sm" min="0">
                            @error("storeyDetails.".$index.".area_of_former_construction")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td>
                            <input type="number"
                                   step="any"
                                   id="storeyDetails.{{$index}}.total_area"
                                   wire:model="storeyDetails.{{$index}}.total_area"
                                   {{$dataToEdit !== $index ?'disabled':''}}
                            class="form-control form-control-sm" min="0">
                            @error("storeyDetails.".$index.".total_area")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td>
                            <input type="number"
                                   step="any"
                                   id="storeyDetails.{{$index}}.height"
                                   wire:model="storeyDetails.{{$index}}.height"
                                   {{$dataToEdit !== $index ?'disabled':''}}
                            class="form-control form-control-sm" min="0">
                            @error("storeyDetails.".$index.".height")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </td>
                        <td>
                            @if($dataToEdit === null)
                            <div class="d-flex gap-1">
                                <button type="button" class="btn btn-outline-primary btn-xs"
                                        wire:click.prevent="setDataForEdit({{$index}})"><i
                                    class="fa fa-pen"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-xs"
                                        wire:click.prevent="deleteData({{$index}})"><i
                                    class="fa fa-trash"></i>
                                </button>
                            </div>
                            @else
                            @if($dataToEdit===$index)
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-success"
                                        wire:click.prevent="saveFormData"><i
                                    class="fa fa-save"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-danger"
                                        wire:click.prevent="setDataForEdit()"><i
                                    class="fa fa-times"></i>
                                </button>
                            </div>
                            @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @error("applyMap.storeyDetails")
            <p class="text-danger">{{$message}}</p>
            @enderror
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
