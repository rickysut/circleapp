import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import { createApp } from 'vue';
import router from './router'

import KaryawanIndex from '@/components/karyawan/KaryawanIndex.vue';
import DepartemenIndex from '@/components/departemen/DepartemenIndex.vue';
// import DatePicker from "@/components//DatePicker.vue";


createApp({
    components: {
        KaryawanIndex,
        DepartemenIndex
        // DatePicker
    }
}).use(router).mount('#app')

