<template>
<div class="box box-default box-solid" :class="isReady ? 'box-primary' : 'box-default'">
    <div class="box-header with-border">
        <h3 class="box-title">Images</h3>
    </div>
    <div class="box-body">
        <form enctype="multipart/form-data" novalidate id="uploadform">
            <div class="dropbox text-center">
                <input type="file" multiple :name="uploadFieldName" :disabled="isSaving" @change="filesChange($event.target.name, $event.target.files); fileCount = $event.target.files.length" accept="image/*" class="input-file">

                <div v-if="isReady">
                    <p>
                    <i class='fa fa-2x fa-upload '></i><br />
                    Drag images here to upoad
                    </p>
                </div>

                <div v-if="isSaving">
                    <p>
                    <i class='fa fa-2x fa-spinner fa-spin '></i><br />
                    Uploading {{ fileCount }} files...
                    </p>
                </div>

                <div v-if="isFailed">
                    <p>
                    <i class='fa fa-2x fa-warning '></i><br />
                    Error: {{ uploadError }}
                    </p>
                </div>

            </div>
        </form>
    </div>
</div>
</template>



<!-- SASS styling -->
<style lang="scss">


.dropbox {
    outline: 2px dashed grey;
    /* the dash box */
    outline-offset: -10px;
    background: #445;
    color: #aab;
    padding: 0;
    min-height: 190px;
    /* minimum height */
    position: relative;
}

.input-file {
    opacity: 0;
    /* invisible but it's there! */
    width: 100%;
    height: 190px;
    position: absolute;
    cursor: pointer;
    margin: 0;
    padding: 10px;
}

.dropbox:hover {
    background: #222;
    color: #ddd;
    /* when mouse over to the drop zone, change color */
}

.dropbox p {
    font-size: 1.4em;
    text-align: center;
    padding: 60px 0 0 0;
}

/* Small Devices, Tablets */
@media only screen and (min-width : 768px) {
}

/* Medium Devices, Desktops */
@media only screen and (min-width : 992px) {
}

/* Large Devices, Wide Screens */
@media only screen and (min-width : 1200px) {

}

</style>

<script>

//Image Upload
function uploadImg(formData) {
    const url = '/admin/api/images/';
    return axios.post(url, formData)
        // get data
        .then(x => x.data)
        .catch (err => {
            throw(err);
        });
}

//State Machine Variables
const STATE_READY = "Ready",
      STATE_SAVING = "Saving Changes",
      STATE_LOADING = "Loading Images",
      STATE_FAILED = "Catastrophic Error"

//vue stuffs
export default {
    name: 'image-uploader',
    mounted() {
    },
    watch: {
    },
    computed: {
        isReady() {
            return this.currentState === STATE_READY;
        },
        isSaving() {
            return this.currentState === STATE_SAVING;
        },
        isFailed() {
            return this.currentState === STATE_FAILED;
        },
        isLoading() {
            return this.currentState === STATE_LOADING;
        },
    },
    props: [],
    data() {
        return {    
            uploadError: null,
            uploadFieldName: 'images[]',
            currentState: STATE_READY,
        }
    },
    methods: {
        saveImages(formData) {
            // upload data to the server
            this.currentState = STATE_SAVING;
            uploadImg(formData)
                .then(x => {
                    this.currentState = STATE_READY;
                    window.location = '/admin/images';
                })
                .catch(err => {
                    this.uploadError = "failed uploading, try again";
                    this.currentState = STATE_FAILED;
                });
        },
        filesChange(fieldName, fileList) {            
            if (!fileList.length) return;
            
            this.currentState = STATE_SAVING;

            // handle file changes
            const formData = new FormData();

            // append the files to FormData
            Array
                .from(Array(fileList.length).keys())
                .map(x => {
                    formData.append(fieldName, fileList[x], fileList[x].name);
                });
            
            // save it
            this.saveImages(formData);
            //required for chrome
            document.getElementById("uploadform").reset();
        }
    }
}


</script>