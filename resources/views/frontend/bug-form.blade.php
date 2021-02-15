<x-frontend-header/>

<x-display-messages/>
<div class=" my-24   flex flex-col md:mx-64 ">

       <h1 class="md:text-gray-700 text-3xl pb-12  text-center"> Report us Your Bug</h1>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
           <form method="POST" action="{{ route('save-bug') }}" class="mx-8">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" class="md:text-lg"/>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Description -->
            <div class=my-12>
                 <x-label for="name" value="Description" class="md:text-lg"/>
                <x-textarea class="block mt-1 w-full" name="description" required :value="old('description')" >
                <x-slot name="cols">3</x-slot>
                <x-slot name="rows">10</x-slot>
                </x-textarea>
            </div>



            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    Send
                </x-button>
            </div>
        </form>
</div>
<x-frontend-footer/>