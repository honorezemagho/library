<template>
  <app-layout>
     <InnerPageHero image-url="/dist/images/banner-book-details.png" title="Work Research" />
      <div class="text-xl container text-center mx-auto px-4 sm:px-0 py-8 sm:py-10">
          Welcome to <span class="text-gray-900">My Digital Library</span> Works collection! Some Works can be freely read and downloaded. Others can be borrowed and read in our online book reader.
     </div>
     <div>
      <div class="container mx-auto grid  grid-cols-1 sm:grid-cols-3 pt-2 mb-6 gap-4">
        <div class="col-span-2 sm:col-span-1 rounded border-gray-300 dark:border-gray-700 border-2 h-24 shadow-lg">
        
        </div>
        <div class="col-span-2 sm:col-span-2 container mx-auto grid  grid-cols-1 mb-4 gap-2 rounded">
            <div class="col-span-1 rounded border-2 shadow-xm">
        
            </div>
             <div class="col-span-1 rounded border-2  shadow-xm">
        
            </div>
             <div class="col-span-1 rounded border-2 h-24 shadow-xm">
        
            </div>
        </div>
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