<template>
     <app-layout>    
            <div class="login">
                <div class="block xl:grid grid-cols-2 gap-4">
                    <!-- BEGIN: Login Info -->
                    <div class="ml-12 hidden xl:flex flex-col min-h-screen">
                        <div class="my-auto">
                            <img alt="LMS" class="ml-8 animate-pulse -intro-x w-1/2" src="dist/images/illustration.png">
                            <div class=" animate-bounce text-gray-100 font-medium text-4xl leading-tight mt-10">A few more clicks to <br> sign in to your account.</div>
                        
                        </div>
                    </div>
                    <!-- END: Login Info -->
                    <!-- BEGIN: Login Form -->
                    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                        <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                            <h2 class=" intro-x font-bold text-2xl xl:text-3xl text-center">Sign In</h2>
                            <div class="animate-pulse intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account.</div>
                        
                            <jet-validation-errors class="mb-4 mt-2" />
                            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                                {{ status }}
                            </div>
                            <form @submit.prevent="submit">
                                <div class="intro-x mt-8">
                                    <jet-input id="email" type="email" class="intro-x login__input input input--lg border border-gray-300 block  w-full" v-model="form.email" placeholder="Email" required autofocus />
                                    <jet-input id="password" type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4  w-full" v-model="form.password" placeholder="Password" required autocomplete="current-password" />
                            </div>
                                <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                                    <div class="flex items-center mr-auto">
                                        <jet-checkbox id="remember-me" name="remember" class="input border mr-2" v-model:checked="form.remember" />
                                        <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                                    </div>
                                
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <inertia-link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                                        Forgot your password?
                                    </inertia-link>

                                    <jet-button class="ml-4 transform duration-500 hover:scale-105 bg-theme-1 text-theme-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Log in
                                    </jet-button>
                    </div>
                            </form>
                        </div>
                    </div>
                    <!-- END: Login Form -->
                </div>
            </div>
     </app-layout>
    
</template>

<style scoped>
.login {
  --tw-bg-opacity: 1;
  background-color: rgba(255, 255, 255, var(--tw-bg-opacity));
  position: relative;
}

@media (max-width: 1279px) {
  .login {
    background: linear-gradient(to bottom, #1C3FAA, #2B51B4);
    background-repeat: no-repeat;
    background-attachment: fixed;
  }
}

.login:before {
  content: "";
  margin-left: -48%;
  background-image: url('./../../../images/bg-login-page.svg');
  background-repeat: no-repeat;
  background-size: auto 100%;
  background-position: right;
  height: 100%;
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
}

@media (max-width: 1279px) {
  .login:before {
    display: none;
  }
}

.login .login__input {
  min-width: 350px;
  box-shadow: 0px 3px 5px #00000007;
}

@media (max-width: 1279px) {
  .login .login__input {
    min-width: 100%;
  }
}
    
.-intro-x:nth-child(2) {
    z-index: 48;
    opacity: 0;
    position: relative;
    transform: translateX(-50px);
    -webkit-animation: 0.4s intro-x-animation ease-in-out 0.33333s;
    animation: 0.4s intro-x-animation ease-in-out 0.33333s;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
    -webkit-animation-delay: 0.2s;
    animation-delay: 0.2s;
}

.leading-tight {
    line-height: 1.25;
}

.w-1\/2 {
    width: 50%;
}
.-mt-16 {
    margin-top: -4rem;
}

</style>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import AppLayout from '@/Layouts/AppLayout'
    import InnerPageHero from '@/Components/InnerPageHero'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            AppLayout,
            InnerPageHero
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
