<template>
  <div class="inline-flex items-center">
    <button class="page-button" @click="changePage(1)">
      First
    </button>
    <button class="page-button" @click="changePage(page - 1)">
      Prev
    </button>
    <span>Page: {{ page }}</span>
    <button class="page-button" @click="changePage(page + 1)">
      Next
    </button>
    <button class="page-button" @click="changePage(totalPages)">
      Last
    </button>
  </div>
</template>
<script>
export default {
  name: "Prenext",
  props: {
    page: {
      required: true,
      type: Number
    },
    totalPages: {
      required: true,
      type: Number
    }
  },
  data() {
    return {}
  },
  methods: {
    changePage: function(page) {
      console.log('current page: ', this.page)
      console.log('page change: ', page)
      if (this.page == 1 && page <= 1) {
        return;
      }
      this.$emit('change-page', page)
    }
  },
};
</script>

<style>
.page-button {
  @apply bg-white w-auto flex justify-end items-center text-gray-800 p-2 hover:text-gray-400 rounded-l font-bold;
}
</style>
