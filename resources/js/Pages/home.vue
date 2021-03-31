<template>
  <div id="home">
    <navbar @search="searchValue"></navbar>
    <vue-flex-waterfall
      col="4"
      col-spacing="15"
      :break-at="{ 1327: 3, 990: 2, 655: 1 }"
      :break-by-container="true"
    >
      <ul v-if="imagesList.length != 0" v-for="item in imagesList">
        <showcard
          v-bind:ref-message="item.urls.small"
        ></showcard>
      </ul>
    </vue-flex-waterfall>
    <div class="flex justify-center" v-if="imagesList.length != 0">
      <prenext :page="page" :totalPages="totalPages" @change-page="changePage" class="py-12"></prenext>
    </div>
  </div>
</template>

<script>
import Navbar from "@/components/commons/Navbar";
import Showcard from "@/components/commons/Showcard";
import VueFlexWaterfall from "@/components/commons/Waterfall";
import Prenext from "@/components/commons/Prenext";
export default {
  name: "home",
  components: {
    Navbar,
    Showcard,
    VueFlexWaterfall,
    Prenext,
  },
  data() {
    return {
      imagesList: [],
      page: 1,
      perPage: 30,
      search: '',
      totalPages: 0,
      noResults: true,
    };
  },

  methods: {
    changePage: function(page) {
      // prenext give the value to pageValue
      this.page = page;
      console.log('Home - new page: ', this.page);
      this.searchImages()
    },
    searchValue(search) {
      if (search.length == 0) return
      this.search = search
      this.page = 1
      this.searchImages()
    },
    searchImages: function() {
      var vm = this;
      let data = new URLSearchParams({
        search: this.search,
        page: this.page,
        perPage: this.perPage,
      }).toString();
      axios.get(this.$page.props.unsplashSearch + "?" + data)
        .then(function(response) {
          vm.imagesList = response.data.results;
          vm.totalPages = response.data.total_pages;
          if (vm.totalPage === 0) {
            vm.noResults = true;
            return;
          }
        })
        .catch(err => console.error(err));
    },
  },
};
</script>
