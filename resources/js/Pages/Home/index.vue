<template>
    <app-layout>
        <Hero />  
        <div class="py-8 sm:py-8 px-4 sm:px-0 container mx-auto">
            <works 
            :works="worksList"
            :title="'Ours Latest Works'"
            :second_title="'Some recent works added in our library'"
             />
             <testimonials />        
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Works from '@/Components/Works'
    import Testimonials from '@/Components/Testimonials'
    import Hero from './Hero'
    export default {
        components: {
            AppLayout,
            Hero,
            Works,
            Testimonials
        },
        mounted() {
        console.log("Index Mounted !");
        },
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
            works :Object,
        },
        data() {
            return {
                worksList : this.works
            }
        },
    }
</script>
