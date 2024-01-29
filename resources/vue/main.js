import {createApp} from 'vue/dist/vue.esm-bundler';

import {createPinia} from 'pinia';

//base components
import VInput from "./components/base/VInput.vue";
import VSelect from "./components/base/VSelect.vue";
import VButton from "./components/base/VButton.vue";

//my plugins
import myPlugins from "./plugins/my-plugins";

//pages
import MapApplication from "./pages/e-map/MapApplication.vue";

createApp({})
    .use(createPinia())
    .use(myPlugins)
    .component('VInput', VInput)
    .component('VSelect', VSelect)
    .component('VButton', VButton)
    .component('map-application',MapApplication)
    .mount('#map-app')
