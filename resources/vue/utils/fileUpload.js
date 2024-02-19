import {ref} from "vue";

export const useFileUpload = () => {

    const imageExtensions = ['image/jpeg', 'image/png', 'image/jpeg', 'image/webp', 'image/gif'];

    const file = ref('');

    const fileDetail = ref({
        file: '',
        name: '',
        imageUrl: null,
        size: ''
    })

    const onFileSelected = (event) => {
        if (event.target.files.length === 0) {
            file.value = ''
        }
        file.value = event.target.files[0]
        if (!(file.value instanceof File)) {
            return;
        }
        fileDetail.value.file = file.value
        fileDetail.value.name = file.value.name
        fileDetail.value.size = (file.value.size / 1000).toFixed(2)

        if (imageExtensions.includes(file.value['type'])) {
            let fileReader = new FileReader();
            fileReader.readAsDataURL(file.value);

            fileReader.addEventListener("load", () => {
                fileDetail.value.imageUrl = fileReader.result
            })
        }
    }

    const resetFile = () => {
        Object.assign(fileDetail.value, {
            file: '',
            name: '',
            imageUrl: null,
            size: ''
        })
    }

    return {
        fileDetail,
        onFileSelected,
        resetFile
    }
}
