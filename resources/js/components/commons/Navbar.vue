<template>

 <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-blue-400 mb-3">
  <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
    <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
      <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="/">
        Verto Image
      </a>
      <button class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button" v-on:click="toggleNavbar()">
          <i class="fas fa-bars"></i>
        </button>
    </div>
   <div>
       
      <ul class="flex flex-col lg:flex-row list-none ml-auto">
        
          <li class="nav-item">
            <a class="px-3 py-2 flex items-center text-xs font-bold leading-snug text-white hover:opacity-75" href="/" >
              Home
            </a>
          </li>
           <li class="nav-item">
            <a class="px-3 py-2 flex items-center text-xs font-bold leading-snug text-white hover:opacity-75" href="/medialibrary" >
              Media Library
            </a>
          </li>
          <li class="nav-item">
            <div class="shadow flex">
                <input class="w-full px-3 py-2 rounded p-2" type="text" placeholder="Search...">
                <button class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-300">
                    <a href="/" class="font-bold text-xs">Search</a>
                    
                    
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
        name: 'Navbar', 
         
 
}
</script>
