<template>
  <div class="max-w-xs mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800" :style="styleImages()" >
   
    <enlargeable-image
      class="object-cover w-full h-auto mt-2"
      v-bind:src="refMessage"
      v-bind:src_large="refMessagefull"
    />

    <div class="px-2 border-b border-black" v-if="des">
      <p v-bind:des="des" class="font-serif font-normal">{{ des }}</p>
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
        @click="destroyImages" v-if="btnDelete==1"
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
    fresh: Boolean,
    border:Boolean,
    btnDelete:String,
    tem:Promise,
    
  },
  components: {
    Modal,
    EnlargeableImage,
  },
  data() {
    return {
      open: false,
      styleObject:{ },
      
    };
  },
  methods: {
    editClick() {
      this.open = !this.open;
    },
    imageSave() {
      var vm = this;
      this.open = !this.open;
      // axios post to backend
      console.log("id----" + vm.id);
      console.log("url----" + vm.refMessage);
      console.log("urlfull----" + vm.refMessagefull);

      console.log("des   " + vm.description);

      axios
        .post(this.$page.props.image, {
          id: vm.id,
          description: vm.description,
          url: vm.refMessage,
          urlfull: vm.refMessagefull,
        })
        .then(function(response) {
          console.log("success");
          vm.description = "";
          console.log("fresh", vm.fresh);
          if (vm.fresh == true) {
            location.reload();
          }
        })
        .catch((err) => console.error(err));
    },
    /* updateImages:function(){
      var vm = this;
      axios.put(this.$page.props.imageUpdate,  { id: vm.id,
        description: vm.description,
        url: vm.refMessage,})
      .then(function(response){
        console.log(response);
        if(response==false){
          console.log("new");
          vm.imageSave();
        }
       console.log("update descrption ", vm.id);
      })
      .catch(err => console.error(err));

    },*/
    destroyImages: function() {
      var vm = this;
      let url = this.$page.props.imageDestroy.replace(":id", vm.id);
      console.log(url);
      axios
        .delete(url)
        .then(function(response) {
          console.log("delete id ");
          location.reload();
        })
        .catch((err) => console.error(err.response));
    },
    styleImages:function(){
      if (this.border==true){
        this.styleObject={ border: '1px solid green'};
        console.log("border----------", this.border);
       
      } 
      console.log("border----------false", this.border);
         return this.styleObject;

    }
 
   
  },
};
</script>

>