import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useDokumen() {
    const dokumens = ref([])
    const dokumen = ref([])

    const errors = ref('')
    const router = useRouter()

    const getDokumens = async () => {
        let response = await axios.get('/api/dokumen')
        dokumens.value = response.data.data
    }

    const getDokumen = async (id) => {
        let response = await axios.get(`/api/dokumen/${id}`)
        dokumen.value = response.data.data
    }

    const storeDokumen = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/dokumen', data)
            await router.push({ name: 'dokumen.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    const updateDokumen = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/dokumen/${id}`, dokumen.value)
            await router.push({ name: 'dokumen.index' })
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const destroyDokumen = async (id) => {
        await axios.delete(`/api/dokumen/${id}`)
    }

    return {
        errors,
        dokumens,
        dokumen,
        getDokumens,
        getDokumen,
        storeDokumen,
        updateDokumen,
        destroyDokumen
    }
}