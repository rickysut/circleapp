import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import { createApp } from 'vue';
import router from './router'

import KaryawanIndex from '@/components/karyawan/KaryawanIndex.vue';
import DepartemenIndex from '@/components/departemen/DepartemenIndex.vue';
// import FileUpload from "@/components/FileUploadComponent.vue";


createApp({
    components: {
        KaryawanIndex,
        DepartemenIndex,
        // FileUpload
    }
}).use(router).mount('#app')

