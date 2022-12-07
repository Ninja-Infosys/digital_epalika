import toast from "../helpers/toast";
export default function showErrors(e) {

    if (e.response.status === 422) {
        Object.keys(e.response.data.errors).forEach(key => {
            toast.toastMessage(e.response.status, e.response.data.errors[key][0])
        });
    } else {
        toast.toastMessage(e.response.status, e.response.data.message)
    }
}
