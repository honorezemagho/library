<template>
  <app-layout>
     <InnerPageHero image-url="/dist/images/innerPageHeroAbout.jpg" title="About Us" />
    
      <div class="container mx-auto px-4 sm:px-0 py-8 sm:py-20">
          <h1 class="text-3xl xl:text-4xl font-extrabold text-gray-800 mx-auto text-center  pb-4">Work Title</h1>   
    </div>
  </app-layout>
</template>

<script>
import InnerPageHero from "@/Components/InnerPageHero";
import AppLayout from "@/Layouts/AppLayout";


export default {
  components: {
    InnerPageHero,
    AppLayout
  },

  props: {},

  setup() {},
};
</script>