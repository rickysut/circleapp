import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useKaryawan() {
    const karyawans = ref([])
    const karyawan = ref([])

    const errors = ref('')
    const router = useRouter()

    const getKaryawans = async () => {
        let response = await axios.get('/api/karyawan')
        karyawans.value = response.data.data
        
    }

    const getKaryawan = async (id) => {
        let response = await axios.get(`/api/karyawan/${id}`)
        karyawan.value = response.data.data[0]
    }

    const storeKaryawan = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/karyawan', data)
            await router.push({ name: 'karyawan.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    const updateKaryawan = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/karyawan/${id}`, karyawan.value)
            await router.push({ name: 'karyawan.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const destroyKaryawan = async (id) => {
        await axios.delete(`/api/karyawan/${id}`)
    }

    return {
        errors,
        karyawans,
        karyawan,
        getKaryawans,
        getKaryawan,
        storeKaryawan,
        updateKaryawan,
        destroyKaryawan
    }
}