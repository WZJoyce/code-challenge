<template>
  <nav
    class=" relative flex flex-wrap items-center justify-between px-2 py-3 bg-white
 mb-3"
  >
    <div
      class="container px-4 mx-auto flex flex-wrap items-center justify-between"
    >
      <div
        class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start"
      ></div>
      <div>
        <ul class="flex flex-col lg:flex-row list-none ml-auto">
          <li class="nav-item">
            <a
              class="px-3 py-2 flex items-center text-xs font-bold leading-snug text-gray-800 hover:text-gray-400"
              href="/home"
            >
              Home
            </a>
          </li>
          <li class="nav-item">
            <a
              class="px-3 py-2 flex items-center text-xs font-bold leading-snug text-gray-800 hover:text-gray-400"
              href="/medialibrary" 
            >
           
              Media Library
            
            </a>
          </li>
          <li class="nav-item">
            <div class="shadow flex">
              <input
                class="w-full px-3 py-2 rounded p-2"
                type="text"
                placeholder="Search..."
                v-model="search"
                @keyup.enter="searchImages"
              />

              <button
                class="bg-white w-auto flex justify-end items-center text-gray-800 rounded p-2 hover:text-gray-400"
                @click="searchImages"
              >
                <a class="font-bold text-xs">Search</a>
              </button>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
  data() {
    return {
      search: "",
    };
  },
  methods: {
    searchImages() {
      this.$emit('search', this.search)
    }
  },
};
</script>
