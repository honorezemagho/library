   <div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Book Items Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-jet-button wire:click="showCreateBookItemModal" class=" bg-theme-1 shadow-md mr-2 text-center">Add New Book Item</x-jet-button>    
            <div class="dropdown relative ml-auto sm:ml-0">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> New Category
                        </a>
                        <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="users" class="w-4 h-4 mr-2"></i> New Group
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Book details section -->
    <div class="mx-auto grid grid-cols-1 sm:grid-cols-5 pt-2 mb-8 mt-5 gap-2 ml-5 mr-5">
        <div class="col-span-1 sm:col-span-4 rounded border-gray-300 dark:border-gray-700 border-2 shadow-xl">
             <!-- General informations -->
            <div class="text-3xl xl:text-3xl uppercase text-gray-800 mx-auto text-center pb-2">
                <span>{{ $this->book->title }}</span>
            </div>
              <div class="container ml-4 mt-3">
                <div class="text-lg xl:text-xl mb-1">
                  <span class="font-semibold">Author(s): </span>
                  <span class="text-gray-700" >
                      {{ $book->authors[0] ? $book->authors[0]->name : 'Not Availlable' }}
                  </span>
                </div>
                <!-- General informations -->
                <div class="text-base xl:text-lg">
                  <div>
                      <div class="text-lg xl:text-xl mb-2">
                          <span class="font-semibold">ISBN: </span>
                          <span class="text-gray-700">
                          {{ $this->book->ISBN ? $this->book->ISBN : 'Not Availlable'  }}
                          </span>
                      </div>
              
                      <div class="text-lg xl:text-xl mb-2">
                          <span class="font-semibold">Publisher: </span>
                          <span class="text-gray-700">
                          {{ $this->book->publisher->name ? $this->book->publisher->name : 'Not Availlable'  }}
                          </span>
                      </div>
                      
                      <div class="text-lg xl:text-xl mb-2">
                          <span class="font-semibold">Number of Pages : </span>
                          <span class="text-gray-700">
                          {{ $this->book->number_of_pages ? $this->book->number_of_pages : 'Not Availlable'  }}
                          </span>
                      </div>
                      <div class="text-lg xl:text-xl mb-2">
                          <span class="font-semibold">Language: </span>
                          <span class="text-gray-700">
                          {{ $this->book->language ? $this->book->language : 'Not Availlable'  }}
                          </span>
                      </div>
              
                      <div class="text-lg xl:text-xl mb-2">
                          <span class="font-semibold">Description: </span>
                          <span class="text-gray-700">
                          {{ $this->book->description ? $this->book->description : 'Not Availlable'  }}
                          </span>
                      </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-span-1  w-full sm:col-span-1 shadow-xl mx-auto rounded">    
            <a class="rounded-lg shadow-xl">
                <img  alt="Placeholder" class="block h-72" src="/{{ $this->book->cover }}">
            </a>
        </div>
    </div>

    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 text-center text-gray-900 whitespace-no-wrap">Code</th>
                    <th class="border-b-2 text-center whitespace-no-wrap text-gray-900">Format</th>
                    <th class="border-b-2 text-center whitespace-no-wrap text-gray-900">Price</th>
                    <th class="border-b-2 text-center whitespace-no-wrap text-gray-900">Publish Date</th>
                    <th class="border-b-2 text-center whitespace-no-wrap text-gray-900">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($book_items as $book_item)
                    <tr>
                
                        <td class="text-center border-b">
                            <div class="font-medium whitespace-no-wrap">{{ $book_item->code }}</div>
                        </td>
                         <td class="text-center border-b">
                            <div class="font-medium whitespace-no-wrap">{{ $book_item->format->title }}</div>
                        </td>
                        <td class="text-center border-b">{{ $book_item->price}}</td>
                        <td class="text-center border-b">
                            <div class="font-medium whitespace-no-wrap">{{ $book_item->publish_date }}</div>
                        </td>

                        <td class="border-b w-5">
                            <div  x-data="{ isTouch: false }" class="flex sm:justify-center items-center">
                                <a x-on:click.prevent wire:click="showEditBookItemModal({{ $book_item->id }})" @touchstart.prevent="isTouch = true" class="flex items-center text-theme-4 mr-3" href="">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg> Edit
                                </a>
                                <a x-on:click.prevent wire:click="showDeleteBookItemModal({{ $book_item->id }})" class="flex items-center text-theme-6" href="">
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
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Book Items Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-jet-button wire:click="showCreateBookItemModal" class=" bg-theme-1 shadow-md mr-2 text-center">Add New Book Item</x-jet-button>    
            <div class="dropdown relative ml-auto sm:ml-0">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> New Category
                        </a>
                        <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="users" class="w-4 h-4 mr-2"></i> New Group
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Datatable -->
    <!-- Modal: Add BookItems -->
    <x-jet-dialog-modal :maxWidth="'4xl'" class="z-40" wire:model="showModalForm">
        @if($book_item_id)
        <x-slot name="ico">
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </x-slot>
        <x-slot name="title">Updating a BookItem</x-slot>   
        @else
            <x-slot name="ico">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-slot>
            <x-slot name="title">Creation of a new BookItem</x-slot>  
        @endif
        <x-slot name="close">
            <a x-on:click.prevent @click="@this.closeModal()" href=""> 
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 ml-2 text-white h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a> 
        </x-slot>
     <x-slot name="content">
       <div class="space-y-4 divide-y divide-gray-200">
            <form enctype="multipart/form-data"> 
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 text sm:pb-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 col-span-2 gap-4">
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="format" value="{{ __('Format') }}" />
                            <select id="format" wire:model="format" name="format" data-hide-search="true" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                                @if($this->format == null)
                                    <option selected value="Null">{{ __('Choose a format') }}</option>
                                @endif
                                @foreach ($formats as $format)
                                    <option value="{{ $format->id }}">{{ $format->title }}</option>
                                @endforeach
                            </select>   
                                @error('format') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div> 
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="book_item_code" value="{{ __('Code') }}" />
                            <input id="code" name="code" wire:model="code" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" placeholder="code" required autofocus autocomplete="code">
                            @error('code') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div> 
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="publish_date" value="{{ __('Publish Date') }}" />
                            <input id="publish_date" name="publish_date" wire:model.lazy="publish_date" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" placeholder="publish date" required autofocus autocomplete="publish_date">
                            @error('publish_date') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div> 
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="publish_country" value="{{ __('Publish Country') }}" />
                            <input id="publish_country" name="publish_country" wire:model.lazy="publish_country" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" placeholder="publish country" required autofocus autocomplete="publish_country">
                            @error('publish_country') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div> 
            
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="price" value="{{ __('Price') }}" />
                            <input id="price" name="price" wire:model.lazy="price" type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" placeholder="price" required autofocus autocomplete="price">
                            @error('price') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>
                        
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="status_id" value="{{ __('Status') }}" />
                            <select id="status_id" wire:model="status_id" name="status_id" data-hide-search="true" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                                @if($this->status_id == null)
                                    <option selected value="Null">{{ __('Choose a Status') }}</option>
                                @endif
                                @foreach ($status as $statut)
                                    <option value="{{ $statut->id }}">{{ $statut->title }}</option>
                                @endforeach
                            </select>      
                                @error('status_id') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>
                         <div class="col-span-2 sm:col-span-1"
                            x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"> 

                             <x-jet-label for="url" value="{{ __('File') }}" />
                            <input type="file" id="url" wire:model="url" name="url" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal sm:text-sm sm:leading-5" />
                            <!-- Progress Bar -->
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>   
                            @error('url') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>
                    
                       
                    </div> 
                </div> 
          
            </form> 
        </div>
     </x-slot>
    
     <x-slot name="footer">
       @if($book_item_id)
       <x-jet-button wire:click="updateBookItem">  {{ __('Update') }}</x-jet-button>
       @else
       <x-jet-button wire:click="storeBookItem"> {{ __('Create') }}</x-jet-button>
       @endif
     </x-slot>
    </x-jet-dialog-modal>
    
    <x-jet-confirmation-modal wire:model="showDeleteModalForm">
        <x-slot name="title">Deletion of a BookItem</x-slot>
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
                    @if($this->book_item_id)
                    <p>Do you really want to delete this <span class="text-gray-900 text-bold">Item ?</span> This process cannot be undone.</p>
                    @endif
                </div>      
            </div>
        </x-slot>
        <x-slot name="footer">
           <x-jet-button wire:click="deleteBookItem({{ $this->book_item_id }})" class="bg-red-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
             Delete
        </x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
   </div>



