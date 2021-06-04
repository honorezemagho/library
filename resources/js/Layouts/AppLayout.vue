<template>
    <div>
        <jet-banner />
        <div class="min-h-screen bg-white">
            <!-- Page Nav -->
            <nav id="navbar"
                class="px-4 py-2 sm:py-2 bg-white shadow md:fixed w-full z-10 transition-colors duration-400"
                 :class="{ 'sm:bg-transparent sm:bg:opacity-40 sm:shadow-none': !showWhiteBackground }">
                <!-- Primary Navigation Menu -->
              <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="flex justify-between h-16">
                      <div class="flex">
                          <!-- Logo -->
                          <div class="flex-shrink-0 flex items-center">
                              <inertia-link :href="route('dashboard')">
                                 <img  class="block h-9 w-auto" src="/dist/images/logo.png" alt="">
                              </inertia-link>
                               <div class="text-2xl font-bold ml-2">
                                <span :class="{'sm:text-white': !showWhiteBackground}"><p> Props : {{ $page.props.session }}</p>My Digital</span>
                                <span class="text-primary"> Library</span>
                                </div>
                          </div>
                          <!-- Navigation Links -->
                      
                      </div>

                      <div class="hidden sm:flex sm:items-center sm:ml-6">
                          <!-- Settings Dropdown -->
                           <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                              <jet-nav-link :showWhiteColour="showWhiteBackground" class="nav-link" :href="route('home')" :active="route().current('home')">
                                    <span :class="{'sm:text-white': !showWhiteBackground}">Home</span>         
                                </jet-nav-link>
                          </div>
                          <div class="hidden nav-link space-x-8 sm:-my-px sm:ml-10 sm:flex">
                              <jet-dropdown align="right" width="48">
                                  <template #trigger>
                                      <span class="inline-flex rounded-md">
                                          <button type="button" class="nav-link inline-flex items-center px-3 py-2 border border-transparent text-lg leading-4 font-medium rounded-md text-gray-500 bg-none hover:text-gray-700 focus:outline-none transition">
                                            <span :class="{'sm:text-white': !showWhiteBackground}">Work</span>         
                                              <svg :class="{'sm:text-white': !showWhiteBackground}" class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                              </svg>
                                          </button>
                                      </span>
                                  </template>

                                  <template #content>
                                     <jet-dropdown-link class="nav-link" :href="route('works_type',['books'])">
                                            <span :class="{'sm:text-gray-800': !showWhiteBackground}">Books</span>         
                                      </jet-dropdown-link>
                                      <jet-dropdown-link :href="route('works_type',['reports'])">
                                            <span :class="{'sm:text-gray-800': !showWhiteBackground}">Reports</span>         
                                      </jet-dropdown-link>

                                      <jet-dropdown-link :href="route('works_type',['subjects'])">
                                            <span :class="{'sm:text-gray-800': !showWhiteBackground}">Subjects</span>         
                                      </jet-dropdown-link>

                                      <div class="border-t border-gray-100"></div>
                                  </template>
                              </jet-dropdown>
                          </div>
                          <div class="hidden  space-x-8 sm:-my-px sm:ml-10 sm:flex">
                              <jet-nav-link :showWhiteColour="showWhiteBackground" :href="route('physical-library')" :active="route().current('physical-library')">
                                    <span :class="{'sm:text-white': !showWhiteBackground}">Physical Library</span>         
                                </jet-nav-link>
                          </div>
                          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                              <jet-nav-link :href="route('about')" :active="route().current('about')">
                                    <span :class="{'sm:text-white': !showWhiteBackground}">About</span>         
                          
                                </jet-nav-link>
                          </div>
                          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                              <jet-nav-link :href="route('help')" :active="route().current('help')">
                                    <span :class="{'sm:text-white': !showWhiteBackground}">Help</span>         
                                </jet-nav-link>
                          </div>
                         <div class="hidden nav-link space-x-8 sm:-my-px sm:ml-10 sm:flex">
                              <jet-dropdown align="right" width="48">
                                  <template #trigger>
                                      <span class="inline-flex rounded-md">
                                          <button type="button" class="nav-link inline-flex items-center px-3 py-2 border border-transparent text-lg leading-4 font-medium rounded-md text-gray-500 bg-none hover:text-gray-700 focus:outline-none transition">
                                            <span :class="{'sm:text-white': !showWhiteBackground}">En</span>         
                                              <svg :class="{'sm:text-white': !showWhiteBackground}" class="ml-2 -mr-0.5 h-4 w-4  " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                              </svg>
                                          </button>
                                      </span>
                                  </template>

                                  <template #content>
                                     <jet-dropdown-link class="nav-link" :href="route('login')">
                                            <span :class="{'sm:text-gray-800': !showWhiteBackground}">Fr</span>         
                                      </jet-dropdown-link>
                                      <jet-dropdown-link :href="route('login')">
                                            <span :class="{'sm:text-gray-800': !showWhiteBackground}">En</span>         
                                      </jet-dropdown-link>
                                      <div class="border-t border-gray-100"></div>
                                  </template>
                              </jet-dropdown>
                          </div>

                          <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" v-if="!auth">
                             <jet-nav-link :href="route('login')" :active="route().current('login')">
                                    <button type="button" :class="{'sm:bg-blue-800': showWhiteBackground}" class="inline-flex items-center px-3 py-2 border border-transparent text-lg leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        <span :class="{'sm:text-gray-100': showWhiteBackground}" class="text-gray-800" >Login</span>         
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                        </svg>
                                    </button>
                              </jet-nav-link>
                          </div>
                          <div v-if="auth" class="ml-3 relative">
                              <jet-dropdown align="right" width="48">
                                  <template #trigger>
                                     <div class="flex justify-between" v-if="$page.props.jetstream.managesProfilePhotos">
                                         <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                        </button>
                                        <span :class="{'mt-2':true ,'text-gray-300': !showWhiteBackground}">{{ $page.props.user.name }}</span>
                                   
                                     </div>
                                      <span v-else class="inline-flex rounded-md">
                                          <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                            <span>
                                                {{ $page.props.user.name }}
                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                             </span>
                                          </button>
                                      </span>
                                    
                                  </template>

                                  <template #content>
                                      <!-- Account Management -->
                                      <div class="block px-4 py-2 text-xs text-gray-600">
                                          Manage Account
                                      </div>

                                      <jet-dropdown-link :href="route('profile.show')">
                                          Profile
                                      </jet-dropdown-link>

                                       <a :href="route('admindashboard')" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                        Back-office
                                        </a>


                                      <jet-dropdown-link :href="route('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                          API Tokens
                                      </jet-dropdown-link>

                                      <div class="border-t border-gray-100"></div>

                                      <!-- Authentication -->
                                      <form @submit.prevent="logout">
                                          <jet-dropdown-link as="button">
                                              Log Out
                                          </jet-dropdown-link>
                                      </form>
                                  </template>
                              </jet-dropdown>
                          </div>
                      </div>

                      <!-- Hamburger -->
                      <div class="-mr-2 flex items-center md:hidden">
                          <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                  <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                  <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                              </svg>
                          </button>
                      </div>
                  </div>
              </div>

              <!-- Responsive Navigation Menu -->
              <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                  <div class="pt-2 pb-3 space-y-1">
                      <jet-responsive-nav-link :href="route('home')" :active="route().current('home')">
                          Home
                      </jet-responsive-nav-link>
                       <jet-responsive-nav-link :href="route('about')" :active="route().current('about')">
                          About
                      </jet-responsive-nav-link>
                       <jet-responsive-nav-link :href="route('help')" :active="route().current('help')">
                          Help
                      </jet-responsive-nav-link>
                      
                  </div>
                  
                  
                  <!-- Responsive Settings Options -->
                  <div v-if="auth" class="pt-4 pb-1 border-t border-gray-200">
                      <div class="flex items-center px-4">
                          <div v-if="$page.props.jetstream.managesProfilePhotos" class="flex-shrink-0 mr-3" >
                              <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                          </div>

                          <div>
                              <div class="font-medium text-base text-gray-800">{{ $page.props.user.name }}</div>
                              <div class="font-medium text-sm text-gray-500">{{ $page.props.user.email }}</div>
                          </div>
                      </div>

                      <div class="mt-3 space-y-1">
                          <jet-responsive-nav-link :href="route('profile.show')" :active="route().current('profile.show')">
                              Profile
                          </jet-responsive-nav-link>

                          <jet-responsive-nav-link :href="route('api-tokens.index')" :active="route().current('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                              API Tokens
                          </jet-responsive-nav-link>

                          <!-- Authentication -->
                          <form method="POST" @submit.prevent="logout">
                              <jet-responsive-nav-link as="button">
                                  Log Out
                              </jet-responsive-nav-link>
                          </form>

                          <!-- Team Management -->
                          
                      </div>
                  </div>
              </div>
            </nav>
            <!-- Page Nav -->

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"></slot>
                </div>
            </header>
            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
            <!-- Page Content -->


            <!-- Page footer -->
            <Footer />
            <!-- Page footer -->
        </div>
    </div>
</template>

<style scoped>

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>

<script>
   
    import Footer from '@/Layouts/Footer'
    import JetBanner from '@/Jetstream/Banner'
    import JetApplicationMark from '@/Jetstream/ApplicationMark'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetNavLink from '@/Jetstream/NavLink'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink'
    import { ref } from 'vue';


    export default {
        components: {
            JetBanner,
            Footer,
            JetApplicationMark,
            JetDropdown,
            JetNavLink,
            JetDropdownLink,
            JetResponsiveNavLink,
        },
        mounted() {
            console.log("App Mounted")
               },
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            auth: Boolean,
            laravelVersion: String,
            phpVersion: String,
            session : Object,
        },
        data() {
            return {
                showingNavigationDropdown: false,
                whiteBackground: true,
                local_session : this.session
            }
        },
     
        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            },
        },
        
    setup () {
        const showWhiteBackground = ref(false)
        const page_name = window.location.pathname
        if(page_name == '/login'){
                showWhiteBackground.value = true
        }
        document.addEventListener('scroll', function () {
        const bodyTopPosition = document.body.getBoundingClientRect().top

        if (bodyTopPosition < -125) {
            showWhiteBackground.value = true
        } else {
                if(page_name != '/login'){
                    showWhiteBackground.value = false
            }
           
        }
        })

        return {
        showWhiteBackground
        }
  }

    }
</script>
