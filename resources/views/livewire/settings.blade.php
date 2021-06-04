<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Library Configurations</h2>
    </div>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 text sm:pb-4"> 
        <div class="grid grid-cols-1 sm:grid-cols-2 col-span-2 gap-4">
            <div class="col-span-2 sm:col-span-1"> 
                <x-jet-label for="matricule" value="{{ __('Facebook') }}" />
                <input id="facebook_link" name="facebook_link" wire:model.lazy="facebook_link" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" placeholder="facebook link" required autofocus autocomplete="facebook_link">
                @error('facebook_link') <span class="text-red-500">{{ $message }}</span>@enderror 
            </div>   
            <div class="col-span-2 sm:col-span-1"> 
                <x-jet-label for="matricule" value="{{ __('LinkedIn') }}" />
                <input id="linkedIn_link" name="linkedIn_link" wire:model.lazy="linkedIn_link" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" placeholder="facebook link" required autofocus autocomplete="facebook_link">
                @error('linkedIn_link') <span class="text-red-500">{{ $message }}</span>@enderror 
            </div>       
        </div> 
     </div> 
</div>
