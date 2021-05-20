<template>
    <inertia-link :href="href" :class="classes" class="{{ showWhiteColour }} ? ' ' : 'text-white'" :showWhiteColour="showWhiteColour">
        <slot></slot>
    </inertia-link>
</template>

<script>
    export default {
        data() {
            return {
                showWhiteColour : false,
            }
        },
        props: ['href', 'active','showWhiteColour'],

        computed: {
            classes() {
                return this.active
                            ? 'inline-flex items-center nav-link px-1 pt-1 border-b-2 border-indigo-400 text-lg font-medium leading-5 text-gray-200 focus:outline-none focus:border-indigo-700 transition'
                            : 'inline-flex items-center nav-link px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-white  hover:text-gray-900 hover:border-blue-700 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition'
            }
        }
    }
</script>
