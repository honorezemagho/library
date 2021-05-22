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
                <scroll-loader :loader-method="getImagesInfo" :loader-enable="loadMore">
                    <div>Loading...</div>
                </scroll-loader>
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
import SideMenu from "./SideMenu";
import AppLayout from "@/Layouts/AppLayout";
import ScrollLoader from 'vue-scroll-loader'  


export default {
  components: {
    InnerPageHero,
    AppLayout,
    SideMenu
  },
   data() {
      return {
        loadMore: true,
        page: 1,
        pageSize: 15,
        works: [],
      }
    },
    methods: {
      getImagesInfo() {
        axios.get('https://api.example.com/', {
            params: {
              page: this.page++,
              per_page: this.pageSize,
            }
          })
          .then(res => {
            this.images.concat(res.data)
            
            // Stop scroll-loader
            res.data.length < this.pageSize && (this.loadMore = false)
          })
          .catch(error => {
            console.log(error);
          })
      }
    },
    mounted() {
      this.getImagesInfo()
    },
  props: {},

  setup() {},
};
</script>