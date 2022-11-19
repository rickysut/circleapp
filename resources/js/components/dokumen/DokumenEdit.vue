<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" v-on:submit.prevent="saveDokumen">
        <div class="space-y-4 rounded-md shadow-sm columns-2">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Dokumen</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="dokumen.name">
                </div>
            </div>
            <div>
                <label for="kind" class="block text-sm font-medium text-gray-700">Jenis</label>
                <div class="mt-1">
                        <select class="form-control" v-model="dokumen.kind">
                            @foreach(["Karyawan", "Departemen" , "Jabatan"] AS $kind )    
                            <option value="{{ $kind }}" >{{ $kind }}</option>
                            @endforeach
                        </select>
                    
                </div>
            </div>
            <div>
                <label for="filepath" class="block text-sm font-medium text-gray-700">Path</label>
                <div class="mt-1">
                    <input type="text" name="filepath" id="filepath"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="dokumen.filepath">
                </div>
            </div>
        </div>
        <div class="flex mb-4 place-content-end">
            <button type="button" onclick="window.location='/dokumen'" class="mr-2 inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
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
import useDokumen from '@/composables/dokumen'
import { onMounted } from 'vue';

const { errors, dokumen, updateDokumen, getDokumen } = useDokumen()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => getDokumen(props.id))

const saveDokumen = async () => {
    await updateDokumen(props.id)
}
</script>