<template>
  <app-layout>
     <InnerPageHero image-url="/dist/images/banner-book-details.png" title="Work Research" />
      <div class="text-xl container text-center mx-auto px-4 sm:px-0 py-8 sm:py-10">
          Welcome to <span class="text-gray-900">My Digital <span class="text-gr">Library</span></span> Works collection! Some Works can be freely read and downloaded. Others can be borrowed and read in our online book reader.
     </div>
     <div>
      <div class="container mx-auto grid  grid-cols-1 sm:grid-cols-5 pt-2 mb-6 gap-2">
        <div class="col-span-5 sm:col-span-1 rounded border-gray-300 dark:border-gray-700 border-2 shadow-lg">
            <side-menu
              :results="works.length"
             >
            </side-menu>
        </div>
        <div class="col-span-5 sm:col-span-4 border-2 shadow-xm container mx-auto grid  grid-cols-1 mb-4 gap-2 rounded">
            <div class="hidden col-span-1 rounded border-2 shadow-xm">
            </div>

             <div class="fex flex-row col-span-1 rounded border-2  shadow-xm ">
                <div>
                   <a href="#" class="flex items-center no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-gray-800 ml-1"> SORT BY</span>
                  </a>
                </div>
                <div>
                   <a href="#" class="flex items-center no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-gray-800 ml-1"> VIEW</span>
                  </a>
                </div>
                <div>
                   <a href="#" class="flex items-center no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-gray-800 ml-1"> TITLE</span>
                  </a>
                </div>
                <div>
                   <a href="#" class="flex items-center no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-gray-800 ml-1"> DATE PUBLISHED</span>
                  </a>
                </div>
            </div>
             <div id="boxWork" class="col-span-1 mt-2">
                <div class="flex flex-wrap">
                  <div v-for="work in works"  v-bind:key="work.id" class="transform duration-500 lg:mb-4 xs:mb-4 sm:mb-4 hover:-translate-y-1 my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-2 lg:w-1/4">
                        <work :report="work" />
                      </div>
                  
                </div>
                  
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
import ScrollLoader from 'vue-scroll-loader' 



export default {
  components: {
    InnerPageHero,
    AppLayout,
    SideMenu,
    ScrollLoader,
    Work
  },
  props: {works:Object},
   data() {
      return {
        loadMore: true,
        page: 1,
        pageSize: 30,
        works: this.works,
      }
    },
    methods: {
      getWorksInfo() {
        console.log('https://mydigitallibrary.test/fetch_reports/'+(1)+'/'+this.pageSize);
        axios.get('https://mydigitallibrary.test/fetch_works/'+(this.page)+'/'+this.pageSize)
          .then(res => {
          this.works =  res.data
          
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
      //this.getWorksInfo()
    },

  setup() {},
};
</script>