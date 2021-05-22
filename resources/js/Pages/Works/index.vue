<template>
  <app-layout>
     <InnerPageHero image-url="/dist/images/banner-book-details.png" title="Work Research" />
      <div class="text-xl container text-center mx-auto px-4 sm:px-0 py-8 sm:py-10">
          Welcome to <span class="text-gray-900">My Digital Library</span> Works collection! Some Works can be freely read and downloaded. Others can be borrowed and read in our online book reader.
     </div>
     <div>
      <div class="container mx-auto grid  grid-cols-1 sm:grid-cols-4 pt-2 mb-6 gap-2">
      <div class="col-span-4 sm:col-span-1 rounded border-gray-300 dark:border-gray-700 border-2 h-24 shadow-lg">
        
        </div>
        <div class="col-span-4 sm:col-span-3 container mx-auto grid  grid-cols-1 mb-4 gap-2 rounded">
            <div class="col-span-1 rounded border-2 shadow-xm">
        
            </div>
             <div class="col-span-1 rounded border-2  shadow-xm">
              
            </div>
             <div id="box-work" class="col-span-1 rounded border-2 shadow-xm">
                <div class="flex flex-wrap -mx-1 lg:-mx-4">
                  <div v-for="work in works"  v-bind:key="work.id" class="transform duration-500 xs:mb-4 sm:mb-4 hover:-translate-y-1 my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
                      <work :report="work" />
                  </div>
                </div>
               <teleport to='#box-work'>
                   <scroll-loader :loader-method="getWorksInfo" :loader-enable="loadMore">
                    <div>Loading...</div>
                  </scroll-loader>
               </teleport>
            </div>
        </div>
     </div>
    </div>
  </app-layout>
</template>

<script>
import InnerPageHero from "@/Components/InnerPageHero";
import Work from "@/Components/Work";
import SideMenu from "./SideMenu";
import AppLayout from "@/Layouts/AppLayout";
import ScrollLoader from "vue-scroll-loader"  


export default {
  components: {
    InnerPageHero,
    AppLayout,
    SideMenu,
    ScrollLoader,
    Work
  },
   data() {
      return {
        loadMore: true,
        page: 0,
        pageSize: 4,
        works: [],
      }
    },
    methods: {
      getWorksInfo() {
          console.log('https://mydigitallibrary.test/fetch_reports/'+(this.page++)+'/'+this.pageSize);
         axios.get('https://mydigitallibrary.test/fetch_works/'+(this.page++)+'/'+this.pageSize)
          .then(res => {
            this.works = res.data      
            // Stop scroll-loader
            console.log("Result--------------------------------");
            console.log(res.data);
            console.log("Works---------------------------------");
            console.log(this.works);
            res.data.length < this.pageSize && (this.loadMore = false)
          })
          .catch(error => {
            console.log(error);
          });
      }
    },
    mounted() {
      this.getWorksInfo()
    },
  props: {},

  setup() {},
};
</script>