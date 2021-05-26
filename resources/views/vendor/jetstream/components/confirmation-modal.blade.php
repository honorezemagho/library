@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="bg-blue-800 text-blue-50 px-4 pt-3 pb-3 sm:pt-3 sm:pb-2">
        <div class="flex justify-between">
            <div class="flex items-center justify-center">
                <div class="mx-auto h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class=" mt-2 ml-2 h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg">
                        {{ $title }}
                    </h3>
                </div>
            </div>
            
            <div class="text-right h-12 w-12 rounded-ful sm:mx-0 sm:h-10 sm:w-10">
                {{ $close }}
            </div>
        </div>
    </div>
    <div class="px-2 py-1 mt-1">
        <div class="text-center text-3xl">
            Are you sure ?
        </div>   
        {{ $content }}
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
