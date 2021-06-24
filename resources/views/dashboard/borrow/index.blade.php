@extends('layouts.app')

    @section('body')
        <h3 class="text-gray-700 text-3xl font-medium">Borrowed Books </h3>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-2">
            <a href="{{ route('admin.borrows.create') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Add New Borrow
            </a>
          </div>
        <x-display-messages/>

        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-2 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-2 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Book</th>
                                <th class="px-2 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Student</th>
                                <th class="px-2 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Borrowed Date</th>
                                <th class="px-2 py-3 border-b border-gray-200 bg-gray-50">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                        @if($borrowed_books)
                            @foreach ($borrowed_books as $borrowed_book)
                                <tr>
                                    <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{$borrowed_book->book->title}}</div>
                                        </div>
                                    </td>

                                    <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">{{$borrowed_book->student->name }}</div>
                                    </td>

                                    <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">{{ $borrowed_book->created_at }}</div>
                                    </td>

                                    <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <a href="{{ route('admin.borrows.edit', $borrowed_book->id ) }}" class="inline-flex justify-center py-2 px-2 border border-transparent shadow text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Edit
                                        </a>

                                        @if(!$borrowed_book->isReturned)
                                            <form action="{{ route('admin.borrows.mark-as-returned', $borrowed_book->id ) }}" method="post" class="inline-flex justify-center">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="py-2 px-2 border border-transparent shadow text-sm font-medium rounded-md text-white bg-green-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Mark as returned
                                                </button>
                                            </form>
                                        @else
                                            Returned
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

