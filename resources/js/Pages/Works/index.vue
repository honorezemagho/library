<template>
  <app-layout>
     <InnerPageHero image-url="/dist/images/banner-book-details.png" title="Work Research" />
      <div class="text-2xl container mx-auto px-4 sm:px-0 py-8 sm:py-20">
          Welcome to the My Digital Library Works collection! Some Works can be freely read and downloaded. Others can be borrowed and read in our online book reader.
    </div>
    <div>
      <div class="container mx-auto grid sm:grid-cols-1 grid-cols-2 pt-6 gap-8">
        <div class="rounded border-gray-300 dark:border-gray-700 border-dashed border-2 h-24"></div>
        <div class="rounded border-gray-300 dark:border-gray-700 border-dashed border-2 h-24"></div>
     </div>
    </div>
  </app-layout>
</template>

<script>
import InnerPageHero from "@/Components/InnerPageHero";
import SideMenu from "@/Components/SideMenu";
import AppLayout from "@/Layouts/AppLayout";


export default {
  components: {
    InnerPageHero,
    AppLayout,
    SideMenu
  },

  props: {},

  setup() {},
};
</script>