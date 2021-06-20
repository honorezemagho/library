@extends('layouts.app')

@section('body')

  <div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <x-display-messages/>

      <div class="mt-5 md:mt-0 md:col-span-2 flex align-items-center px-3">
        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required autocomplete="title" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-400 rounded-md">
                    @error('title')<span class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                    <input type="text" name="author" id="author" value="{{ old('author') }}" required autocomplete="author" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-400 rounded-md">
                    @error('author')<span class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                    <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" required autocomplete="isbn" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-400 rounded-md">
                    @error('isbn')<span class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror

                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id" required class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-400 rounded-md">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" selected="{{ old('category_id') }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<span class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

              <div>
                <label for="description" class="block text-sm font-medium text-gray-700">
                  Description (Not required)
                </label>
                <div class="form-input mt-1">
                  <textarea id="description" name="description"  rows="3" class="shadow focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-400 rounded-md" placeholder="Brief Description of the book">
                    {{ old('description') ?? null }}
                  </textarea>
                </div>
                @error('description')<span class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="pub_year" class="block text-sm font-medium text-gray-700">Year of Publication</label>
                <input type="number" name="pub_year" value="{{ old('pub_year') }}" min="1600" max="2100" id="pub_year" required autocomplete="pub_year" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-400 rounded-md">
                @error('pub_year')<span class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

              <div>
                <label class="block text-sm font-medium text-gray-700">
                  Cover Photo (Not required)
                </label>
                <div class="form-input mt-1 flex items-center">
                  <input type="file" name="cover"  class="ml-5 bg-white py-2 px-3 border border-gray-400 rounded-md shadow text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"/>
                </div>
                @error('cover')<span class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="number_copies" class="block text-sm font-medium text-gray-700">Number of copies</label>
                <input type="number" min="1" value="{{ old('number_copies') }}" required name="number_copies" id="number_copies" autocomplete="isbn" class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-400 rounded-md">
                @error('number_copies')<span class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

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
