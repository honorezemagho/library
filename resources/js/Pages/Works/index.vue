<template>
  <app-layout>
    <InnerPageHero image-url="/dist/images/banner-book-details.png" title="Work Research" />
    <div class="text-xl container text-center mx-auto px-4 sm:px-0 py-8 sm:py-10">
          Welcome to <span class="text-gray-900">My Digital <span class="text-gray-800">Library</span></span> Works collection ! Some Works can be freely read or downloaded.
    </div>
    <div class="mx-auto grid grid-cols-1 sm:grid-cols-5 pt-2 mb-4 gap-2 ml-5 mr-5">
        <div class="col-span-1 sm:col-span-1 rounded border-gray-300 dark:border-gray-700 border-2 shadow-lg">
            <side-menu
              :curWorks="works"
              @onUpdateWork="updateWorks"
             >
            </side-menu>
        </div>
        <div class="col-span-1  w-full sm:col-span-4 border-2 shadow-xm mx-auto grid grid-cols-1 mb-4 gap-2 rounded">
            <div class="hidden col-span-1 rounded border-2 shadow-xm">
            </div>
            <!--Filter Bar component-->
            <SortBar
              :curWorks="works"
              @onSortedWorks="updateWorks"
            >
            </SortBar>
            <!--End Filter Bar component-->
            
             <div id="boxWork" class="col-span-1 mt-2">
                <div class="flex flex-wrap">
                <transition-group  name="modal">
                  <div v-for="work in curWorks"  v-bind:key="work.id" class="transform duration-500 lg:mb-4 xs:mb-4 sm:mb-4 hover:-translate-y-1 my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-2 lg:w-1/4">
                      <work :work="work" />
                    </div>
                 </transition-group>
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
import SortBar from "./SortBar";
import AppLayout from "@/Layouts/AppLayout";


export default {
  components: {
    InnerPageHero,
    AppLayout,
    SideMenu,
    Work,
    SortBar
  },
  props: {works:Object},
   data() {
      return {
        loadMore: true,
        page: 1,
        pageSize: 30,
        works: this.works,
        curWorks : this.works,
       }
    },
    methods: {
      getWorksInfo() {
        console.log('https://mydigitallibrary.test/fetch_reports/'+(1)+'/'+this.pageSize);
        axios.get('https://mydigitallibrary.test/fetch_works/'+(this.page)+'/'+this.pageSize)
          .then(res => {
          this.works =  res.data
          })
          .catch(error => {
            console.log(error);
          });
      },
      updateWorks(newWorks){
        console.log("Works Updated")
        this.curWorks = newWorks;
      }

    },
    
    mounted() {
      //this.getWorksInfo()
    },

  setup() {},
};
</script>