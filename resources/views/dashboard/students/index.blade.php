@extends('layouts.app')

    @section('body')
        <h3 class="text-gray-700 text-3xl font-medium">Users </h3>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-2">
            <a href="{{ route('admin.users.create') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Add New Student
            </a>
          </div>
        <x-display-messages/>

        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-2 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-2 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-2 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-2 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th>

                                <th class="px-2 py-3 border-b border-gray-200 bg-gray-50">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                        @if($users)
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{$user->name}}</div>
                                        </div>
                                    </td>

                                    <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">{{$user->email }}</div>
                                    </td>

                                    <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">{{ $user->role->name }}</div>
                                    </td>

                                    <td class="px-2 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <a href="{{ route('admin.users.edit', $user->id ) }}" class="inline-flex justify-center py-2 px-2 border border-transparent shadow text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.users.destroy', $user->id ) }}" method="post" class="inline-flex justify-center">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="py-2 px-2 border border-transparent shadow text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Delete
                                            </button>
                                        </form>
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

