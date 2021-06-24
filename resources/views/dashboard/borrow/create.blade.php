@extends('layouts.app')

@section('body')

  <div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <x-display-messages/>

      <div class="mt-5 md:mt-0 md:col-span-2 flex align-items-center px-3">
        <form action="{{ route('admin.borrows.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                <div class="col-span-12 sm:col-span-3">
                    <label for="book_id" class="block text-sm font-medium text-gray-700">book</label>
                    <select name="book_id" id="book_id" required class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-400 rounded-md">
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}" selected="{{ old('book_id') }}">{{ $book->title }}</option>
                        @endforeach
                    </select>
                    @error('book_id')<span class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                </div>

                <div class="col-span-12 sm:col-span-3">
                    <label for="student_id" class="block text-sm font-medium text-gray-700">Student</label>
                    <select name="student_id" id="student_id" required class="form-input mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow sm:text-sm border-gray-400 rounded-md">
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" selected="{{ old('student_id') }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                    @error('student_id')<span class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
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
