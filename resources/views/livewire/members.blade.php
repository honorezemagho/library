<div>
    <h2 class="intro-y text-lg font-medium mt-10">Members Management</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <x-jet-button wire:click="showCreateMemberModal" class=" bg-theme-1 shadow-md mr-2 text-center">Add New Member</x-jet-button>
            <div class="dropdown relative">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="users" class="w-4 h-4 mr-2"></i> Add Role
                        </a>
                        <a href="" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="message-circle" class="w-4 h-4 mr-2"></i> Send Message
                        </a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 1 of 1 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
           @foreach ($members as $member)
            <div class="intro-y col-span-12 md:col-span-4">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                            <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ $member->profile_photo_url ? $member->profile_photo_url : asset('dist/images/profile-19.jpg') }}">
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">{{ $member->name }}</a>
                            @foreach ($member->roles as $role)
                                <div class="text-gray-600 text-xs">{{ $role->name }}</div>
                            @endforeach
                        </div>
                        <div class="flex mt-4 lg:mt-0">
                            <button  x-on:click.prevent wire:click="showEditMemberModal({{ $member->id }})"class="button button--sm mr-2 text-white bg-theme-4  border border-gray-300">Profile</button>
                            <button x-on:click.prevent wire:click="showDeleteMemberModal({{ $member->id }})" class="button button--sm text-white bg-theme-6 mr-2">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg></button>
                        
                        </div>
                    </div>
                </div>
            </div>
           @endforeach
        <!-- BEGIN: Users Layout -->
        <!-- END: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
           
        </div>
        <!-- END: Pagination -->
    </div>

<!-- Modal create Member-->
<x-jet-dialog-modal :maxWidth="'5xl'" class="z-40" wire:model="showModalForm">
    @if($member_id)
        <x-slot name="ico">
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </x-slot>
        <x-slot name="title">Updating of a Member</x-slot>   
    @else
        <x-slot name="ico">
            <svg xmlns="http://www.w3.org/2000/svg" class="mt-2 ml-2 h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </x-slot>
        <x-slot name="title">Creation of a Member</x-slot>  
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
        <x-jet-validation-errors class="mb-4" />
        <form enctype="multipart/form-data"> 
            @csrf
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 text sm:pb-4"> 
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-3">
                    <div class="grid grid-cols-1 sm:grid-cols-2 col-span-2 gap-4">
                        <div class="col-span-2 text-xl text-center text-gray-800 font-bold">Personnal Details <hr class="mt-2"></div>
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="matricule" value="{{ __('Matricule') }}" />
                            <input id="matricule" name="matricule" wire:model.lazy="matricule" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" placeholder="Matricule" required autofocus autocomplete="matricule">
                            @error('matricule') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div> 
            
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <input id="name" name="name" wire:model.lazy="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" placeholder="Name" required autofocus autocomplete="name">
                         @error('name') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>
    
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="date_of_birth" value="{{ __('Date of Birth') }}" />
                            <input id="date_of_birth" name="date_of_birth" wire:model.lazy="date_of_birth" data-datepicker="true" class="datepicker shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                            @error('date_of_birth') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>

                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <input id="email" wire:model.lazy="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" type="email" name="email" required />
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>

                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <input id="password" wire:model.lazy="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" type="password" name="password" required autocomplete="new-password" />
                             @error('password') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>

                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <input id="password_confirmation" wire:model.lazy="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" type="password" name="password_confirmation" required autocomplete="new-password" />
                            @error('password_confirmation') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>
                    </div> 

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="col-span-2 text-xl text-center text-gray-800 font-bold">Profile Photo <hr class="mt-2"></div>
                        <div class="col-span-2 border border-gray-200 rounded-md p-5">
                            <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                @if ($image)
                                <img class="rounded-md" alt="Profile" src="{{ $image->temporaryUrl() }}">
                                @endif
                                <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2 tooltipstered"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </div>
                            </div>
                            <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="button w-full bg-theme-1 text-white">Change Photo</button>
                                <input type="file" id="image" wire:model="image" name="image" class="w-full h-full top-0 left-0 absolute opacity-0">
                                @error('image') <span class="error text-red-600">{{ $message }}</span> @enderror
    
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 col-span-2 gap-4">
                        <div class="col-span-2 text-xl text-center text-gray-800 font-bold">Additional Details <hr class="mt-2"></div>
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="role" value="{{ __('Phone') }}" />
                            <input type="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="phone" placeholder="Phone" wire:model="phone"> 
                            @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div> 
            
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="country" value="{{ __('Country') }}" />
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="country" placeholder="Country" wire:model="country"> 
                            @error('country') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>
    
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="city" value="{{ __('City') }}" />
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="city" placeholder="City" wire:model="city"> 
                            @error('city') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>
                    </div> 
                     <div class="grid grid-cols-1 col-span-1">
                        <div class="col-span-2 text-xl text-center text-gray-800 font-bold">Roles & Permissions <hr class="mt-2"></div>
                        <div class="col-span-2 sm:-mt-9"> 
                            <select id="role" wire:model="role" name="role" data-hide-search="true" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @if($this->role == null)
                                    <option selected value="Null">{{ __('Choose a role') }}</option>
                                @endif
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>      
                            @error('role') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>
                    </div> 
                </div>
            </div> 
        </form> 
    </div>
 </x-slot>

 <x-slot name="footer">
   @if($member_id)
   <x-jet-button wire:click="updateMember">  {{ __('Update') }}</x-jet-button>
   @else
   <x-jet-button wire:click="storeMember">  {{ __('Store') }}</x-jet-button>
   @endif
 </x-slot>
</x-jet-dialog-modal>


<x-jet-confirmation-modal wire:model="showDeleteModalForm">
<x-slot name="title">Deletion of Member</x-slot>
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
            @if($this->member_id)
            <p>Do you really want to delete this <span class="text-gray-900 text-bold">Member ?</span> This process cannot be undone.</p>
            @endif
        </div>      
    </div>
</x-slot>

   <x-slot name="footer">
       <x-jet-button wire:click="deleteMember({{ $this->member_id }})" class="bg-red-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
         Delete
        </x-jet-button>
   </x-slot>
</x-jet-confirmation-modal>
</div>
