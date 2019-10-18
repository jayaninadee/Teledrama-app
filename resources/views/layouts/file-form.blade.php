<div class="container is-fluid box">
    <div class="new-file">
        <form id="new-file-form" action="#" method="#" @submit.prevent="submitForm">
            <div class="field is-grouped">
                <p class="control is-expanded">
                    <input class="input" type="text" name="name" placeholder="Enter Name" v-model="fileName" required>
                </p>
                <div class="file is-info has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" ref="file" name="file" @change="addFile()">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fa fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Upload Image
                            </span>
                        </span>
                        <span class="file-name" v-if="attachment.name" v-html="attachment.name"></span>
                    </label>
                </div>
                <p class="control">
                    <button type="submit" class="button is-primary">
                        Add new
                    </button>
                </p>
            </div>
        </form>
    </div>
</div>
