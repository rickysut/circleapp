<template>
    <div class="flex mb-4 place-content-end">
        <div class="px-4 py-2 text-white rounded-l-md rounded-r-md border bg-indigo-600 cursor-pointer hover:bg-indigo-700">
            <router-link :to="{ name: 'departemen.create' }" class="text-sm font-medium">Tambah Departemen</router-link>
        </div>
    </div>
    <div class="min-w-full overflow-hidden overflow-x-auto align-middle sm:rounded-md">
        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Nama Departemen</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Dokumen</span>
                </th>
                
                <th class="px-6 py-3 bg-gray-50 w-2">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Action</span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="item in departemens" :key="item.id">
                <tr class="bg-white">
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.name }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.doc_id }}
                    </td>
                    
                    <td class="inline-flex text-right rounded-md shadow-sm mr-2" role="group" >
                            <button class="mt-1 py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                <router-link :to="{ name: 'departemen.edit', params: { id: item.id } }">
                                Edit</router-link>
                            </button>
                            <button class="mt-1 py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"
                            @click="deleteDepartemen(item.id)">
                                Hapus
                            </button>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import useDepartemen from '@/composables/departemen'
import { onMounted } from 'vue';

const { departemens, getDepartemens, destroyDepartemen } = useDepartemen()

const deleteDepartemen = async (id) => {
    if (!window.confirm('You sure?')) {
        return
    }

    await destroyDepartemen(id)
    await getDepartemens()
}
onMounted(getDepartemens)
</script>