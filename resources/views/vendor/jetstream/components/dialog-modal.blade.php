@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="">
        <div class="bg-blue-800 text-lg text-blue-100">
           <div class="px-3 py-3">{{ $title }}</div>
        </div>

        <div class="px-2 py-1 mt-1">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
