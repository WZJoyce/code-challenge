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
        /*loadMore:function(){
        let clientId= 'tvJ-esl73ynCGpWVq6-93PUBa1Ne80NlCMqEp140-3w';
         let message = this.message;
         let page=this.totalPage;
         var that = this;
         let perPage=30;
         if(this.totalPage==1 || this.noResults==true)
         {
           return
         }
         this.page++;
         axios.get('https://api.unsplash.com/search/photos?client_id='+clientId+'&page='+this.page+'&per_page='+perPage+'&query='+message).then(
           function(response){
              that.imagesList=response.data.results;
           }
         ).catch(function(err){})
          
          
       },*/
       /*scroll:function(){
         let clientId= 'tvJ-esl73ynCGpWVq6-93PUBa1Ne80NlCMqEp140-3w';
         let message = this.message;
         //let page=this.totalPage;
         var that = this;
         let perPage=30;
          if(this.totalPage==1 || this.noResults==true ||this.page !=this.totalPage)
         {
           return
         }
         this.page++;
        window.onscroll = () => {
        // 距离底部200px时加载一次
        let isLoading=false
        let bottomOfWindow = document.documentElement.offsetHeight - document.documentElement.scrollTop - window.innerHeight <= 200
        if (bottomOfWindow && isLoading == false) {
          isLoading = true
          axios.get('https://api.unsplash.com/search/photos?client_id='+clientId+'&page='+this.page+'&per_page='+perPage+'&query='+message).then(response => {
           that.imagesList=response.data.results;
            isLoading = false;
             this.$emit('childByPage', that.page);
             this.$emit('childByPage', that.imagesList);
             console.log("try");
          }).catch(function(err){})
        }
      }
    },
    mounted() {
    this.scroll();
    console.log("try1");
  }*/
  /*lazyLoading () {

         let clientId= 'tvJ-esl73ynCGpWVq6-93PUBa1Ne80NlCMqEp140-3w';
         let message = this.message;
         //let page=this.totalPage;
         var that = this;
         let perPage=30;
         
     // scroll and load
            let scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            let clientHeight = document.documentElement.clientHeight;
            let scrollHeight = document.documentElement.scrollHeight;
            if (scrollTop + clientHeight >= scrollHeight) { // scroll to bottom
                //event
                 if(this.totalPage==1 || this.noResults==true ||this.page !=this.totalPage)
              {
                return
              }
                this.page++;
                console.log("alert")
                 axios.get('https://api.unsplash.com/search/photos?client_id='+clientId+'&page='+this.page+'&per_page='+perPage+'&query='+message).then(response => {
                 that.imagesList=response.data.results;
                  isLoading = false;
                   console.log("try1");
                  this.$emit('childByPage', that.imagesList);
             
          }).catch(function(err){})
                
            }
        }
    },
    mounted()
    {
     
        window.addEventListener('scroll', this.lazyLoading); // after scrolling, loading
        
    }  */      
 
}
</script>
