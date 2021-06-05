<template>
  <app-layout>
     <InnerPageHero image-url="/dist/images/banner-book-details.png" title="Work Details" />
     
      <div id="adobe-dc-view" :class="{'h-viewer w-full':read, 'h-0':!read, 'container shadow-2xl':readFull}" ></div>
      <!--Book details section -->
      <div class="mx-auto grid grid-cols-1 sm:grid-cols-5 pt-2 mb-8 gap-2 ml-5 mr-5">
        <div class="col-span-1 sm:col-span-4 rounded border-gray-300 dark:border-gray-700 border-2 shadow-xl">
           <div class="container ml-4 mt-3">
              <!-- General informations -->
             <div class="text-3xl xl:text-3xl uppercase text-gray-800 mx-auto text-center pb-2">
                <span>{{ myWork.title }}</span>
            </div>

            <div class="text-lg xl:text-xl mb-1">
              <span class="font-semibold">Author(s): </span>
              <span v-if="myWork.model_name == 'Subject'" class="text-gray-600" >
                {{ myWork.author ? myWork.author.name : 'Not Availlable'  }}
              </span>
              <span v-else class="text-gray-700" >
                  {{ myWork.authors[0] ? myWork.authors[0].name : 'Not Availlable' }}
                  {{ myWork.authors[1] ? ', '+myWork.authors[1].name : '' }}
              </span>
            </div>
            <!-- General informations -->
            <div v-if="myWork.model_name == 'Book'" class="text-base xl:text-lg">
                  <ViewBook :work="myWork" />
            </div>
            <div v-else-if="myWork.model_name == 'Report'" class="text-base xl:text-lg">
                  <ViewReport :work="myWork" />
            </div>
            <div v-else-if="myWork.model_name == 'Subject'" class="text-base xl:text-lg">
                  <ViewSubject :work="myWork" />
            </div>
            <div class="text-center">
               <div v-if="myWork.model_name != 'Book'">
                   <button  v-if="!readFull" type="button" @click="() => showWork()"  class="content-center text-center mr-3 mt-2 p-2 rounded-md transform duration-500 hover:scale-105 bg-theme-1 text-theme-2">
                    <span class="text-center">Read This Work</span>
                 </button> 
                  <button v-if="read" type="button" @click="() => showWorkFull()"  class="content-center text-center mt-2 p-2 rounded-md transform duration-500 hover:scale-105 bg-theme-1 text-theme-2">
                    <span class="text-center">Read In Full</span>
                 </button>  
               </div>
              </div>
                <teleport to='body'>
                 <jet-confirmation-modal :show="showModalAuth"  @close="showModalAuth = false">
                      <template #title>
                          Unauthorized Action
                      </template>

                      <template #content>
                         You must login to your account to perform this action. Thank you.
                      </template>

                      <template #footer>
                          <jet-secondary-button @click.native="showModalAuth = false">
                                Cancel
                            </jet-secondary-button>
                            <jet-secondary-button class="bg-blue-800 ml-2 hover:bg-blue-600">
                               <inertia-link class="flex items-center no-underline" :href="route('login')">
                                <span class="hover:bg-blue-600 text-center focus:outline-none text-gray-50">
                                  Login
                                </span>
                            </inertia-link> 
                            </jet-secondary-button>
                             
                      </template>
                  </jet-confirmation-modal>

                  <x-jet-dialog-modal :show="showModalReservation()"  @close="closeModalReservation()">
                      <x-slot name="title">
                          {{ __('Hapus akun') }}
                      </x-slot>

                      <x-slot name="content">
                          {{ __('Kamu yakin ingin hapus akun ? Sekali hapus akun , semua data akan terhapus permanent! . Tolong masukan kata sandi untuk menghapus akun.') }}
                      </x-slot>

                      <x-slot name="footer">
                          <x-jet-secondary-button>
                              {{ __('Batal') }}
                          </x-jet-secondary-button>

                          <x-jet-danger-button class="ml-2">
                              {{ __('Hapus') }}
                          </x-jet-danger-button>
                      </x-slot>
                    </x-jet-dialog-modal>
              </teleport>
           </div>
        </div>
        <div class="col-span-1  w-full sm:col-span-1 shadow-xl mx-auto rounded">    
            <a  @click="() => showSingle()" class="">
              <img  alt="Placeholder" class="c-card pic block h-96 w-full" :src="'/'+myWork.cover">
            </a>
        </div>
        <teleport to='body'>
          <vue-easy-lightbox
            :visible="visible"
            :imgs="imgs"
            :index="index"
            @hide="handleHide">
          </vue-easy-lightbox>
        </teleport>
      </div>
      <!--Book details section -->

      <!--Book Items section -->
       <div class="text-center w-full mb-3">
        <div class="text-center font-semibold text-gray-800 text-3xl">Book Items</div>
        <div class="w-32 mx-auto pt-3 border-b-2 animate-pulse  border-blue-800 text-center mb-4"></div>
          <p class="text-xl text-gray-600 mx-auto text-center">All the copies of this book in our Library</p>
      </div>
      <div class="container mb-4">
        <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
          <thead class="bg-blue-700 text-white">

            <tr v-for="item in myWork.book_items" v-bind:key="item.id" class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
              <th class="p-3 text-left">Code</th>
              <th class="p-3 text-left">Format</th>
              <th class="p-3 text-left">Publish Date</th>
              <th class="p-3 text-left">Status</th>
              <th class="p-3 text-left" width="110px">Actions</th>
            </tr>

          </thead>
          <tbody class="flex-1 sm:flex-none">
              <tr v-for="item in myWork.book_items" v-bind:key="item.id" class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                <td class="border-grey-light border hover:bg-gray-100 p-3">{{ item.code }}</td>
                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{ item.format.title }}</td>
                <td class="border-grey-light border hover:bg-gray-100 p-3">{{ item.publish_date }}</td>

                <td v-if="item.status.title == 'Available'" class="border-grey-light bg-green-400-200 opacity-50 rounded border hover:bg-gray-100 p-3 truncate">
                    <span class="relative inline-block px-3 py-1  text-center text-green-900 leading-tight">
                        <span aria-hidden class="absolute inset-0 bg-green-300 opacity-50 rounded-full"></span>
                        <span class="relative">{{ item.status.title }}  </span>
                    </span>
                  </td>

                <td v-else class="border-grey-light text-center bg-green-200 opacity-50 rounded border hover:bg-gray-100 p-3">
                    <span class="relative inline-block px-3 py-1 text-center text-orange-900 leading-tight">
                        <span aria-hidden class="absolute inset-0 bg-orange-400 opacity-50 rounded-full"></span>
                        <span class="relative">{{ item.status.title }}</span>
                    </span>
                </td>

                <td class="border-grey-light border hover:bg-gray-100 p-3  hover:text-red-600 hover:font-medium cursor-pointer">
                <span v-if="item.format.slug == 'p_doc'">
                    <button  v-if="item.status.title == 'Available'"  type="button" @click="() => showReserveModal()"  class="content-center text-center mr-3 mt-2 p-2 rounded-md transform duration-500 hover:scale-105 bg-theme-1 text-theme-2">
                      <span class="text-center">Reserve</span>
                    </button>
                     <button  v-else  disabled type="button" class="content-center text-center mr-3 mt-2 p-2 rounded-md transform duration-500 hover:scale-105 bg-theme-1 text-theme-2">
                      <span class="text-center">Reserve</span>
                    </button>

                </span>
                <span v-else>
                    <button  type="button" class="content-center text-center mr-3 mt-2 p-2 rounded-md transform duration-500 hover:scale-105 bg-theme-1 text-theme-2">
                       <inertia-link class="flex items-center no-underline" :href="'/work-details/book/'+myWork.id">
                          <span class="text-center">Read</span>
                      </inertia-link>       
                    </button>
                </span>
                </td>
              </tr>
          </tbody>
		    </table>
      </div>
      <!--Book Items section -->

      <!--Similar Works -->
      <works
      :works="myWorks"
      :title="'Similars Works'"
      :second_title="'Some work related to the current one.'"
        />
      <!--Similar Works -->
      
   </app-layout>
</template>

<style>
 @media (min-width: 640px) {
    table {
      display: inline-table !important;
    }

    thead tr:not(:first-child) {
      display: none;
    }
  }

  td:not(:last-child) {
    border-bottom: 0;
  }

  th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, .1);
  }
</style>
<script>
import InnerPageHero from "@/Components/InnerPageHero";
import Works from "@/Components/Works";
import ViewBook from "./ViewBook";
import ViewReport from "./ViewReport";
import ViewSubject from "./ViewReport";
import AppLayout from "@/Layouts/AppLayout";
import VueEasyLightbox from 'vue-easy-lightbox';
import JetConfirmationModal from '@/Jetstream/ConfirmationModal'
import JetDialogModal from '@/Jetstream/DialogModal'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'

export default {
  components: {
    InnerPageHero,
    AppLayout,
    Works,
    ViewBook,
    ViewReport,
    ViewSubject,
    VueEasyLightbox,
    JetConfirmationModal,
    JetDialogModal,
    JetSecondaryButton,
  },

  props: {work : Object, related:Object, session:Object},
  mounted() {
   
  },
   methods: {
      showSingle() {
        this.imgs = '/'+this.work.cover,
        this.show()
     },
     showWorkFull(){
        window.scrollTo({
            top : 0,
            left:0,
            behavior :'smooth'
        })
       this.read = false
       this.readFull = true
       this.adobeDCView = null
     
       this.viewerConfig.embedMode = "IN_LINE"
              var adobeDCView = this.adobeDCView
              adobeDCView = new AdobeDC.View({clientId: "506e8fa3d68347a2907d0ca5e8bc3c3c", divId: "adobe-dc-view",  locale: "en-US",});
              var previewFilePromise = adobeDCView.previewFile({
                content:{location: {url: "https://mydigitallibrary.test/"+this.myWork.url}},
                metaData:{fileName: this.myWork.title, id: "77c6fa5d-6d74-4104-8349-657c8411a834"}
              }, this.viewerConfig);
              const allowTextSelection = false;
              previewFilePromise.then(adobeViewer => {
                adobeViewer.getAnnotationManager().then(annotationManager => {
                  // All annotation APIs can be invoked here
                  adobeViewer.getAPIs().then(apis => {
                          apis.enableTextSelection(allowTextSelection)
                                  .then(() => console.log("Success"))
                                  .catch(error => console.log(error));
                  });
                });
              });
     },
     showWork(){
       if(this.session.auth){
          this.readFull = false
          this.adobeDCView = null
          this.viewerConfig.embedMode = ""
          window.scrollTo({
              top : 0,
              left:0,
              behavior :'smooth'
          })
         if(!this.read){
              var adobeDCView = this.adobeDCView
              adobeDCView = new AdobeDC.View({clientId: "506e8fa3d68347a2907d0ca5e8bc3c3c", divId: "adobe-dc-view",  locale: "en-US",});
              var previewFilePromise = adobeDCView.previewFile({
                content:{location: {url: "https://mydigitallibrary.test/"+this.myWork.url}},
                metaData:{fileName: this.myWork.title, id: "77c6fa5d-6d74-4104-8349-657c8411a834"}
              }, this.viewerConfig);
              const allowTextSelection = false;
              previewFilePromise.then(adobeViewer => {
                adobeViewer.getAnnotationManager().then(annotationManager => {
                  // All annotation APIs can be invoked here
                  adobeViewer.getAPIs().then(apis => {
                          apis.enableTextSelection(allowTextSelection)
                                  .then(() => console.log("Success"))
                                  .catch(error => console.log(error));
                  });
                });
              });
              this.read = true
        }else{
          this.read = true
        }
       }else{
         console.log("Unauthorized")
         this.showModalAuth = true
       }
       
     }, 
      show() {
        this.visible = true
      },
      handleHide() {
        this.visible = false
      },
 
    },
  data() {
    return {
      read : false,
      readFull : false,
      adobeDCView : null,
      showModalAuth : false,
      myWork : this.work,
      myWorks : this.related,
      imgs: '', // Img Url , string or Array of string
      visible: false,
      index: 0 ,// default: 0
      viewerConfig : {
        showAnnotationTools: false,
        enableFormFilling: false,
        showLeftHandPanel: true,
        showDownloadPDF: false,
        showPrintPDF: false,
        showPageControls: true,
        dockPageControls: true,
        enableLinearization: true,
        embedMode: "", //IN_LINE
        enableAnnotationAPIs: true,
        defaultViewMode: "", /* Allowed possible values are "FIT_PAGE", "FIT_WIDTH" or "". */
      }
    }
  },

  setup() {},
};
</script>