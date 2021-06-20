@extends('layouts.app')

@section('body')

  <div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <x-display-messages/>

      <div class="mt-5 md:mt-0 md:col-span-2 flex align-items-center px-3">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required autocomplete="name" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-400 rounded-md">
                    @error('name')<span class="mt-2 text-sm text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-400 rounded-md">
                    @error('email')<span class="mt-2 text-sm text-red-500">{{ $message }}</span>@enderror
                </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" required>
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
      <div class="border-t border-gray-200"></div>
    </div>
  </div>
@endsection
