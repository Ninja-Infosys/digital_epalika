import {createApp} from 'vue/dist/vue.esm-bundler';

import {createPinia} from 'pinia';

//base components
import VInput from "./components/base/VInput.vue";
import VSelect from "./components/base/VSelect.vue";
import VMultiSelect from "./components/base/VMultiSelect.vue";
import VButton from "./components/base/VButton.vue";
import VNepaliDatePicker from "./components/base/VNepaliDatePicker.vue";
import VModal from "./components/base/VModal.vue";
import VFileUpload from "./components/base/VFileUpload.vue";

//my plugins
import myPlugins from "./plugins/my-plugins";

//pages
import MapApplication from "./pages/e-map/MapApplication.vue";
import EditApplications from "./pages/e-map/organizaion/EditApplications.vue";

createApp({})
    .use(createPinia())
    .use(myPlugins)
    .component('VInput', VInput)
    .component('VSelect', VSelect)
    .component('VMultiSelect', VMultiSelect)
    .component('VNepaliDatePicker', VNepaliDatePicker)
    .component('VButton', VButton)
    .component('VModal', VModal)
    .component('VFileUpload', VFileUpload)
    .component('map-application',MapApplication)
    .component('edit-applications',EditApplications)
    .mount('#map-app')
