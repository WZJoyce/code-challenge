<template>
  <div
    class="image-container dark:bg-gray-800"
    :class="{
      'border-green-800 border-2 rounded': tem && home,
    }"
  >
    <enlargeable-image
      class="object-cover w-full h-auto"
      :src="refMessage"
      :src_large="refMessagefull"
    />

    <div class="px-2 border-b border-black" v-if="des">
      <p :des="des" class="font-serif font-normal">{{ des }}</p>
    </div>
    <div class="flex items-center justify-between px-4 py-2 bg-white">
      <button
        class="px-2 py-1  text-gray-900 transition-colors duration-200 transform bg-white rounded hover:bg-blue-200 focus:bg-blue-300 focus:outline-none"
        @click.stop="editClick"
      >
        Edit
      </button>
      
      <button
        class="px-2 py-1  text-gray-900 transition-colors duration-200 transform bg-white rounded hover:bg-blue-200 focus:bg-blue-300 focus:outline-none"
        @click="destroyImages"
        v-if="btnDelete == 1"
      >
        Delete
      </button>
    </div>
    <div class="px-4 py-2 items-center">
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form @submit.prevent="imageSave" v-show="open">
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2"></div>
              </div>

              <div>
                <div class="mt-1">
                  <textarea
                    id="message"
                    name="message"
                    v-model="description"
                    rows="3"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                    placeholder="Text"
                  ></textarea>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button
                class="px-2 py-1  text-gray-900 transition-colors duration-200 transform bg-white rounded hover:bg-blue-200 focus:bg-blue-300 focus:outline-none"
              >
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Modal from "@burhanahmeed/vue-modal-2";
import EnlargeableImage from "@/components/commons/EnlargeableImage";
export default {
  name: "Showcard",
  props: {
    revealEdit: Boolean,
    showImage: String,
    searchMassege: String,
    refMessage: String,
    refMessagefull: String,
    revealBar: Boolean,
    id: String,
    description: String,
    des: String,
    isborder: Boolean,
    btnDelete: String,
    home: Boolean,
  },
  
  components: {
    Modal,
    EnlargeableImage,
  },
  created() {
    this.highlightImages();
  },
  data() {
    return {
      open: false,
      tem: false,
    };
  },
  methods: {
    //the edit area shows after clicking edit button
    editClick() {
      this.open = !this.open;
    },
    //save a image to the media library
    imageSave() {
      var vm = this;
      this.open = !this.open;
      console.log("description-----" + vm.description);
      if (vm.description == null) {
        console.log("description55-----" + vm.description);
        axios
          .post(this.$page.props.image, {
            id: vm.id,
            url: vm.refMessage,
            urlfull: vm.refMessagefull,
          })
          .then(function(response) {
            console.log("save sucess");
            vm.tem = true;
            vm.des = vm.description;
            vm.description = null;
          })
          .catch((err) => console.error(err));
      } else {
        // axios post to backend
        axios
          .post(this.$page.props.image, {
            id: vm.id,
            description: vm.description,
            url: vm.refMessage,
            urlfull: vm.refMessagefull,
          })
          .then(function(response) {
            console.log("save sucess");
            vm.tem = true;
            vm.des = vm.description;
            vm.description = null;
          })
          .catch((err) => console.error(err));
      }
    },
    //delete a image in the media library
    destroyImages: function() {
      var vm = this;
      let url = this.$page.props.imageDestroy.replace(":id", vm.id);
      axios
        .delete(url)
        .then(function(response) {
          location.reload();
        })
        .catch((err) => console.error(err.response));
    },
    //highlight images if they are in the media library
    highlightImages: function() {
      var vm = this;
      let url = this.$page.props.imageHighlight.replace(":id", vm.id);
      axios
        .get(url)
        .then(function(response) {
          if (response.data) {
            //add border and description
            vm.tem = true;
            vm.des=response.data.description;
          }
        })
        .catch((err) => console.error(err));
    },
  },
};
</script>

<style scoped>
  .image-container {
    @apply max-w-xs mx-auto overflow-hidden bg-white rounded-lg shadow-lg mt-4
  }
</style>