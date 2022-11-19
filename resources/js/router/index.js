import { createRouter, createWebHistory } from 'vue-router'

import KaryawanIndex from '@/components/karyawan/KaryawanIndex.vue'
import KaryawanCreate from '@/components/karyawan/KaryawanCreate.vue'
import KaryawanEdit from '@/components/karyawan/KaryawanEdit.vue'

import DepartemenIndex from '@/components/departemen/DepartemenIndex.vue'
import DepartemenCreate from '@/components/departemen/DepartemenCreate.vue'
import DepartemenEdit from '@/components/departemen/DepartemenEdit.vue'

import JabatanIndex from '@/components/jabatan/JabatanIndex.vue'
import JabatanCreate from '@/components/jabatan/JabatanCreate.vue'
import JabatanEdit from '@/components/jabatan/JabatanEdit.vue'

import DokumenIndex from '@/components/dokumen/DokumenIndex.vue'
import DokumenCreate from '@/components/dokumen/DokumenCreate.vue'
import DokumenEdit from '@/components/dokumen/DokumenEdit.vue'

const routes = [
    {
        path: '/karyawan',
        name: 'karyawan.index',
        component: KaryawanIndex
    },
    {
        path: '/karyawan/create',
        name: 'karyawan.create',
        component: KaryawanCreate
    },
    {
        path: '/karyawan/:id/edit',
        name: 'karyawan.edit',
        component: KaryawanEdit,
        props: true
    },
    {
        path: '/departemen',
        name: 'departemen.index',
        component: DepartemenIndex
    },
    {
        path: '/departemen/create',
        name: 'departemen.create',
        component: DepartemenCreate
    },
    {
        path: '/departemen/:id/edit',
        name: 'departemen.edit',
        component: DepartemenEdit,
        props: true
    },
    {
        path: '/jabatan',
        name: 'jabatan.index',
        component: JabatanIndex
    },
    {
        path: '/jabatan/create',
        name: 'jabatan.create',
        component: JabatanCreate
    },
    {
        path: '/jabatan/:id/edit',
        name: 'jabatan.edit',
        component: JabatanEdit,
        props: true
    },
    {
        path: '/dokumen',
        name: 'dokumen.index',
        component: DokumenIndex
    },
    {
        path: '/dokumen/create',
        name: 'dokumen.create',
        component: DokumenCreate
    },
    {
        path: '/dokumen/:id/edit',
        name: 'dokumen.edit',
        component: DokumenEdit,
        props: true
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})