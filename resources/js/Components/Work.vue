<template>
    <!--START Column -->
          <!-- Article -->
          <article class="overflow-hidden rounded-lg shadow-lg">

            <div class="shadow-xl">
                <a @click="() => showSingle()" class="c-card pic">
                  <img  alt="Placeholder" class="block h-56 w-full" :src="report.cover">
              </a>

              <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                   <h1 class="text-md">
                      <inertia-link  class="no-underline hover:underline text-gray-900 tex-bold" 
                      :href="route('work_details',['report',report.id])">{{ report.title }}</inertia-link>
                  </h1>
                  <p class="text-grey-darker text-sm">
                      <!--  {{ report.academic_year }} -->
                  </p>
               </header>

              <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                  <a class="flex items-center no-underline hover:underline text-black" href="#">
                      <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                      <p class="ml-2 sm:text-xs text-lg ">
                          By
                      </p>
                  </a>
                  <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                      <span class="hidden">Like</span>
                      <i class="fa fa-heart"></i>
                  </a>
              </footer>
            </div>
                <div class="bg-gray-400 bg-opacity-75 flex items-center justify-between leading-none p-2 md:p-4 text-right">
                  <a href="#" class="flex items-center no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-gray-800 ml-1"> #Report</span>
                  </a>
                  <a href="#" class="flex items-center no-underline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span class="text-gray-800 ml-1"> 10</span>
             
                  </a>
                  
                  <a href="#" class="flex items-center no-underline">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                  </svg>
                    <span class="text-gray-800 ml-1"> 0</span>
             
                  </a>

                  <a href="#" class="flex items-center no-underline">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
  
          </article>
          <!-- END Article -->
        <teleport to='body'>
            <vue-easy-lightbox
            :visible="visible"
            :imgs="imgs"
            :index="index"
            @hide="handleHide">
          </vue-easy-lightbox>
        </teleport>
 <!-- END Column -->
</template>
<style lang="css" scoped>
  .c-card img{
  transition: transform 0.3s ease-in-out;
}
  .c-card:hover img{
    transform: scale(1.05);
  }

</style>

<script>
import VueEasyLightbox from 'vue-easy-lightbox';

export default {
  props: {
    report : Object,
  },
  components: {
      VueEasyLightbox,
    },
    data() {
      return {
        imgs: '', // Img Url , string or Array of string
        visible: false,
        index: 0 // default: 0
      }
    },
    methods: {
      showSingle() {
        this.imgs = this.report.cover,

        this.show()
     },
      show() {
        this.visible = true
      },
      handleHide() {
        this.visible = false
      },
 
    },
    
  setup(props) {
   
    return {
     
    }
  },
};
</script>