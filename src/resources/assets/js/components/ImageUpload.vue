<template>
	<div v-if="show" class="modal">
		<div class="modal-content">
			<h1>Upload a image</h1>
			<header class="tab-header">
				<div :class="{ active: tab == 0 }" @click="tab = 0;">
					Upload a file by clicking below or dragging and dropping the image.
				</div>
			</header>
			<div v-if="tab == 0">
				<vue-dropzone
					id="dropzone"
					ref="myVueDropzone"
					:options="dropzoneOptions"
					@vdropzone-success="vfileUploaded"
				/>
			</div>

			<footer class="modal-footer">
				<button
					class="btn btn-primary"
					:title="validImage ? '' : 'Image URL needs to be valid'"
					:disabled="!validImage"
					@click="insertImage"
				>
					Add Image
				</button>
				<button class="btn btn-danger" @click="show = false;">
					Close
				</button>
			</footer>
		</div>
	</div>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
import axios from "axios";

export default {
  components: {
    vueDropzone: vue2Dropzone
  },
  data() {
    return {
      imageSrc: "",
      command: null,
      show: false,
      tab: 0,
      dropzoneOptions: {
        url: "/admin/pages/image-upload",
        thumbnailWidth: 200,
        dictDefaultMessage: "Click to browse or drag and drop your image."
      }
    };
  },
  computed: {
    validImage() {
      return (
        this.imageSrc.match(/unsplash/) !== null ||
        this.imageSrc.match(/\.(jpeg|jpg|gif|png)$/) != null
      );
    }
  },
  methods: {
    showModal(command) {
      // Add the sent command
      this.command = command;
      this.show = true;
    },
    vfileUploaded(file, response) {
        /** Here is where you get your URL/Base64 string or what ever.*/
        console.log(response);
        this.imageSrc = response;
    },

    fileChange(e) {
      const file = this.$refs.file.files[0];
      const uploadUrl = `/admin/pages/image-upload`;
      let formData = new FormData();

      formData.append("file", this.file);


      axios.post(uploadUrl).then(data => {
        // Take the URL/Base64 from `data` returned from server

        this.imageSrc = "https://source.unsplash.com/random/400x100";
      });
    },
    insertImage() {
      const data = {
        command: this.command,
        data: {
          src: this.imageSrc
          // alt: "YOU CAN ADD ALT",
          // title: "YOU CAN ADD TITLE"
        }
      };

      this.$emit("onConfirm", data);
      this.closeModal();
    },

    closeModal() {
      this.show = false;
      this.imageSrc = "";
      this.tab = 1;
    }
  }
};
</script>

<style scoped>
.modal {
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  width: 90%;
  background-color: #fff;
  padding: 30px;
  border-radius: 8px;
}

.modal-footer {
  margin-top: 10px;
}

label {
  display: block;
  margin: 0.25em 0;
}

button {
  font-family: inherit;
  font-size: 100%;
  padding: 0.5em 1em;
  color: white;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
  border: 1px solid #999;
  border: transparent;
  background-color: #e6e6e6;
  text-decoration: none;
  border-radius: 2px;
  cursor: pointer;
}

button.danger {
  background: rgb(202, 60, 60);
}

button.success {
  background: rgb(28, 184, 65);
}

button:disabled {
  opacity: 0.3;
}

button + button {
  margin-left: 10px;
}

.tab-header {
  display: flex;
  align-items: center;
  border-bottom: 1px solid #222;
}

.tab-header button {
  color: #222;
  background: none;
  border: 0;
  flex: 1;
  padding: 5px 10px;
  cursor: pointer;
}

.tab-header button.active {
  background-color: #222;
  color: #fff;
}
</style>
