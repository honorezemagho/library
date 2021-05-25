<template>
  <app-layout>
    <InnerPageHero image-url="/dist/images/banner-book-details.png" title="Work Research" />
    <div class="text-xl container text-center mx-auto px-4 sm:px-0 py-8 sm:py-10">
          Welcome to <span class="text-gray-900">My Digital <span class="text-gray-800">Library</span></span> Works collection ! Some Works can be freely read or downloaded.
    </div>
    <div class="mx-auto grid grid-cols-1 sm:grid-cols-5 pt-2 mb-4 gap-2 ml-5 mr-5">
        <div class="col-span-1 sm:col-span-1 rounded border-gray-300 dark:border-gray-700 border-2 shadow-lg">
            <side-menu
              :results="works.length"
             >
            </side-menu>
        </div>
        <div class="col-span-1  w-full sm:col-span-4 border-2 shadow-xm mx-auto grid grid-cols-1 mb-4 gap-2 rounded">
            <div class="hidden col-span-1 rounded border-2 shadow-xm">
            </div>

             <div class="flex flex-row h-11 mt-4 row-span-1 mr-2 ml-2 rounded border-2 shadow-lg ">
                   <div class="mr-5 mt-2" too>
                   <a href="#" class="flex items-center no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z" />
                  </svg>
                    <span class="text-gray-800 ml-1"> SORT BY</span>
                  </a>
                </div>
                <div class="mr-3 mt-2">
                   <a href="#" class="flex items-center no-underline">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span class="text-gray-800 ml-1"> VIEW</span>
                  </a>
                </div>
                <div class="mr-3 mt-2">
                   <a href="#" class="flex items-center no-underline">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                    </svg>
                    <span class="text-gray-800 ml-1"> TITLE</span>
                  </a>           </div>
                <div class="mr-3 mt-2">
                   <a href="#" class="flex items-center no-underline">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-gray-800 ml-1"> DATE PUBLISHED</span>
                  </a>
                </div>
              </div>
             <div id="boxWork" class="col-span-1 mt-2">
                <div class="flex flex-wrap">
                  <div v-for="work in works"  v-bind:key="work.id" class="transform duration-500 lg:mb-4 xs:mb-4 sm:mb-4 hover:-translate-y-1 my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-2 lg:w-1/4">
                        <work :work="work" />
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


export default {
  components: {
    InnerPageHero,
    AppLayout,
    SideMenu,
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