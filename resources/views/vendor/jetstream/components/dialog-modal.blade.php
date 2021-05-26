@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="">
        <div class="bg-blue-800 text-lg text-blue-50 px-4 pt-3 pb-3 sm:pt-3 sm:pb-2">
            <div class="flex justify-between">
                <div class="flex items-center justify-center">
                    <div class="mx-auto h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        {{ $ico }}
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
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
