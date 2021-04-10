<template>
  <div
    class="image-container dark:bg-gray-800"
    :class="{
      'border-green-800 border-2 rounded': tem && home,
    }"
  >
    <enlargeable-image
      class="image-enlarge"
      :src="refMessage"
      :src_large="refMessagefull"
    />

    <div class="px-2 border-b border-black" v-if="title">
      <p class="showcard-font">{{ titleshow }}</p>
    </div>

    <div class="form-container">
      <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="flex items-center justify-between px-4 py-2 bg-white">
          <button
            class="px-2 py-1  text-gray-900 transition-colors duration-200 transform bg-white rounded hover:bg-blue-200 focus:bg-blue-300 focus:outline-none"
            @click.stop="editClick"
          >
           <p class="showcard-font">Edit</p>
          </button>
          <button
            class="px-2 py-1  text-gray-900 transition-colors duration-200 transform bg-white rounded hover:bg-blue-200 focus:bg-blue-300 focus:outline-none"
            @click="imageSave">
           <p class="showcard-font">Save</p>
          </button>

          <button
            class="px-2 py-1  text-gray-900 transition-colors duration-200 transform bg-white rounded hover:bg-blue-200 focus:bg-blue-300 focus:outline-none"
            @click="destroyImages"
            v-if="btnDelete == 1"
          >
           <p class="showcard-font">Delete</p>
          </button>
        </div>
        <div class="shadow sm:rounded-md sm:overflow-hidden" v-show="open">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
           <span class="block">
             <p class="showcard-font">Title</p>
             <textarea  type = "number"
    maxlength = "40" rows="2"   v-model.lazy="title" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md resize-none">{{title}}</textarea>
           </span>
           <span class="block">
             <p class="showcard-font">Description</p>
                <textarea
                  v-model.lazy="description"
                  rows="3"
                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                  >{{ description }}</textarea>
           </span>
              
            </div>
          </div>
        </div>
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
    des: String,
    tit:String,
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
    this.title=this.tit;
    this.description=this.des;
  },
  data() {
    return {
      open: false,
      tem: false,
      title: '',
      description: '',
      titleshow: '',

    };
  },
  methods: {
    //the edit area shows after clicking edit button
    editClick() {
      this.open = !this.open;
      console.log("this.open:  ", this.open);
    },
    //save a image to the media library
    imageSave() {
      var vm = this;
      this.open = false;
      axios
          .post(this.$page.props.image, {
            id: vm.id,
            title: vm.title,
            description: vm.description,
            url: vm.refMessage,
            urlfull: vm.refMessagefull,
          })
          .then(function(response) {
            console.log("save sucess");
            vm.tem = true;
            vm.titleshow = vm.title
          })
          .catch((err) => console.error(err));
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
            vm.title = response.data.title;
            vm.description = response.data.description;
            vm.titleshow = response.data.title;
            console.log("tit---", vm.tit);
            console.log("des----", vm.des);
          }
        })
        .catch((err) => console.error(err));
    },
  },
};
</script>

<style scoped>
.image-container {
  @apply max-w-xs mx-auto overflow-hidden bg-white rounded-lg shadow-lg mt-4;
}
.image-enlarge {
  @apply object-cover w-full h-auto
}

.showcard-font{
  @apply font-serif font-normal
}
.form-container{
   @apply px-4 py-2 items-center
}



</style>
