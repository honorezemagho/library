<template>
  <app-layout>
     <InnerPageHero image-url="/dist/images/banner-book-details.png" title="Work Details" />
     
      <!--Documents Viewer -->
      <div id="adobe-dc-view" style="height : 500px;"  class="w-full" ></div>
      <!--Documents Viewer -->
      <div class="container mx-auto px-4 sm:px-0 py-8 sm:py-20">
          <h1 v-if="myWork.type == 'Report'" class="text-3xl xl:text-4xl font-extrabold text-gray-800 mx-auto text-center  pb-4">Student Report on Title <span class="uppercase">{{ myWork.title }}</span></h1>   
          <h1 v-else-if="myWork.type == 'Book'" class="text-3xl xl:text-4xl font-extrabold text-gray-800 mx-auto text-center  pb-4"><span class="uppercase">{{ myWork.title }}</span></h1>   
          <h1 v-else-if="myWork.type == 'Subject'" class="text-3xl xl:text-4xl font-extrabold text-gray-800 mx-auto text-center  pb-4"><span class="uppercase">{{ myWork.title }}</span></h1>   
          <h1 v-else class="text-3xl xl:text-4xl font-extrabold text-gray-800 mx-auto text-center  pb-4">Work Title</h1>   
       
      </div>
   </app-layout>
</template>

<script>
import InnerPageHero from "@/Components/InnerPageHero";
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
    AppLayout
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
    var img = $(".MainApp__app___1_k3Y").html();
    console.log("__________________________________________________");
    console.log(img);
    
  },

  data() {
    return {
      myWork :this.work,
    }
  },

  setup() {},
};
</script>