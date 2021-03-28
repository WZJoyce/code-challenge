<template>
  <div id="medialibrary"> 
    <navbar/>
     {{ $page.props.data }}
     <showcard v-bind:reveal-edit="true"></showcard>
   
   
    
  </div>
</template>


<script>
  import  Navbar from '@/components/commons/Navbar'
  import  Showcard from '@/components/commons/Showcard'
  export default {
    name: 'medialibrary',
    components: {
       Navbar,
       Showcard
    }
    
  }
</script>