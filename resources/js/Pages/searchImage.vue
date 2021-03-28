<template>
  <div id="searchImage"> 
    <navbar/>
     {{ $page.props.data }}
    <showcard v-bind:reveal-edit="false" ></showcard>  
  </div>
</template>

<script>
  import  Navbar from '@/components/commons/Navbar'
  import Showcard from '@/components/commons/Showcard'
  export default {
    name: 'searchImage',
   
    components: {
       Navbar,
       Showcard
    }
    
  }
</script>