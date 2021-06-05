<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Library Configurations</h2>
    </div>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 text mt-4 sm:pb-4">       
        <div class="grid grid-cols-2 sm:grid-cols-2 col-span-2 gap-4">

            <div class="col-span-2 sm:col-span-1"> 
                <x-jet-label for="default_issue_days" value="{{ __('Default Issue/Reserve Due Day') }}" />
                <div class="relative mt-2">
                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                    </div> 
                    <input type="default_issue_days" id="default_issue_days" wire:model.lazy="default_issue_days" name="twiter_link" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                    @error('default_issue_days') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div> 
            </div>  

            <div class="col-span-2 sm:col-span-1"> 
                <x-jet-label for="max_issue_book_limit" value="{{ __('Max Issue Books Limit') }}" />
                <div class="relative mt-2">
                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                    </div> 
                    <input type="max_issue_book_limit" id="max_issue_book_limit" wire:model.lazy="max_issue_book_limit" name="max_issue_book_limit" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                    @error('max_issue_book_limit') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div> 
            </div>  

            <div class="col-span-2 sm:col-span-1"> 
                <x-jet-label for="max_reserv_book_limit" value="{{ __('Max Reserve Books Limit') }}" />
                <div class="relative mt-2">
                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z" clip-rule="evenodd" />
                        </svg>
                    </div> 
                    <input type="email_link" id="email_link" wire:model.lazy="max_reserv_book_limit" name="max_reserv_book_limit" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                    @error('max_reserv_book_limit') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div> 
            </div> 
            
            <div class="col-span-2 sm:col-span-1"> 
                <x-jet-label for="book_due_reminder_before_Days" value="{{ __('Book Due Reminder Before Days') }}" />
                <div class="relative mt-2">
                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z" clip-rule="evenodd" />
                        </svg>
                    </div> 
                    <input type="book_due_reminder_before_Days" id="book_due_reminder_before_Days" wire:model.lazy="book_due_reminder_before_Days" name="book_due_reminder_before_Days" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                    @error('book_due_reminder_before_Days') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div> 
            </div> 

            <div class="col-span-2 sm:col-span-1"> 
                <x-jet-label for="fine_per_overdue_day" value="{{ __('Penalty Per Day') }}" />
                <div class="relative mt-2">
                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                    </div> 
                    <input type="fine_per_overdue_day" id="fine_per_overdue_day" wire:model.lazy="fine_per_overdue_day" name="fine_per_overdue_day" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                    @error('fine_per_overdue_day') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div> 
            </div> 

            <div class="col-span-2 sm:col-span-1"> 
                <x-jet-label for="currency" value="{{ __('Currency') }}" />
                <div class="relative mt-2">
                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                        </svg>
                    </div> 
                    <input type="currency" id="currency" wire:model.lazy="currency" name="currency" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                    @error('currency') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div> 
            </div> 
        
            <div class="col-span-2 sm:col-span-1"> 
                <x-jet-label for="lib_default_language" value="{{ __('Default Language') }}" />
                <div class="relative mt-2">
                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.02.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z" clip-rule="evenodd" />
                        </svg>
                    </div> 
                    <input type="lib_default_language" id="lib_default_language" wire:model.lazy="lib_default_language" name="lib_default_language" class="shadow appearance-none border rounded w-full py-2 px-11 text-gray-700 leading-tight focus:outline-none focus:shadow-outline " />
                    @error('lib_default_language') <span class="error text-red-600">{{ $message }}</span> @enderror
                </div> 
            </div> 
        
        </div>
    </div>
    <div class="text-center mx-auto mt-2 sm:mt-4">
        <x-jet-button wire:click="showCreateBookItemModal" class="bg-theme-1 text-lg shadow-md mr-2 text-center">Update Configurtion</x-jet-button>    
    </div> 
</div>
