<template>
  <div id="searchImage"> 
    <navbar/>
     {{ $page.props.data }}
    <Showcard/>
   
   
    
  </div>
</template>

<script>
  import  Navbar from '@/components/commons/Navbar'
  import ImageCard from '@/components/commons/Showcard';
  export default {
    name: 'searchImage',
    components: {
       Navbar,
       Showcard
    }
    
  }
</script>