<template>
  <div class="flex items-center">
    <!--First section show the number of the result -->
    <div class="content-center ml-4 mt-2">
        <span class="text-center xs:text-sm text-2xl">{{ results }}</span>
        <span class="text-center xs:text-xl text-base mt-2 ml-2"> RESULTS</span>     
    </div>
     <!--First section show the number of the result -->
  </div>
</template>

<script>

export default {
  components: {
  },

  props: ['results'],
   mounted() {
      console.log("Works Mounted !");
    },

  setup(props) {
   
    return {
    
    };
  },
};
</script>