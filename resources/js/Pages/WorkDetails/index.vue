<template>
  <app-layout>
     <InnerPageHero image-url="/dist/images/banner-book-details.png" title="Work Details" />
     
      <!--Documents Viewer 
      <div id="adobe-dc-view" style="height : 500px;"  class="w-full" ></div>
      Documents Viewer -->

      <!--Book details section -->
      <div class="mx-auto grid grid-cols-1 sm:grid-cols-5 pt-2 mb-4 gap-2 ml-5 mr-5">
        <div class="col-span-1 sm:col-span-4 rounded border-gray-300 dark:border-gray-700 border-2 shadow-lg">
           <div class="container ml-4 mt-3">
              <!-- General informations -->
             <div class="text-3xl xl:text-4xl font-semibold uppercase font-sans text-gray-800 mx-auto text-center pb-2">
                <span>{{ myWork.title }}</span>
            </div>

            <div class="text-lg xl:text-xl mb-1">
              <span class="font-semibold">Author(s): </span>
              <span class="text-gray-600" v-if="myWork.model_name == 'Subject'">
                {{ myWork.author ? myWork.author.name : 'Not Availlable'  }}
              </span>
              <span class="text-gray-700" v-else>
                  {{ myWork.authors[0] ? myWork.authors[0].name : 'Not Availlable' }}
                  {{ myWork.authors[1] ? ', '+myWork.authors[1].name : '' }}
              </span>
            </div>
            <!-- General informations -->
            <div v-if="myWork.model_name == 'Book'" class="text-lg xl:text-xl">
                  <ViewBook :work="myWork" />
            </div>
            <div v-else-if="myWork.model_name == 'Report'" class="text-lg xl:text-xl">
                  <ViewReport :work="myWork" />
            </div>
            <div v-else-if="myWork.model_name == 'Subject'" class="text-lg xl:text-xl">
                  <ViewSubject :work="myWork" />
            </div>
          
           </div>
        </div>
        <div class="col-span-1  w-full sm:col-span-1 border-2 shadow-xm mx-auto rounded">    
            <a class="shadow-lg">
              <img  alt="Placeholder" class="block h-96 w-full" :src="'/'+myWork.cover">
            </a>
        </div>
      </div>
      <!--Book details section -->

      <!--Similar Works -->
      <works 
      :works="Work"
      :title="'Similars Works'"
      :second_title="'Some work related to the current one.'"
        />
      <!--Similar Works -->
      
   </app-layout>
</template>

<script>
import InnerPageHero from "@/Components/InnerPageHero";
import Work from "@/Components/Work";
import ViewBook from "./ViewBook";
import ViewReport from "./ViewReport";
import ViewSubject from "./ViewReport";
import AppLayout from "@/Layouts/AppLayout";

var viewerConfig = {
  showAnnotationTools: false,
  enableFormFilling: false,
  showLeftHandPanel: true,
  showDownloadPDF: false,
  showPrintPDF: false,
  showPageControls: true,
  dockPageControls: true,
  enableLinearization: true,
  embedMode: "",
  enableAnnotationAPIs: true,
  defaultViewMode: "", /* Allowed possible values are "FIT_PAGE", "FIT_WIDTH" or "". */

};


export default {
  components: {
    InnerPageHero,
    AppLayout,
    Work,
    ViewBook,
    ViewReport,
    ViewSubject
  },

  props: {work : Object},
  mountede() {

    var adobeDCView = new AdobeDC.View({clientId: "506e8fa3d68347a2907d0ca5e8bc3c3c", divId: "adobe-dc-view",  locale: "en-US",});
		var previewFilePromise = adobeDCView.previewFile({
			content:{location: {url: "https://mydigitallibrary.test/"+this.myWork.url}},
			metaData:{fileName: this.myWork.title, id: "77c6fa5d-6d74-4104-8349-657c8411a834"}
		}, viewerConfig);
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

  data() {
    return {
      myWork :this.work,
    }
  },

  setup() {},
};
</script>