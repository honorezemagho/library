<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Library Configurations</h2>
    </div>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 text mt-4 sm:pb-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="grid grid-cols-2 sm:grid-cols-1 col-span-1 gap-4">
                    <div class="col-span-2 text-xl text-center text-gray-800 font-bold">Logo <hr class="mt-2"></div>
                    <div class="col-span-2 border border-gray-200 rounded-md p-5">
                        <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                            <img class="rounded-md" alt="Profile" src="">
                            <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2 tooltipstered"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </div>
                        </div>
                        <div class="w-40 mx-auto cursor-pointer relative mt-5">
                            <button type="button" class="button w-full bg-theme-1 text-white">Change logo</button>
                            <input type="file" id="image"  name="image" class="w-full h-full top-0 left-0 absolute opacity-0">
                            @error('image') <span class="error text-red-600">{{ $message }}</span> @enderror
    
                        </div>
                    </div>

                    <div class="col-span-2 text-xl text-center text-gray-800 font-bold">Favicon<hr class="mt-2"></div>
                    <div class="col-span-2 border border-gray-200 rounded-md p-5">
                        <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                            <img class="rounded-md" alt="Profile" src="">
                            <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2 tooltipstered"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </div>
                        </div>
                        <div class="w-40 mx-auto cursor-pointer relative mt-5">
                            <button type="button" class="button w-full bg-theme-1 text-white">Change Favicon</button>
                            <input type="file" id="image"  name="image" class="w-full h-full top-0 left-0 absolute opacity-0">
                            @error('image') <span class="error text-red-600">{{ $message }}</span> @enderror
    
                        </div>
                    </div>
                </div>  
                <div class="grid grid-cols-2 sm:grid-cols-2 col-span-2 gap-4">
                    <div class="col-span-2 sm:col-span-1"> 
                        <x-jet-label for="facebook_link" value="{{ __('Facebook') }}" />
                        <div class="relative mt-2">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                                <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                            </div> 
                            <input type="facebook_link" id="facebook_link" wire:model.lazy="facebook_link" name="facebook_link" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                            @error('facebook_link') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div> 
                    </div>  
    
                    <div class="col-span-2 sm:col-span-1"> 
                        <x-jet-label for="twitter_link" value="{{ __('Twitter') }}" />
                        <div class="relative mt-2">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                                <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg> 
                            </div> 
                            <input type="twitter_link" id="twitter_link" wire:model.lazy="twitter_link" name="twiter_link" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                            @error('twitter_link') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div> 
                    </div>  
    
                    <div class="col-span-2 sm:col-span-1"> 
                        <x-jet-label for="twitter_link" value="{{ __('LinkedIn') }}" />
                        <div class="relative mt-2">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                                <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg> 
                            </div> 
                            <input type="twitter_link" id="twitter_link" wire:model.lazy="twitter_link" name="twiter_link" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                            @error('twitter_link') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div> 
                    </div>  
    
                    <div class="col-span-2 sm:col-span-1"> 
                        <x-jet-label for="email_link" value="{{ __('Contact Email') }}" />
                        <div class="relative mt-2">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                                @
                            </div> 
                            <input type="email_link" id="email_link" wire:model.lazy="email_link" name="twiter_link" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                            @error('email_link') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div> 
                    </div> 
                    
                    <div class="col-span-2 sm:col-span-1"> 
                        <x-jet-label for="phone1" value="{{ __('Contact Phone 1') }}" />
                        <div class="relative mt-2">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </div> 
                            <input type="phone1" id="phone1" wire:model.lazy="phone1" name="phone1" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                            @error('phone1') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div> 
                    </div> 
    
                    <div class="col-span-2 sm:col-span-1"> 
                        <x-jet-label for="phone2" value="{{ __('Contact Phone 2') }}" />
                        <div class="relative mt-2">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </div> 
                            <input type="phone2" id="phone2" wire:model.lazy="phone2" name="phone2" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                            @error('phone2') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div> 
                    </div> 
    
                    <div class="col-span-2 sm:col-span-1"> 
                        <x-jet-label for="company_desc" value="{{ __('Company Description') }}" />
                        <div class="relative mt-2">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </div> 
                            <textarea  id="company_desc" wire:model.lazy="company_desc" data-feature="basic" class="summernote" name="company_desc"></textarea>
                            @error('company_desc') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div> 
                    </div> 
    
                    <div class="col-span-2 sm:col-span-1"> 
                        <x-jet-label for="hero_image_title" value="{{ __('Hero Image Title') }}" />
                        <div class="relative mt-2">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </div> 
                            <input type="hero_image_title" id="hero_image_title" wire:model.lazy="hero_image_title" name="hero_image_title" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                            @error('hero_image_title') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div> 
                    </div> 
    
                    <div class="col-span-2 sm:col-span-1"> 
                        <x-jet-label for="hero_image_description" value="{{ __('Hero Image Description') }}" />
                        <div class="relative mt-2">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                            </div> 
                            <textarea  id="hero_image_description" wire:model.lazy="hero_image_description" data-feature="basic" class="summernote" name="hero_image_description"></textarea>
                            @error('hero_image_description') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div> 
                    </div>           
                </div>
            </div>
        </div>
        <div class=" text-center mx-auto mt-2 sm:mt-4">
            <x-jet-button wire:click="showCreateBookItemModal" class=" bg-theme-1 shadow-md mr-2 text-center">Update Configurtion</x-jet-button>    
        </div> 
   </div>
