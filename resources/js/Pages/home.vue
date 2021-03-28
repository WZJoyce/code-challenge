<template>
  <div id="home"> 
   <navbar v-on:childByValue="childByValue"></navbar>
     {{ $page.props.data }}
     <div class="grid grid-cols-1 md:grid-cols-3 grid-flow-row gap-4">
      <ul v-for="item in imagesList">
      <div>
     <showcard v-bind:reveal-edit="false" v-if="imagesList.length != 0" v-bind:ref-message="item.urls.small"></showcard> 
    </div>
    </ul>

     
      
     

      
    </div>
  </div>
</template>

<script>
  import  Navbar from '@/components/commons/Navbar'
  import Showcard from '@/components/commons/Showcard'
  export default {
    name: 'home',  
    components: {
       Navbar,
       Showcard
    },
    data(){
      return {
        imagesList:[],
        //page:1,
      }
    },
    methods:{
       childByValue: function (imagesList) {
        // childValue就是子组件传过来的值
        this.imagesList = imagesList
        console.log(imagesList)
      },
     /* childByPage:function(page){
        this.page=page;
        console.log(page)
      }*/

    }
    
  }
</script>
