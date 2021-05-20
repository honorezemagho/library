<template>
  <app-layout>
     <InnerPageHero image-url="/dist/images/innerPageHeroAbout.jpg" title="About Us" />

    <div class="container mx-auto px-4 sm:px-0 py-8 sm:py-20">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, odio. Facere laboriosam ad labore voluptatibus temporibus, nam et asperiores iste culpa laudantium fugit quaerat. Recusandae, quidem! Odio cum aut earum blanditiis ea commodi nesciunt quis. Inventore eum pariatur, eius optio rem blanditiis quod ullam velit, fugit et mollitia esse nulla!</p>
      <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, odio. Facere laboriosam ad labore voluptatibus temporibus, nam et asperiores iste culpa laudantium fugit quaerat. Recusandae, quidem! Odio cum aut earum blanditiis ea commodi nesciunt quis. Inventore eum pariatur, eius optio rem blanditiis quod ullam velit, fugit et mollitia esse nulla!</p>
      <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, odio. Facere laboriosam ad labore voluptatibus temporibus, nam et asperiores iste culpa laudantium fugit quaerat. Recusandae, quidem! Odio cum aut earum blanditiis ea commodi nesciunt quis. Inventore eum pariatur, eius optio rem blanditiis quod ullam velit, fugit et mollitia esse nulla!</p>
      <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, odio. Facere laboriosam ad labore voluptatibus temporibus, nam et asperiores iste culpa laudantium fugit quaerat. Recusandae, quidem! Odio cum aut earum blanditiis ea commodi nesciunt quis. Inventore eum pariatur, eius optio rem blanditiis quod ullam velit, fugit et mollitia esse nulla!</p>
    </div>
  </app-layout>
</template>

<script>
import InnerPageHero from "@/Components/InnerPageHero";
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    InnerPageHero,
    AppLayout
  },

  props: {},

  setup() {},
};
</script>