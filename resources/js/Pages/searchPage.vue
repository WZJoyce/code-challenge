<template>
  <div id="searchPage">
  <div class="space-y-3" >
    <span class="block">
      <img src="http://192.168.10.10/storage/logo2.jpeg" class="rounded border-none"  style="margin: auto; width: 35%; margin-top: 0rem;">
   </span>
    <span class="block">
    <div
      class="shadow flex "
      style="margin: auto; width: 35%;"
    >
      <input
        class="w-full px-3 py-2  border-black border-1 border-opacity-30"
        type="text"
        placeholder="Search..."
        v-model="message"
      />

      <button
        class="bg-white hover:bg-white w-auto flex justify-end items-center text-gray-800  p-2 hover:text-gray-400"
      >
        <a class="font-bold text-xs" :href="'/home?query='+message">Search</a>
      </button>
    </div>
    </span>
    </div>
  </div>
</template>

<script>
export default {
  name: "searchPage",
 

  data() {
    return {
      data: 3,
      message: "",
    };
  },
};
</script>
