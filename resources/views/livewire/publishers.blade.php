<div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Publishers Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-jet-button wire:click="showCreatePublisherModal" class=" mr-2 text-center bg-blue-800">Add New Publisher</x-jet-button>
            <div class="dropdown relative ml-auto sm:ml-0">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> New Category
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="users" class="w-4 h-4 mr-2"></i> New Group
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 text-center whitespace-no-wrap">IMAGES</th>
                    <th class="border-b-2 whitespace-no-wrap">NAME</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                <tr>
                    <td class="text-center border-b">
                        <div class="flex sm:justify-center">

                            <div class="intro-x w-10 h-10 image-fit -ml-5">
                                <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ asset('dist/images/profile-19.jpg') }}">
                            </div>
                        </div>
                    </td>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap"> {{ $publisher->name }}</div>
                    </td>
                  
                    <td class="border-b w-5">
                        <div  x-data="{ isTouch: false }" class="flex sm:justify-center items-center">
                            <a x-on:click.prevent wire:click="showEditPublisherModal({{ $publisher->id }})" @touchstart.prevent="isTouch = true" class="flex items-center text-theme-4 mr-3" href="">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg> Edit
                            </a>
                            <a x-on:click.prevent wire:click="showDeletePublisherModal({{ $publisher->id }})" class="flex items-center text-theme-6" href="">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                  
             </tbody>
        </table>
    </div>
    <!-- END: Datatable -->

    <!-- Modal create Publisher-->
<x-jet-dialog-modal class="z-40" wire:model="showModalForm">
    @if($publisher_id)
    <x-slot name="ico">
        <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
        </svg>
    </x-slot>
    <x-slot name="title">Updating of a Publisher</x-slot>   
    @else
        <x-slot name="ico">
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </x-slot>
        <x-slot name="title">Creation of a Publisher</x-slot>  
    @endif
    <x-slot name="close">
        <a x-on:click.prevent @click="@this.closeModal()" href=""> 
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 ml-2 text-white h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a> 
    </x-slot>
     <x-slot name="content">
       <div class="space-y-4 divide-y divide-gray-200 ">
            <form>
                    @csrf
                    <div class="mt-2 sm:col-span-12">
                        <x-jet-label for="role" value="{{ __('Name') }}" />
                            <div class="relative">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                @
                            </div> 
                            <input type="text" id="name" wire:model.lazy="name" name="name" class="input pl-12 w-full border col-span-4" />
                            @error('name') <span class="error text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4 sm:col-span-12">
                        <x-jet-label for="role" value="{{ __('Description') }}" />
                        <div class="mt-2">
                            <textarea  id="description" wire:model.lazy="description" data-feature="basic" class="summernote" name="description"></textarea>
                        </div>
                        @error('description') <span class="error text-red-600">{{ $message }}</span> @enderror
                    </div>
            </form>
        </div>
    </div>
    </x-slot>
     <x-slot name="footer">
       @if($publisher_id)
       <x-jet-button wire:click="updatePublisher">Update</x-jet-button>
       @else
       <x-jet-button wire:click="storePublisher">{{ __('Create') }}</x-jet-button>
       @endif
     </x-slot>
 </x-jet-dialog-modal>


    <x-jet-confirmation-modal wire:model="showDeleteModalForm">
    <x-slot name="title">Deletion of a Publisher</x-slot>
    <x-slot name="close">
        <a x-on:click.prevent @click="@this.closeModal()" href=""> 
            <svg xmlns="http://www.w3.org/2000/svg" class="m<div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Publishers Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-jet-button wire:click="showCreatePublisherModal" class=" mr-2 text-center bg-blue-800">Add New Publisher</x-jet-button>
            <div class="dropdown relative ml-auto sm:ml-0">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> New Category
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="users" class="w-4 h-4 mr-2"></i> New Group
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 text-center whitespace-no-wrap">IMAGES</th>
                    <th class="border-b-2 whitespace-no-wrap">NAME</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                <tr>
                    <td class="text-center border-b">
                        <div class="flex sm:justify-center">

                            <div class="intro-x w-10 h-10 image-fit -ml-5">
                                <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ asset('dist/images/profile-19.jpg') }}">
                            </div>
                        </div>
                    </td>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap"> {{ $publisher->name }}</div>
                    </td>
                  
                    <td class="border-b w-5">
                        <div  x-data="{ isTouch: false }" class="flex sm:justify-center items-center">
                            <a x-on:click.prevent wire:click="showEditPublisherModal({{ $publisher->id }})" @touchstart.prevent="isTouch = true" class="flex items-center text-theme-4 mr-3" href="">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg> Edit
                            </a>
                            <a x-on:click.prevent wire:click="showDeletePublisherModal({{ $publisher->id }})" class="flex items-center text-theme-6" href="">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                  
             </tbody>
        </table>
    </div>
    <!-- END: Datatable -->

    <!-- Modal create Publisher-->
<x-jet-dialog-modal class="z-40" wire:model="showModalForm">
    @if($publisher_id)
    <x-slot name="ico">
        <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
        </svg>
    </x-slot>
    <x-slot name="title">Updating of a Publisher</x-slot>   
    @else
        <x-slot name="ico">
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </x-slot>
        <x-slot name="title">Creation of a Publisher</x-slot>  
    @endif
    <x-slot name="close">
        <a x-on:click.prevent @click="@this.closeModal()" href=""> 
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 ml-2 text-white h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a> 
    </x-slot>
     <x-slot name="content">
       <div class="space-y-4 divide-y divide-gray-200 ">
            <form>
                    @csrf
                    <div class="mt-2 sm:col-span-12">
                        <x-jet-label for="role" value="{{ __('Name') }}" />
                            <div class="relative">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                @
                            </div> 
                            <input type="text" id="name" wire:model.lazy="name" name="name" class="input pl-12 w-full border col-span-4" />
                            @error('name') <span class="error text-red-600">{{ $message }}</span> @enderror
                    </div>

                    <div class="mt-4 sm:col-span-12">
                        <x-jet-label for="role" value="{{ __('Description') }}" />
                        <div class="mt-2">
                            <textarea  id="description" wire:model.lazy="description" data-feature="basic" class="summernote" name="description"></textarea>
                        </div>
                        @error('description') <span class="error text-red-600">{{ $message }}</span> @enderror
                    </div>
            </form>
        </div>
    </div>
    </x-slot>
     <x-slot name="footer">
       @if($publisher_id)
       <x-jet-button wire:click="updatePublisher">Update</x-jet-button>
       @else
       <x-jet-button wire:click="storePublisher">{{ __('Create') }}</x-jet-button>
       @endif
     </x-slot>
 </x-jet-dialog-modal>


    <x-jet-confirmation-modal wire:model="showDeleteModalForm">
    <x-slot name="title">Deletion of a Publisher</x-slot>
    <x-slot name="close">
        <a x-on:click.prevent @click="@this.closeModal()" href=""> 
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 ml-2 text-white h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a> 
    </x-slot>
    <x-slot name="content">
        <div class="space-y-8 text-2xl divide-y divide-gray-200">
            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                @if($this->publisher_id)
                <p>Do you really want to delete this <span class="text-gray-900 text-bold">Publisher ?</span> This process cannot be undone.</p>
                @endif
            </div>      
        </div>
    </x-slot>

       <x-slot name="footer">
           <x-jet-button wire:click="deletePublisher({{ $this->publisher_id }})" class="bg-red-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>  
             Delete
            </x-jet-button>
       </x-slot>
   </x-jet-confirmation-modal>
</div>

