<template>
  <div id="mediaLibrary">
    <navbar></navbar>
      <vue-flex-waterfall
      col="4"
      col-spacing="15"
      :break-at="{ 1327: 3, 990: 2, 655: 1 }"
      :break-by-container="true"
    >
      <ul v-if="imagesList.length != 0" v-for="item in imagesList">
        <showcard
          v-bind:ref-message="item[2]" v-bind:id="item[0]" v-bind:des="item[1]"
       ></showcard>
      </ul>
    </vue-flex-waterfall>
   </div>
</template>

<script>
import Navbar from "@/components/commons/Navbar";
import Showcard from "@/components/commons/Showcard";
import VueFlexWaterfall from "@/components/commons/Waterfall";
import Prenext from "@/components/commons/Prenext";
export default {
  name: "mediaLibrary",
  components: {
    Navbar,
    Showcard,
    VueFlexWaterfall,
    Prenext,
  },
  data() {
    return {
      imagesList: [],
    };
  },
  created(){
     this.libraryImages();
     console.log("hello world");
  },

  methods: {
    libraryImages: function() {
      var vm = this;
      console.log(this.$page.props.imageShow);
      axios.get(this.$page.props.imageShow)
        .then(function(response){
       
        console.log("show image  "+response.data[2]);  
        vm.imagesList = response.data; 
        console.log("show list  "+vm.imagesList[2]); 
         
        })
        .catch(err => console.error(err));
    },
    
  },
};
</script>