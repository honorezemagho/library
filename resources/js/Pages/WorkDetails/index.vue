<template>
  <app-layout>
     <InnerPageHero image-url="/dist/images/banner-book-details.png" title="Work Details" />
     
      <!--Documents Viewer -->
      <div id="adobe-dc-view" style="height : 500px;"  class="w-full" ></div>
      <!--Documents Viewer -->
      <div class="container mx-auto px-4 sm:px-0 py-8 sm:py-8">
          <h1 v-if="myWork.model_name == 'Report'" class="text-3xl xl:text-4xl font-extrabold text-gray-800 mx-auto text-center  pb-4">Student Report on Title "<span class="uppercase">{{ myWork.title }}</span>"</h1>   
          <h1 v-else-if="myWork.model_name == 'Book'" class="text-3xl xl:text-4xl font-extrabold text-gray-800 mx-auto text-center  pb-4"><span class="uppercase">{{ myWork.title }}</span></h1>   
          <h1 v-else-if="myWork.model_name == 'Subject'" class="text-3xl xl:text-4xl font-extrabold text-gray-800 mx-auto text-center  pb-4"><span class="uppercase">{{ myWork.title }}</span></h1>   
          <h1 v-else class="text-3xl xl:text-4xl font-extrabold text-gray-800 mx-auto text-center  pb-4">Work Title</h1>     
      </div>

      <!--Book details section -->
      <div class="mx-auto grid grid-cols-1 sm:grid-cols-5 pt-2 mb-4 gap-2 ml-5 mr-5">
        <div class="col-span-1 sm:col-span-3 rounded border-gray-300 dark:border-gray-700 border-2 shadow-lg">
            <div>
                <span>Title: </span>
                <span>{{ myWork.title }}</span>
            </div>

            <div>
              <span>Author(s): </span>
              <span></span>
            </div>

            <div>
              <span>Description: </span>
               <span></span>
            </div>
        </div>
        <div class="col-span-1  w-full sm:col-span-2 border-2 shadow-xm mx-auto rounded">    
          <work :work="myWork"></work>
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
    Work
  },

  props: {work : Object},
  mounted() {

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