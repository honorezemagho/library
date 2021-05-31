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
                <button type="button" @click="() => showWork()"  class="content-center text-center mr-3 mt-2 p-2 rounded-md transform duration-500 hover:scale-105 bg-theme-1 text-theme-2">
                    <span class="text-center">Read This Work</span>
                 </button> 
                  <button v-if="read" type="button" @click="() => showWorkFull()"  class="content-center text-center mt-2 p-2 rounded-md transform duration-500 hover:scale-105 bg-theme-1 text-theme-2">
                    <span class="text-center">Read In Full</span>
                 </button>    
              </div>
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

      <!--Similar Works -->
      <works
      :works="myWorks"
      :title="'Similars Works'"
      :second_title="'Some work related to the current one.'"
        />
      <!--Similar Works -->
      
   </app-layout>
</template>

<script>
import InnerPageHero from "@/Components/InnerPageHero";
import Works from "@/Components/Works";
import ViewBook from "./ViewBook";
import ViewReport from "./ViewReport";
import ViewSubject from "./ViewReport";
import AppLayout from "@/Layouts/AppLayout";
import VueEasyLightbox from 'vue-easy-lightbox';

export default {
  components: {
    InnerPageHero,
    AppLayout,
    Works,
    ViewBook,
    ViewReport,
    ViewSubject,
    VueEasyLightbox,
  },

  props: {work : Object, related:Object},
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
       this.adobeDCView = new AdobeDC.View({clientId: "506e8fa3d68347a2907d0ca5e8bc3c3c", divId: "adobe-dc-view",  locale: "en-US",});
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
        this.readFull = false
        this.adobeDCView = null
        this.viewerConfig.embedMode = ""
        window.scrollTo({
            top : 0,
            left:0,
            behavior :'smooth'
        })
         if(!this.read){
              this.adobeDCView = new AdobeDC.View({clientId: "506e8fa3d68347a2907d0ca5e8bc3c3c", divId: "adobe-dc-view",  locale: "en-US",});
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