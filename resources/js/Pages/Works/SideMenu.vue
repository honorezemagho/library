<template>
  <div class="">
    <!--First section show the number of the result -->
    <div class="text-center mx-auto mt-2">
        <span class="text-center xs:text-sm text-2xl">{{ updatedWork.length }}</span>
        <span class="text-center xs:text-xl text-base mt-2 ml-2">{{ updatedWork.length >= 2 ?  'RESULTS' : 'RESULT' }} </span>     
    </div>
     <!--First section show the number of the result -->

    <!--Advance search section -->
    <div class="content-center mt-4 mr-2 w-full">
      <vue-collapsible-panel-group >
        <vue-collapsible-panel  class="mb-2" :expanded="true">
            <template #title>
              Advanced Search
            </template>
            <template #content>
              <form @submit.prevent="submit" class="flex flex-col">
                <input class="w-full p-2 border-2 border-gray-300 bg-white h-10  rounded-lg text-sm focus:outline-none"
                type="search" name="search" v-model="form.search" placeholder="Work title" autocomplete="search">
                <button type="submit" class="content-center text-center w-auto ml-4 mr-4 mt-3 rounded-md transform duration-500 hover:scale-105 bg-theme-1 text-theme-2">
                    <span class="text-center">Search</span>
                 </button>
            </form>
            </template>
        </vue-collapsible-panel >
        <vue-collapsible-panel class="mb-2" :expanded="true">
            <template #title>
                Filter Work
            </template>
            <template #content>
               <div class="flex flex-col">
                  <label for="radio-a" class="flex items-center">
                    <span class="">
                      <input id="radio-a" @change="filteredTypeWork" v-model="selectedTypeWork" value="All" type="radio" name="radio" class="">
                    </span>
                    <span class="ml-4">All</span>
                  </label>
                  <label for="radio-b" class="flex items-center">
                    <span class="">
                      <input id="radio-b"  @change="filteredTypeWork" v-model="selectedTypeWork" value="Book" type="radio" name="radio" class="">
                    </span>
                    <span class="ml-4">Books</span>
                  </label>
                  <label for="radio-c" class="flex items-center">
                    <span class="">
                      <input id="radio-c"  @change="filteredTypeWork" v-model="selectedTypeWork" value="Report" type="radio" name="radio" class="">
                    </span>
                    <span class="ml-4">Reports</span>
                  </label>
                  <label for="radio-d" class="flex items-center">
                    <span class="">
                      <input id="radio-d"  @change="filteredTypeWork" v-model="selectedTypeWork" value="Subject" type="radio" name="radio" class="">
                    </span>
                    <span class="ml-4">Subjects</span>
                  </label>
                </div>
            </template>
        </vue-collapsible-panel>
         <vue-collapsible-panel class="mb-2" :expanded="true">
            <template #title>
                Category
            </template>
            <template #content>
               <div id="v-model-multiple-checkboxes" class="flex flex-col">
                  <label for="check-1" class="flex items-center">
                      <input type="checkbox" @change="filterCategories" id="check-1" value="000" v-model="checkedCategories" />
                      <span class="ml-4">General</span>
                  </label>
                  <label for="check-2" class="flex items-center">
                      <input type="checkbox" @change="filterCategories" id="check-2" value="100" v-model="checkedCategories" />
                      <span class="ml-4">philosophy</span>
                  </label>
                  <label for="check-3" class="flex items-center">
                      <input type="checkbox" @change="filterCategories" id="check-3" value="200" v-model="checkedCategories" />
                      <span class="ml-4">Social Sciences</span>
                  </label>
                  <label for="check-4" class="flex items-center">
                      <input type="checkbox" @change="filterCategories" id="check-4" value="300" v-model="checkedCategories" />
                      <span class="ml-4">NS & Maths</span>
                  </label>
                  <label for="check-5" class="flex items-center">
                      <input type="checkbox" @change="filterCategories" id="check-5" value="400" v-model="checkedCategories" />
                      <span class="ml-4">Languages</span>
                  </label>
                </div>
            </template>
        </vue-collapsible-panel>
      </vue-collapsible-panel-group>   
    </div>
     <!--Advance search section -->
  </div>
</template>

<script>

import {VueCollapsiblePanelGroup,  VueCollapsiblePanel,} from '@dafcoe/vue-collapsible-panel'
import '@dafcoe/vue-collapsible-panel/dist/vue-collapsible-panel.css'

export default {
  components: {
    VueCollapsiblePanelGroup,
    VueCollapsiblePanel
  },
  props: {
    results : Object,
    curWorks : Object,
  },
  data() {
    return {
      selectedTypeWork: 'All',
      checkedCategories : [],
      actualWorks :this.curWorks,
      updatedWork : this.curWorks,
      form: this.$inertia.form({
          search: null,
          work_type: 'all',
        }),
    }
  },
  computed: {
      filteredTypeWork : function () 
      {
        this.updatedWork = this.actualWorks.filter(actualWork => actualWork.model_name == this.selectedTypeWork);
        this.$emit('onUpdateWork', this.updatedWork) 
      },

     filterCategories : function(){
       console.log(this.checkedCategories);
     }
    },
  methods: {
    submit() {
      this.$inertia.get('/works/'+this.form.work_type+'/'+this.form.search)
    }
  }
};

</script>