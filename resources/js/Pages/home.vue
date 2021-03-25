<template>
  <div id="home"> 
    <navbar/>
     {{ $page.props.data }}
   
   
    
  </div>
</template>

<script>
  import  Navbar from '@/components/commons/Navbar'
  export default {
    name: 'home',
    components: {
       Navbar
    }
    
  }
</script>