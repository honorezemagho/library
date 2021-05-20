<template>
    <div class="container mx-auto pt-16">
        <div class="pb-12">
            <h1 class="text-3xl xl:text-4xl font-extrabold text-gray-800 mx-auto text-center  pb-4">Testimonials</h1>
            <p class="text-xl text-gray-600  w-11/12 mx-auto xl:mx-0 text-center">I just wanted to share a quick note and let you know that you guys do a really good job. I’m glad I decided to work with you. It’s really great how easy your websites are to update.</p>
        </div>
        <section id="carousel">
            <figure class="visible">
                <div class="flex flex-wrap justify-around">
                    <Testimonial />
                    <Testimonial />
                    <Testimonial />
                </div>
            </figure>
            <figure class="hidden">
                <div class="flex flex-wrap justify-around">
                    <Testimonial />
                    <Testimonial />
                    <Testimonial />
                </div>
            </figure>
        </section>
        <div class="cursor-pointer flex justify-center pt-4 pb-8 sm:pt-8 md:pt-8 lg:pt-8 xl:pt-12">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#CBD5E0" fill="none" stroke-linecap="round" stroke-linejoin="round" @click="movePrev()">
                <path stroke="none" d="M0 0h24v24H0z" />
                <polyline points="15 6 9 12 15 18" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#CBD5E0" fill="none" stroke-linecap="round" stroke-linejoin="round" @click="moveForward()">
                <path stroke="none" d="M0 0h24v24H0z" />
                <polyline points="9 6 15 12 9 18" />
            </svg>
        </div>
    </div>
</template>

<script>
import Testimonial from "@/Components/Testimonial"
export default {
    components:{
        Testimonial
    },
    data() {
        return {
            current: 0,
        };
    },
    methods: {
        getFigures() {
            return document.getElementById("carousel").getElementsByTagName("figure");
        },
        moveForward() {
            var pointer = 0;
            var figures = this.getFigures();
            for (var i = 0; i < figures.length; i++) {
                if (figures[i].className == "visible") {
                    figures[i].className = "hidden";
                    pointer = i;
                    this.$data.current = pointer + 1;
                }
            }
            if (++pointer == figures.length) {
                pointer = 0;
            }
            figures[pointer].className = "visible";
        },
        movePrev() {
            var figures = this.getFigures();
            for (var i = 0; i < figures.length; i++) {
                if (figures[i].className == "visible") {
                    figures[i].className = "hidden";
                }
            }
            if (this.$data.current === 0) {
                this.$data.current = figures.length - 1;
                figures[this.$data.current].className = "visible";
            } else {
                this.$data.current = this.$data.current - 1;
                figures[this.$data.current].className = "visible";
            }
        },
    },
};
</script>
