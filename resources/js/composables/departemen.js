import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useDepartemen() {
    const departemens = ref([])
    const departemen = ref([])

    const errors = ref('')
    const router = useRouter()

    const getDepartemens = async () => {
        let response = await axios.get('/api/departemen')
        departemens.value = response.data.data
    }

    const getDepartemen = async (id) => {
        let response = await axios.get(`/api/departemen/${id}`)
        departemen.value = response.data.data
    }

    const storeDepartemen = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/departemen', data)
            await router.push({ name: 'departemen.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    const updateDepartemen = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/departemen/${id}`, departemen.value)
            await router.push({ name: 'departemen.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const destroyDepartemen = async (id) => {
        await axios.delete(`/api/departemen/${id}`)
    }

    return {
        errors,
        departemens,
        departemen,
        getDepartemens,
        getDepartemen,
        storeDepartemen,
        updateDepartemen,
        destroyDepartemen
    }
}