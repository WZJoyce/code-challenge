<template>
  <div id="home"> 
   <navbar v-on:childByValue="childByValue"></navbar>
     {{ $page.props.data }}

<vue-flex-waterfall
  col="4"
  col-spacing="15"
  :break-at="{ 900: 3, 600: 2, 300: 1 }"
   :break-by-container="false">
    
    <ul v-for="item in imagesList">
    <div>
     <showcard  v-if="imagesList.length != 0" v-bind:ref-message="item.urls.small"></showcard> 
    </div>
    </ul>
 
</vue-flex-waterfall>


  </div>
</template>

<script>
  import  Navbar from '@/components/commons/Navbar'
  import Showcard from '@/components/commons/Showcard'
  import VueFlexWaterfall from 'vue-flex-waterfall'
  export default {
    name: 'home',  
    components: {
       Navbar,
       Showcard,
       VueFlexWaterfall
       
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
     
 
    }
    
  }
</script>
