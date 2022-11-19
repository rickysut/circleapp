import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useJabatan() {
    const jabatans = ref([])
    const jabatan = ref([])

    const errors = ref('')
    const router = useRouter()

    const getJabatans = async () => {
        let response = await axios.get('/api/jabatan')
        jabatans.value = response.data.data
    }

    const getJabatan = async (id) => {
        let response = await axios.get(`/api/jabatan/${id}`)
        jabatan.value = response.data.data[0]
    }

    const storeJabatan = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/jabatan', data)
            await router.push({ name: 'jabatan.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    const updateJabatan = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/jabatan/${id}`, jabatan.value)
            await router.push({ name: 'jabatan.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const destroyJabatan = async (id) => {
        await axios.delete(`/api/jabatan/${id}`)
    }

    return {
        errors,
        jabatans,
        jabatan,
        getJabatans,
        getJabatan,
        storeJabatan,
        updateJabatan,
        destroyJabatan
    }
}