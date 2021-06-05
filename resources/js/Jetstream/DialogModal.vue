<template>
    <modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
            <div class="bg-blue-800 text-lg text-blue-50 px-4 pt-3 pb-3 sm:pt-3 sm:pb-2">
                <div class="flex justify-between">
                    <div class="flex items-center justify-center">
                        <div class="mx-auto h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <slot name="ico">
                            </slot>
                        </div>
                        
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg">
                                <slot name="title">
                                </slot>
                            </h3>
                        </div>
                    </div>
                    
                    <div class="text-right h-12 w-12 rounded-ful sm:mx-0 sm:h-10 sm:w-10">
                        <slot name="close">
                        </slot>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <slot name="content">
                </slot>
            </div>
     
        <div class="px-6 py-4 bg-gray-100 text-right">
            <slot name="footer">
            </slot>
        </div>
    </modal>
</template>

<script>
    import Modal from './Modal'

    export default {
        emits: ['close'],

        components: {
            Modal,
        },

        props: {
            show: {
                default: false
            },
            maxWidth: {
                default: '2xl'
            },
            closeable: {
                default: true
            },
        },

        methods: {
            close() {
                this.$emit('close')
            },
        }
    }
</script>
