<template>
    
</template>
<script>
import Showcard from '@/components/commons/Showcard'
export default {
    name:'Scrollmore',
    methods:{
        scroll(){

        },
        loadMore:function(){
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
          
          
       },
       
    }
    
}
</script>