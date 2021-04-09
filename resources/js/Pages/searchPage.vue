<template>
  <div id="searchPage">
    <div
      class="shadow flex "
      style="margin: auto; width: 50%; margin-top: 10rem;"
    >
      <input
        class="w-full px-3 py-2  border-black border-1 border-opacity-20"
        type="text"
        placeholder="Search..."
        v-model="message"
      />

      <button
        class="bg-white hover:bg-white w-auto flex justify-end items-center text-gray-800  p-2 hover:text-gray-400"
      >
        <a class="font-bold text-xs" :href="'/home?data=' + message">Search</a>
      </button>
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
