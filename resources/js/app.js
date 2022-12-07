// import './bootstrap';
//
// import Alpine from 'alpinejs';
//
// window.Alpine = Alpine;
//
// Alpine.start();
// require('./formio');

import {createApp} from "vue";
import Toast from 'vue-toastification'
import App from './App.vue'
import VDateInput from '@/components/core/VDateInput.vue'
import VInput from './components/core/VInput.vue'
import VCheckbox from './components/core/VCheckbox.vue'
import VueFormSelect from '@vueform/multiselect'
import router from "./router";
import store from "./store";

const toastOptions = {
    transition: "my-custom-fade",
    timeout: 3000,
    maxToasts: 20,
    newestOnTop: true
};

createApp(App)
    .use(router)
    .use(store)
    .component('VInput',VInput)
    .component('VueFormSelect',VueFormSelect)
    .component('VCheckbox',VCheckbox)
    .component('VDateInput',VDateInput)
    .use(Toast,toastOptions)
    .mount('#vue-app')

