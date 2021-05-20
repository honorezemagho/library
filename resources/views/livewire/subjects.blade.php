<div>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Subjects Management</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <x-jet-button wire:click="showCreateSubjectModal" class=" bg-theme-1 shadow-md mr-2 text-center">Add New Subject</x-jet-button>
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
        <table class="table table-subject table-subject--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 text-center whitespace-no-wrap">COVER</th>
                    <th class="border-b-2 whitespace-no-wrap">TITLE</th>
                    <th class="border-b-2 whitespace-no-wrap">AUTHOR</th>
                 
                    <th class="border-b-2 text-center whitespace-no-wrap">FIELD</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">LEVEL</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">PERIOD</th>
                     <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($subjects as $subject)
                    <tr>
                        <td style="width: 10%" class="text-center border-b">
                            <div class="flex sm:justify-center">
                                <div class="intro-x w-10 h-10 image-fit">
                                    <img alt="a" class="rounded-full" src="{{ asset('dist/images/profile-19.jpg') }}">
                                </div>
                            </div>
                        </td>
                          <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">{{ $subject->title}}</div>

                        </td>
                         <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">{{ $subject->author->name }}</div>
                            
                        </td>
                        <td class="text-center border-b">{{ $subject->field->title }}</td>
                        <td class="text-center border-b">{{ $subject->level->title }}</td>
                        <td class="text-center border-b">{{ $subject->period->title }}</td>
                       
                        <td class="border-b w-5">
                            <div  x-data="{ isTouch: false }" class="flex sm:justify-center items-center">
                                <a x-on:click.prevent wire:click="showEditSubjectModal({{ $subject->id }})" @touchstart.prevent="isTouch = true" class="flex items-center text-theme-4 mr-3" href="">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg> Edit
                                </a>
                                <a x-on:click.prevent wire:click="showDeleteSubjectModal({{ $subject->id }})" class="flex items-center text-theme-6" href="">
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
        <!-- Modal create Subject-->
<x-jet-dialog-modal :maxWidth="'5xl'" class="z-40" wire:model="showModalForm">
    @if($subject_id)
        <x-slot name="title">Update Student Subject</x-slot>
    @else
        <x-slot name="title">Create Student Subject</x-slot>
    @endif
 <x-slot name="content">
   <div class="space-y-4 divide-y divide-gray-200">
            <form enctype="multipart/form-data"> 
            @csrf
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 text sm:pb-4"> 
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-3">
                    <div class="grid grid-cols-1 sm:grid-cols-2 col-span-2 gap-4">
                        <div class="col-span-2 text-lg text-gray-900">Subject Details</div>
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="title" value="{{ __('Title') }}" />
                            <input id="title" name="title" wire:model.lazy="title" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" placeholder="title" required autofocus autocomplete="title">
                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div> 
            
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="academic_year" value="{{ __('Year') }}" />
                            <input id="academic_year" name="academic_year" wire:model.lazy="academic_year" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" placeholder="Academic Year" required autofocus autocomplete="academic_year">
                         @error('academic_year') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>
                        
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="level" value="{{ __('Level') }}" />
                            <select id="level" wire:model="level" name="level" data-hide-search="true" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                                @if($this->level == null)
                                    <option selected value="Null">{{ __('Choose a level') }}</option>
                                @endif
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->title }}</option>
                                @endforeach
                            </select>      
                             @error('level') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>
                           
                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="field" value="{{ __('Field') }}" />
                            <select id="field" wire:model="field" name="field" data-hide-search="true" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                                @if($this->field == null)
                                    <option selected value="Null">{{ __('Choose a field') }}</option>
                                @endif
                                @foreach ($fields as $field)
                                    <option value="{{ $field->id }}">{{ $field->title }}</option>
                                @endforeach
                            </select>      
                             @error('field') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>

                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="period" value="{{ __('Period') }}" />
                            <select id="period" wire:model="period" name="period" data-hide-search="true" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                                @if($this->period == null)
                                    <option selected value="Null">{{ __('Choose a period') }}</option>
                                @endif
                                @foreach ($periods as $period)
                                    <option value="{{ $period->id }}">{{ $period->title }}</option>
                                @endforeach
                            </select>      
                             @error('period') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>

                        <div class="col-span-2 sm:col-span-1"> 
                            <x-jet-label for="author" value="{{ __('Author') }}" />
                            <select id="author" wire:model="author" name="author" data-hide-search="true" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2">
                                @if($this->author == null)
                                    <option selected value="Null">{{ __('Choose an author') }}</option>
                                @endif
                                @foreach ($authors as $author)
                                    @if ($this->author && $this->author == $author->id )
                                        <option selected value="{{ $author->id }}">{{ $author->name }}</option>
                                    @else
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endif
                                @endforeach
                            </select>      
                             @error('author') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>

                        <div class="col-span-2 sm:col-span-2"> 
                            <x-jet-label for="url" value="{{ __('File') }}" />
                            <input type="file" id="url" wire:model="url" name="url" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal sm:text-sm sm:leading-5" />
                            @error('url') <span class="text-red-500">{{ $message }}</span>@enderror 
                        </div>
                    </div> 

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="col-span-2 text-lg text-gray-900">Cover Photo</div>
                        <div class="col-span-2 border border-gray-200 rounded-md p-5">
                            <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                @if ($cover)
                                <img class="rounded-md" alt="Profile" src="{{ $cover->temporaryUrl() }}">
                                @endif
                                <div class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2 tooltipstered"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-4 h-4"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> </div>
                            </div>
                            <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="button w-full bg-theme-1 text-white">Change Photo</button>
                                <input type="file" id="cover" wire:model="cover" name="cover" class="w-full h-full top-0 left-0 absolute opacity-0">
                                @error('cover') <span class="error text-red-600">{{ $message }}</span> @enderror
    
                            </div>
                        </div>
                    </div>    
                </div>
            </div> 
        </form> 
    </div>
 </x-slot>

 <x-slot name="footer">
   @if($subject_id)
   <x-jet-button wire:click="updateSubject">  {{ __('Update') }}</x-jet-button>
   @else
   <x-jet-button wire:click="storeSubject">  {{ __('Store') }}</x-jet-button>
   @endif
 </x-slot>
</x-jet-dialog-modal>

<x-jet-dialog-modal wire:model="showDeleteModalForm">
    <x-slot name="title">Delete Subject</x-slot>
    <x-slot name="content">
        <div class="space-y-8 text-2xl divide-y divide-gray-200 w-1/2 mt-10">
            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                @if($this->subject_id)
                <p>Delete this Subject ? </p>
            @endif
            </div>      
        </div>
    </x-slot>
    <x-slot name="footer">
       <x-jet-button wire:click="deleteSubject({{ $this->subject_id }})" class="bg-red-700"> Delete</x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
</div>
