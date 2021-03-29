<template>
  <div id="home"> 
   <navbar v-on:childByValue="childByValue"></navbar>
     {{ $page.props.data }}


<waterfall :line-gap="300" :watch="imagesList" :align ="center" :min-line-gap ="200" :max-line-gap="300">
  <!-- each component is wrapped by a waterfall slot -->
  <waterfall-slot  
    v-for="(item, index) in imagesList"
    :width="item.width"
    :height="item.height"
    :order="index"
    :key="item.id"
  >
    <showcard v-bind:reveal-edit="false" v-bind:reveal-bar="false" v-if="imagesList.length != 0" v-bind:ref-message="item.urls.small"></showcard> 
  </waterfall-slot>
</waterfall>


  </div>
</template>

<script>
  import  Navbar from '@/components/commons/Navbar'
  import Showcard from '@/components/commons/Showcard'
  import Waterfall from 'vue-waterfall/lib/waterfall'
import WaterfallSlot from 'vue-waterfall/lib/waterfall-slot'
  export default {
    name: 'home',  
    components: {
       Navbar,
       Showcard,
       Waterfall,
    WaterfallSlot 
       
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
