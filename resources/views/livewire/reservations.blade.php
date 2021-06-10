<div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Reservation Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-jet-button wire:click="showCreateResrvationModal" class=" mr-2 text-center bg-blue-800">Add New Reservation</x-jet-button>
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
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead class=" rounded-lg shadow-lg">
                <tr>
                    <th class="border-b-2 text-center text-base">Code</th>
                    <th class="border-b-2 text-center text-base ">User</th>
                    <th class="border-b-2 text-center text-base">Reserved Date</th>
                    <th class="border-b-2 text-center text-base">Issue Date</th>
                    <th class="border-b-2 text-center text-base">Due Date</th>
                    <th class="border-b-2 text-center w-5 text-base">Status</th>
                    <th class="border-b-2 text-center text-base">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td class="border-b text-center ">
                        <div class="font-medium "> {{ $reservation->book->code  }}</div>
                    </td>
                    <td class="border-b text-center ">
                        <div class="font-medium "> {{ $reservation->user->name }}</div>
                    </td>
                    <td class="border-b text-center ">
                        <div class="font-medium "> {{ $reservation->reserv_date }}</div>
                    </td>
                    <td class="border-b text-center ">
                        <div class="font-medium "> {{ $reservation->issue_date }}</div>
                    </td>
                    <td class="border-b text-center ">
                        <div class="font-medium "> {{ $reservation->due_date }}</div>
                    </td>
                    <td class="flex justify-con border-b w-auto mx-auto text-center ">
                        @if($reservation->status->slug == "pending")
                            <div class="flex content-center ont-medium p-1 rounded-lg  bg-yellow-700 text-gray-50 opacity-75"> 
                                <span class="mr-1 content-center">{{ $reservation->status->title }}</span>
                                <svg width="" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="rgb(45, 55, 72)" class="content-center w-6 h-6">
                                    <circle cx="15" cy="15" r="15">
                                        <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate>
                                        <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate>
                                    </circle>
                                    <circle cx="60" cy="15" r="9" fill-opacity="0.3">
                                        <animate attributeName="r" from="9" to="9" begin="0s" dur="0.8s" values="9;15;9" calcMode="linear" repeatCount="indefinite"></animate>
                                        <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.8s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite"></animate>
                                    </circle>
                                    <circle cx="105" cy="15" r="15">
                                        <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate>
                                        <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate>
                                    </circle>
                                </svg>
                            </div>
                        @else
                        <div class=" p-1 font-medium rounded-lg  bg-green-700 text-gray-50 opacity-75"> {{ $reservation->status->title }}</div>
                        @endif
                    
                    </td>
                  
                    <td class="border-b w-5">
                        <div  x-data="{ isTouch: false }" class="flex sm:justify-center items-center">
                            @if($reservation->status->slug == "pending")
                                <a x-on:click.prevent wire:click="confirmReservation({{ $reservation->id }})" @touchstart.prevent="isTouch = true" class="flex items-center text-theme-4 mr-3" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg> Validate
                                 </a>
                            @else
                                <a x-on:click.prevent  @touchstart.prevent="isTouch = true" class="flex items-center text-theme-4 mr-3" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg> Validated
                                </a>
                            @endif
                            <a x-on:click.prevent wire:click="showEditReservationModal({{ $reservation->id }})" @touchstart.prevent="isTouch = true" class="flex items-center text-theme-4 mr-3" href="">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <a x-on:click.prevent wire:click="showDeleteReservationModal({{ $reservation->id }})" class="flex items-center text-theme-6" href="">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
             </tbody>
        </table>
    </div>
    <!-- END: Datatable -->

    <!-- Modal create Author--> 
    <x-jet-dialog-modal class="z-40" wire:model="showModalForm">
        @if($reservation_id)
        <x-slot name="ico">
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </x-slot>
        <x-slot name="title">Updating of an Reservation</x-slot>   
        @else
            <x-slot name="ico">
                <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-slot>
            <x-slot name="title">Creation of an Reservation</x-slot>  
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
                    
                </form>
            
        </div>
        </x-slot>
        <x-slot name="footer">
        @if($reservation_id)
        <x-jet-button wire:click="updateAuthor">Update</x-jet-button>
        @else
        <x-jet-button wire:click="storeAuthor">{{ __('Create') }}</x-jet-button>
        @endif
        </x-slot>
    </x-jet-dialog-modal>

    
    <x-jet-confirmation-modal wire:model="showDeleteModalForm">
        <x-slot name="title">Deletion of a reservation</x-slot>
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
                    @if($this->reservation_id)
                    <p>Do you really want to delete this <span class="text-gray-900 text-bold">Reservation ?</span> This process cannot be undone.</p>
                @endif
                </div>      
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click="deleteReservation({{ $this->reservation_id }})" class="bg-red-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Delete
            </x-jet-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>

