<template>

  <div id="mediaLibrary">
  
    <navbar :searchBar=false ></navbar>
    <div>
    <circlespinner v-if="isLoading == true"></circlespinner>
  </div>
      <vue-flex-waterfall
      col="4"
      col-spacing="15"
      :break-at="{ 1327: 3, 990: 2, 655: 1 }"
      :break-by-container="true"
    >
      <ul v-if="imagesList.length != 0" v-for="item in imagesList">
        <showcard  v-bind:fresh = true
          v-bind:ref-message="item[2]" v-bind:id="item[0]" v-bind:des="item[1]" v-bind:ref-messagefull="item[3]"
      btnDelete="1" ></showcard>
      </ul>
    </vue-flex-waterfall>
   </div>
</template>

<script>
import Navbar from "@/components/commons/Navbar";
import Showcard from "@/components/commons/Showcard";
import VueFlexWaterfall from "@/components/commons/Waterfall";
import Prenext from "@/components/commons/Prenext";
import Circlespinner  from '@/components/commons/Circlespinner';
export default {
  name: "mediaLibrary",
  components: {
    Navbar,
    Showcard,
    VueFlexWaterfall,
    Prenext,
    Circlespinner,
  },
  data() {
    return {
      imagesList: [],
      isLoading: true,
    };
  },
 
  created(){
     this.libraryImages();
  },

  methods: {
    //show images in the media library
    libraryImages: function() {
      var vm = this;
      axios.get(this.$page.props.imageShow)
        .then(function(response){
        vm.isLoading=false;     
        vm.imagesList = response.data;  
        })
        .catch(err => console.error(err));
       
    },
    
  },
};
</script>