<template>
  <div
    class="max-w-xs mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800"
  >
    <img class="object-cover w-full h-auto mt-2" v-bind:src="refMessage" />

    <div class="flex items-center justify-between px-4 py-2 bg-white">
      <button
        class="px-2 py-1  text-gray-900 transition-colors duration-200 transform bg-white rounded hover:bg-blue-200 focus:bg-blue-300 focus:outline-none"
        @click.stop="editClick"
      >
        Edit
      </button>
      <button
        class="px-2 py-1  text-gray-900 transition-colors duration-200 transform bg-white rounded hover:bg-blue-200 focus:bg-blue-300 focus:outline-none"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="-2 -4 24 24"
          width="24"
          height="24"
          preserveAspectRatio="xMinYMin"
          class="icon__icon"
        >
          <path
            d="M17 4H9.415l-.471-1.334A1.001 1.001 0 0 0 8 2H3a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-6.17-2H17a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3V3a3 3 0 0 1 3-3h5c1.306 0 2.417.835 2.83 2z"
          ></path>
        </svg>
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
export default {
  name: "Showcard",
  props: {
    revealEdit: Boolean,
    showImage: String,
    searchMassege: String,
    refMessage: String,
    revealBar: Boolean,
    id: String,
    description: String,
  },
  components: {
    Modal,
  },
  data() {
    return {
      open: false,
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
      console.log("des   " + vm.description);
    
      axios.post(this.$page.props.image, 
       { id: vm.id,
        description: vm.description,
        url: vm.refMessage,})
        .then(function(response) {
          console.log("success");
          vm.description='';
          
        })
        .catch((err) => console.error(err));
    },
  },
};
</script>
