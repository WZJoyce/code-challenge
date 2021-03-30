<template>
<div class="inline-flex items-center">
  <button class="bg-white w-auto flex justify-end items-center text-gray-800 rounded p-2 hover:text-gray-400 rounded-l" @click= "firstpage">
    First
  </button>
  <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 "  @click= "prepage">
    Prev
  </button>
  <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 " @click= "nextpage"> 
    Next
  </button>
  <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r" @click= "lastpage">
    Last
  </button>
</div>
    
</template>
<script>
 export default {
    name: 'Prenext',
    methods:{
      firstpage: function () {
        
      },
      prepage:function(){

      },
      nextpage:function(){

      },
      lastpage:function(){

      }

    }
    
 }
</script>