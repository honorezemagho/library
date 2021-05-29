<template>
    <div class="z-0 hero-height relative pt-20 pb-32 sm:pb-40 xs:pt-10 sm:pt-24 lg:pt-32 lg:pb-56">
        <img class="block absolute inset-0 object-cover h-full w-full" src="/dist/images/hero.jpg" alt=""/>
        <div class="absolute inset-0 bg-gray-800 bg-opacity-75"/>
        <div class="relative max-w-screen-xl  mt-12  margin-top-15-percent mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-center">
          <div class="relative sm:text-center w-full lg:max-w-3xl mx-auto">
            <h1 class="text-white text-4xl leading-8 sm:text-4xl sm:text-center text-center font-extrabold lg:text-5xl lg:leading-none lg:max-w-2xl lg:mx-auto">Search <span class="text-blue-800">Works</span></h1>
            <p class="mt-6 text-gray-200 font-medium text-lg leading-6 sm:text-lg sm:leading-7">Welcome to My DigitalLibrary
             By just a few word, find all digital documents like students report, books, magazines, subjects etc.</p>
         
            <div class="p-4 flex  pt-2 relative mx-auto shadow-sm hover:shadow-inner text-gray-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="text-center text-blue-800 mt-3 mr-3 animate-bounce h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
                <form @submit.prevent="submit" class="w-full">
                  <input class="w-full p-2 border-2 border-gray-300 bg-white h-14  px-6 pr-16 rounded-lg text-sm focus:outline-none"
                  type="search" name="search" v-model="form.search" placeholder="Title of the book, report, subject">
                  <button type="submit" class="bg-blue-800 h-14 absolute right-0 top-0 mt-2 mr-4">
                  <svg class="mr-4  ml-2 mb-2 text-gray-100 h-5 w-5  fill-current" xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                      viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                      width="512px" height="512px">
                      <path
                      d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                  </svg>
                  </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <section class="pb-5 bg-gray-50 -mt-24">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap">
            <div class="transform duration-500 hover:-translate-y-2 lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400"
                  >
                <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>  </div>
                  <h6 class="text-xl font-semibold">+900 Student Reports</h6>
                </div>
              </div>
            </div>
            <div class="transform duration-500 hover:-translate-y-2 w-full md:w-4/12 px-4 text-center">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400"
                  >
                    <i class="fas fa-retweet"></i>
                    <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                  </div>
                  <h6 class="text-xl font-semibold">+10 000 Referenced Books</h6>
                </div>
              </div>
            </div>
            <div class="transform duration-500 hover:-translate-y-2 pt-6 w-full md:w-4/12 px-4 text-center">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
              >
                <div class="px-4 py-5 flex-auto">
                  <div
                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400"
                  >
                  <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg></div>
                  <h6 class="text-xl font-semibold">+3000 Subjects</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
            
 </template>

<script>
export default {
  props: {},
    data() {
          return {
              form: {
                  search: null,
                  work_type: 'all',
              },
          }
        },
   methods: {
        submit() {
          this.$inertia.get('/works/'+this.form.work_type+'/'+this.form.search)
        },

    },
  setup () {}
}
</script>
