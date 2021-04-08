<template>
  <div id="home">
  
    <navbar @search="searchValue" :searchBar=true></navbar>
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
        <showcard  v-if="isLoading == false" :fresh = "false"
          v-bind:ref-message="item.urls.small"  v-bind:id="item.id" v-bind:ref-messagefull="item.urls.full"
     btnDelete="0" :home="true" ></showcard>
      </ul>
    </vue-flex-waterfall>
    <div class="flex justify-center" v-if="imagesList.length != 0 &&  isLoading == false">
      <prenext :page="page" :totalPages="totalPages" @change-page="changePage" class="py-12"></prenext>
    </div>
  </div>
</template>

<script>
import Navbar from "@/components/commons/Navbar";
import Showcard from "@/components/commons/Showcard";
import VueFlexWaterfall from "@/components/commons/Waterfall";
import Prenext from "@/components/commons/Prenext";
import Circlespinner  from '@/components/commons/Circlespinner';

export default {
  name: "home",
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
      page: 1,
      perPage: 30,
      search: '',
      totalPages: 0,
      noResults: true,
      isLoading: false,
     
    };
  },
  created(){
      var data = window.location.href.split("?")[1].split("=")[1];
      this.search=data;
      this.searchValue(data);

  },
  
 
  methods: {
    changePage: function(page) {
      //prenext give the value to pageValue
      this.page = page;
      console.log('Home - new page: ', this.page);
      
      this.searchImages()
    },
    //the search message
    searchValue(search) {
      if (search.length == 0) return
      this.search = search
      this.page = 1
     
      console.log("search3"+this.search)  
      this.searchImages()
    },
    //acquire the images from unsplash
    searchImages: function() {
      this.isLoading=true;
      var vm = this;
      let data = new URLSearchParams({
        search: this.search,
        page: this.page,
        perPage: this.perPage,
      }).toString();
      axios.get(this.$page.props.unsplashSearch + "?" + data)
        .then(function(response) {
          
           vm.isLoading=false;
          console.log(response);
          vm.imagesList = response.data.results;
          vm.totalPages = response.data.total_pages;
          if (vm.totalPage === 0) {
            vm.noResults = true;
            return;
          }
            window.scrollTo(0, 0);
        })
        .catch(err => console.error(err));
    },
 

  },
};
</script>
