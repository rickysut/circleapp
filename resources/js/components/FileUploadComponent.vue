<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- <div class="card-header">Silahkan upload file</div> -->
                    <div class="card-body">
                        
                        <form @submit="formSubmit" enctype="multipart/form-data">
                            <input type="file" name="file" class="form-control" v-on:change="onChange">
                            <button class="mt-1 py-2 px-4 text-sm font-medium text-white bg-cyan-700 rounded-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">Upload</button>
                        </form>
                        <div v-if="success != ''" class="alert alert-success">
                            {{success}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                name: '',
                file: '',
                success: '',
                docid: 0
            };
        },
        methods: {
            onChange(e) {
                
                this.file = e.target.files[0];
                this.success = '';
            },
            formSubmit(e) {
                e.preventDefault();
                this.success = '';
                this.docid = 0;
                let existingObj = this;
                let data = new FormData();
                data.append('file', this.file);
               
                axios.post('/upload', data)
                    .then(function (res) {
                        existingObj.success = res.data.success;
                        existingObj.docid = res.data.id;
                        existingObj.$emit('getId', res.data.id);
                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });
            }
        }
    }
</script>