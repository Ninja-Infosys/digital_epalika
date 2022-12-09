import {useToast} from 'vue-toastification'
import "vue-toastification/dist/index.css";

const toast = useToast()

class toastAlert {
    toastMessage(status, title) {
        const errors = [400, 401, 403, 404, 405, 408, 414, 415, 422, 500]
        if (status === 200 || status === 201) {
            toast.success(title)
        } else if (errors.includes(status)) {
            toast.error(title)
        }
    }
}


export default new toastAlert();
