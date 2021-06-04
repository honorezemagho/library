<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Library Configurations</h2>
    </div>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 text mt-4 sm:pb-4"> 
        <div class="grid grid-cols-1 sm:grid-cols-2 col-span-2 gap-4">
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
                <x-jet-label for="linkedIn_link" value="{{ __('LinkedIn') }}" />
                <div class="relative mt-2">
                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                        <svg viewBox="0 50 512 512" >
                            <path  class="h-6 w-6" fill="#828282" d="M150.65,100.682c0,27.992-22.508,50.683-50.273,50.683c-27.765,0-50.273-22.691-50.273-50.683
                            C50.104,72.691,72.612,50,100.377,50C128.143,50,150.65,72.691,150.65,100.682z M143.294,187.333H58.277V462h85.017V187.333z
                            M279.195,187.333h-81.541V462h81.541c0,0,0-101.877,0-144.181c0-38.624,17.779-61.615,51.807-61.615
                            c31.268,0,46.289,22.071,46.289,61.615c0,39.545,0,144.181,0,144.181h84.605c0,0,0-100.344,0-173.915
                            s-41.689-109.131-99.934-109.131s-82.768,45.369-82.768,45.369V187.333z"/>
                          </svg>
                    </div> 
                    <input type="linkedIn_link" id="linkedIn_link" wire:model.lazy="linkedIn_link" name="linkedIn_link" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                    @error('linkedIn_link') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div> 
             </div>  

        </div> 
     </div>
</div>
