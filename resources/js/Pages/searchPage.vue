<template>
  <div id="searchPage">
  
    <div class="shadow flex " style="margin: auto; width: 50%; margin-top: 10rem;">
      
      <input
        class="w-full px-3 py-2  border-black border-1 border-opacity-20"

        type="text"
        placeholder="Search..."
        v-model="search"
        @keyup.enter="searchImages"
      />
       
      <button
        class="bg-white w-auto flex justify-end items-center text-gray-800 rounded p-2 hover:text-gray-400"
        @click="searchImages"
      >
        
        <a href="/home" class="font-bold text-xs" >Search</a>
      </button>
     
    </div>
 
  </div>
</template>

<script>
export default {
  name: "searchPage",
  data() {
    return {
      search: "",
    };
  },
  methods: {
    searchImages() {
      this.$emit("search", this.search);
      console.log("search", this.search)
    },
  },
};
</script>
