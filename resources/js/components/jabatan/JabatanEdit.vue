<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" v-on:submit.prevent="saveJabatan">
        <div class="space-y-4 rounded-md shadow-sm columns-2">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Jabatan</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="jabatan.name">
                </div>
            </div>
            <div>
                <label for="doc_id" class="block text-sm font-medium text-gray-700">Dokumen</label>
                <div class="mt-1">
                    <input type="text" name="doc_id" id="doc_id"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="jabatan.doc_id">
                </div>
            </div>
            
        </div>
        <div class="flex mb-4 place-content-end">
            <button type="button" onclick="window.location='/jabatan'" class="mr-2 inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
                Batal
            </button>
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
                Ubah
            </button>
        </div>
    </form>
</template>

<script setup>
import useJabatan from '@/composables/jabatan'
import { onMounted } from 'vue';

const { errors, jabatan, updateJabatan, getJabatan } = useJabatan()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => getJabatan(props.id))

const saveJabatan = async () => {
    await updateJabatan(props.id)
}
</script>