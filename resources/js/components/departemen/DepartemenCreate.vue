<script>
import { ref } from 'vue'
export default {
    setup(){
        const doc_id = ref(null)
        return {
            doc_id
        }
    },
    data() {
        return {
            myvalue: 0,
        };
    },
    methods: {
        handleId(event){
            this.myvalue = event;
        }    
    },
    

}
</script>
<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveDepartemen">
        <input type="hidden" ref="doc_id" v-model="myvalue">
        <div class="space-y-4 rounded-md shadow-sm columns-2">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Departemen</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.name">
                </div>
            </div>

            <div>
                <label for="doc_id" class="block text-sm font-medium text-gray-700">Dokumen</label>
                
                <div class="mt-1">
                    <FileUpload   v-on:getId="handleId"></FileUpload>
                </div>
            </div>

            
        </div>
        <div class="flex mb-4 place-content-end">
            <button type="button" onclick="window.location='/departemen'" class="mr-2 inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
                Batal
            </button>
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
                Tambah
            </button>
        </div>
    </form>
</template>

<script setup>
import useDepartemen from '../../composables/departemen'
import { reactive } from 'vue'
import FileUpload from "@/components/FileUploadComponent.vue";

const doc_id = ref(null)

const form = reactive({
    name: '',
    doc_id: ''
})

const { errors, storeDepartemen } = useDepartemen()

const saveDepartemen = async () => {
    form.doc_id = doc_id.value.value;
    await storeDepartemen({ ...form })
}
</script>