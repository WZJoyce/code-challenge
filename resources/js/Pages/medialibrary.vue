<template>
  <div id="medialibrary"> 
    <navbar/>
     {{ $page.props.data }}
   
   
    
  </div>
</template>


<script>
  import  Navbar from '@/components/commons/Navbar'
  export default {
    name: 'medialibrary',
    components: {
       Navbar
    }
    
  }
</script>