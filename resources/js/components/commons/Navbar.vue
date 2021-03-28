<template>

 <nav class=" relative flex flex-wrap items-center justify-between px-2 py-3 bg-gray-800
 mb-3">
  <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
    <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">   
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
                <input class="w-full px-3 py-2 rounded p-2" type="text" placeholder="Search..."  v-model="message" @keyup.enter="searchImages">
                
               
                <button class="bg-white w-auto flex justify-end items-center text-gray-800 rounded p-2 hover:text-gray-400" @click="childClick ">
                    <a class="font-bold text-xs ">Search</a>    
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
        data(){
          return {
            message:'', 
            page:1,
            imagesList:[],
            totalPage :0,
            noResults:false,
            
         
          }
        },
        methods: {
         childClick () {
        // childByValue是在父组件on监听的方法
        // 第二个参数this.childValue是需要传的值
  
        var that=this;
        
        console.log(this.totalPage);
         console.log(this.imagesList);
        this.$emit('childByValue', that.imagesList);
        console.log("3");
       
      },
       searchImages:function(){
         let clientId= 'tvJ-esl73ynCGpWVq6-93PUBa1Ne80NlCMqEp140-3w';
         let message = this.message;
         let page=1;
         var that = this;
         let perPage=30;
          console.log(this.totalPage);
          axios.get('https://api.unsplash.com/search/photos?client_id='+clientId+'&page='+page+'&per_page='+perPage+'&query='+message).
          then(
           function(response){
             that.imagesList=response.data.results;
            that.totalPage = response.data.total_pages;
            if(that.totalPage === 0)
            {
                 that.noResults = true;
                 return;
            }
             console.log("b");
             
             
           }
         ).catch(function(err){})
         console.log("2");
         },
           
 
   }
} 
</script>
