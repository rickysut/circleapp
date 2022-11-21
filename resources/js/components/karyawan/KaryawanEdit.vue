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

    <form class="space-y-6" v-on:submit.prevent="saveKaryawan">
        <input type="hidden" ref="doc_id" v-model="myvalue">
        <div class="space-y-4 rounded-md shadow-sm columns-2">
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <div class="mt-1">
                    <input type="text" name="full_name" id="full_name"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="karyawan.full_name">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="text" name="email" id="email"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="karyawan.email">
                </div>
            </div>

            <div>
                <label for="handphone" class="block text-sm font-medium text-gray-700">Handphone</label>
                <div class="mt-1">
                    <input type="text" name="handphone" id="handphone"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="karyawan.handphone">
                </div>
            </div>

            <div>
                <label for="pob" class="block text-sm font-medium text-gray-700">Tempat lahir</label>
                <div class="mt-1">
                    <input type="text" name="pob" id="pob"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="karyawan.pob">
                </div>
            </div>
            <div>
                <label for="dob" class="block text-sm font-medium text-gray-700">Tanggal lahir</label>
                <div class="mt-1">
                    <Datepicker v-model="karyawan.dob" :enable-time-picker="false" :format="format" :previewFormat="format"  />
                    
                </div>
            </div>
            <div>
                <label for="dep_id" class="block text-sm font-medium text-gray-700">Departemen</label>
                <div class="mt-1">
                    <select v-model="karyawan.dep_id" name="dep_id" id="dep_id" 
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option v-for="departemen in departemens" v-bind:value="departemen.id">
                            {{ departemen.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div>
                <label for="jabatan_id" class="block text-sm font-medium text-gray-700">Jabatan</label>
                <div class="mt-1">
                    <select v-model="karyawan.jabatan_id" name="jabatan_id" id="jabatan_id" 
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option v-for="jabatan in jabatans" v-bind:value="jabatan.id">
                            {{ jabatan.name }}
                        </option>
                    </select>
                    
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Dokumen: {{ karyawan.filepath }}</label>
                <div class="mt-1">
                    <FileUpload  v-model="karyawan.doc_id" v-on:getId="handleId"></FileUpload>
                </div>
            </div>
        </div>
        <div class="flex mb-4 place-content-end">
            <button type="button" onclick="window.location='/karyawan'" class="mr-2 inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
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
       
       
import useKaryawan from '@/composables/karyawan'
import useDepartemen from '@/composables/departemen'
import useJabatan from '@/composables/jabatan'

import { onMounted } from 'vue';
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import FileUpload from "@/components/FileUploadComponent.vue";

const doc_id = ref(null)

const { errors, karyawan, updateKaryawan, getKaryawan } = useKaryawan()
const { departemens, getDepartemens } = useDepartemen()
const { jabatans, getJabatans } = useJabatan()


const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

const format = (date) => {
    const day = ('0' + (date.getDate())).slice(-2)  ;
    const month =  ('0' + (date.getMonth() + 1)).slice(-2);
    const year = date.getFullYear();

    return `${day}/${month}/${year}`;
}




onMounted(() => {
        getDepartemens()
        getJabatans()
        getKaryawan(props.id)
    }
)

const saveKaryawan = async () => {
    karyawan.value.doc_id = doc_id.value.value;
    await updateKaryawan(props.id)
}


</script>