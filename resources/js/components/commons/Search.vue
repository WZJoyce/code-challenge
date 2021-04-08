<template>
  <div id="Search">
  
    <div class="shadow flex " style="margin: auto; width: 50%; margin-top: 10rem;">
      
      <input
        class="w-full px-3 py-2  border-black border-1 border-opacity-20"
        type="text"
        placeholder="Search..."
        v-model="message"
        @keyup.enter="searchImages"/>
      
      <button
        class="bg-white hover:bg-white w-auto flex justify-end items-center text-gray-800  p-2 hover:text-gray-400"
        @click="searchImages"
      >
         <a class="font-bold text-xs" >Search</a>
      </button>
     
    </div>
 
  </div>
</template>

<script>

export default {
 
  name: "Search",
  
 
  data() {
    return {
      message: "",
    };
  },
  methods: {
    //pass data to the home page
    searchImages() {
      this.$emit("search", this.message);
    },
  },
 
}
</script>