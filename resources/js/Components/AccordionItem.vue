<template>
  <div>
    <div class="text-center w-full">
       <div class="text-center font-extrabold text-gray-800 text-3xl mb-4">Ours Latest Works</div>
          <p class="text-xl text-gray-600 mx-auto text-center">Some recent book report and subject added in our library</p>
     </div>

    <div class="container my-12 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
          <div v-for="report in reports"  v-bind:key="report.id" class="transform duration-500 xs:mb-4 sm:mb-4 hover:-translate-y-1 my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/4">
               <work :report="report" />
          </div>
        </div>
      </div>

    <div v-if="showViewAll" class="flex place-items-center mt-6 sm:mt-8">
         <a href="#" class="flex items-center no-underline">
            <span class="hover:text-blue-800 px-4 py-2 text-center  rounded focus:outline-none text-gray-800 text-3xl mb-4">Browse All Titles
            </span>
           <svg xmlns="http://www.w3.org/2000/svg" class="text-center text-blue-800 animate-bounce h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </a>
    </div>
  </div>
</template>

<script>
import Work from "@/Components/Work";
import { computed } from "vue";

export default {
  components: {
    Work,
  },

  props: {
    reports: Object,
    showViewAll: {
      type: Boolean,
      default: true,
    },
  },
   mounted() {
      console.log("Works Mounted !");
    },

  setup(props) {
   
    return {
    
    };
  },
};
</script>