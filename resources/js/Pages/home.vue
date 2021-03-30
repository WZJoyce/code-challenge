<template>
  <div id="home"> 
  
   <navbar v-on:childByValue="childByValue"></navbar>
     {{ $page.props.data }}
   

<vue-flex-waterfall
  col="4"
  col-spacing="15"
  :break-at="{1325: 3, 990: 2, 655: 1 }"
   :break-by-container="true">
    <ul v-for="item in imagesList">
    
     <showcard  v-if="imagesList.length != 0" v-bind:ref-message="item.urls.small"></showcard> 
    
    </ul> 
 </vue-flex-waterfall>
 
 <prenext></prenext>
  
  </div>
</template>

<script>
  import  Navbar from '@/components/commons/Navbar'
  import Showcard from '@/components/commons/Showcard'
  import VueFlexWaterfall from '@/components/commons/Waterfall'
  import Prenext from '@/components/commons/Prenext'
  export default {
    name: 'home',  
    components: {
       Navbar,
       Showcard,
       VueFlexWaterfall,
       Prenext,
       
    },
    data(){
      return {
        imagesList:[],
        //page:1,
      }
    },
   
    methods:{
       childByValue: function (imagesList) {
        // navbar give the value to childValue 
        this.imagesList = imagesList
        console.log(imagesList)
      },
     
 
    }
    
  }
</script>
