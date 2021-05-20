<template>
    <app-layout>
           <InnerPageHero image-url="/dist/images/innerPageHeroAbout.jpg" title="API Token Management" />

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <api-token-manager :tokens="tokens"
                                   :available-permissions="availablePermissions"
                                   :default-permissions="defaultPermissions" />
            </div>
        </div>
    </app-layout>
</template>

<script>
    import ApiTokenManager from './ApiTokenManager'
    import AppLayout from '@/Layouts/AppLayout'
    import InnerPageHero from '@/Components/InnerPageHero'
   

    export default {
        props: [
            'tokens',
            'availablePermissions',
            'defaultPermissions',
        ],

        components: {
            ApiTokenManager,
            AppLayout,
            InnerPageHero,
        },
    }
</script>
