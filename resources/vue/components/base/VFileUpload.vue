<style scoped>
.image-caption {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #3d3dc1;
}
</style>
<template>
    <label v-if="label" :for="id" class="form-label fw-bolder">{{ label }} </label>
    <div v-if="showPreviewImage && (fileDetail.imageUrl || defaultPhoto)" class="image-preview mb-2">
        <div class="card border border-info">
            <div class="card-body text-center">
                <img :src="fileDetail.imageUrl || defaultPhoto" alt="Image"
                     :style="[{'max-height':imageHeight,'max-width':'100%'}]">
                <p v-if="fileDetail.file" class="image-caption">
                    {{ fileDetail.name }} <br>
                    ({{ fileDetail.size }} KB)
                </p>
            </div>
        </div>
    </div>
    <div class="input-group">
        <input
            type="text"
            :title="fileDetail.name"
            @click="selectFile" readonly
            class="form-control"
            :placeholder="fileDetail.file ? '1 file selected' : 'Select file...'"
        >
        <button v-if="fileDetail.file" @click="resetFile" class="btn btn-outline-danger" type="button">
            <i class="fa fa-trash"></i> Remove
        </button>
        <button @click="selectFile" class="btn btn-primary" type="button">
            <i class="fa fa-folder-open"> Browse..</i>
        </button>
    </div>
    <input
        type="file" ref="file_element"
        @change="onFileSelected"
        class="form-control" hidden
        v-bind:class="[{'is-invalid':error}]"
        :id="id"
    >
    <div v-if="error" class="invalid-feedback">
        {{ error }}
    </div>
</template>

<script setup>
import {ref, watch} from "vue";
import {useFileUpload} from "../../utils/fileUpload";

const emit = defineEmits(['update:modelValue', 'validate']);

const props=defineProps({
    modelValue: {},
    id: {
        type: String
    },
    label: {
        type: String,
    },
    defaultPhoto: {
        type: String
    },
    error: {
        type: String,
        default: ''
    },
    imageHeight: {
        default: '150px'
    },
    showPreviewImage:{
        default:true
    }
})

const {fileDetail, onFileSelected, resetFile} = useFileUpload();

const file_element = ref('')

function selectFile() {
    file_element.value.click()
}

watch(() => fileDetail.value.file, (file) => {
    if (file) {
        emit('update:modelValue', file)
    } else {
        resetFile();
        emit('update:modelValue', '')
    }
    emit('validate');
})

watch(() => props.modelValue, (file) => {
    if (file) {
        fileDetail.value.file=file;
    }else{
        resetFile();
    }
})

</script>
