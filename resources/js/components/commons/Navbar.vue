<template>
  <main>
    <header>
      <nav
        class=" relative flex flex-wrap items-center justify-between px-2 pt-3 bg-white
 mb-3"
      >
        <div
          class="container px-4 mx-auto flex flex-wrap items-center justify-between"
        >
          <div
            class="relative flex justify-between w-0 md:w-0 sm:w-0 px-4 lg:static lg:w-1/6 xl:w-1/6 2xl:w-1/6 lg:block lg:justify-start"
          >
          <img src="http://192.168.10.10/storage/logo.JPG" class="rounded h-auto align-middle border-none">
          </div>
          <div>
            <ul class="flex flex-col lg:flex-row list-none ml-auto">
            
              <li class="nav-item">
                <inertia-link
                  class="px-3 py-2 flex items-center text-xs font-bold leading-snug text-gray-800 hover:text-gray-400"
                  href="'/home?query='+search"
                >
                  Home
                </inertia-link>
              </li>
              <li class="nav-item">
                <inertia-link
                  class="px-3 py-2 flex items-center text-xs font-bold leading-snug text-gray-800 hover:text-gray-400"
                  href="/medialibrary"
                >
                  Media Library
                </inertia-link>
              </li>
              <li class="nav-item">
                <div class="shadow flex">
                  <input
                    class="w-full px-3 py-2 rounded p-2"
                    type="text"
                    placeholder="Search..."
                    v-model="search"
                  
                  />

                  <button
                    class="bg-white w-auto flex justify-end items-center text-gray-800 rounded p-2 hover:text-gray-400"
                   
                  >
                    <inertia-link :href="'/home?query='+search" class="font-bold text-xs">Search</inertia-link>
                  </button>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <slot />
  
  </main>
</template>

<script>

export default {
  name: "Navbar",
  props: {
    searchBar: Boolean,
  },
  components:{
    
  },
  data() {
    return {
      search: "",
    };
  },
  methods: {
    //pass data to the home page
    searchImages() {
      this.$page.props.search = {
        click: true,
        data: this.search
      }
    },
  },
};
</script>
