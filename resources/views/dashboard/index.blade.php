<x-app-layout>
  @section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Bugs</h3>



    <div class="mt-4">
        <div class="flex flex-wrap -mx-6">
            <div class="w-full px-6 sm:w-1/2 xl:w-1/2">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full bg-indigo-500 bg-opacity-75">
                        <img src="{{asset('img/not-done.png')}}" width="40px" height="40px">
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ 1 + 1}}</h4>
                        <div class="text-gray-500">{{  1 + 1 > 1 ? 'Bugs' : "Bug" }} in the System</div>
                    </div>
                </div>
            </div>


            <div class="w-full px-6 sm:w-1/2 xl:w-1/2">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full   bg-yellow-500 bg-opacity-75">
                    <img src="{{asset('img/done.png')}}" width="40px" height="40px">
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{1 + 1}}</h4>
                        <div class="text-gray-500"> {{ 1 + 1 > 1 ? 'Resolved Bugs' : "Resolved Bug" }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>

    <div class="flex flex-col mt-8">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            {{-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Role</th> --}}
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                    @if($books)
                        @foreach ($books as $book)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                            <div class="text-sm leading-5 font-medium text-gray-900">{{$book->name}}</div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{$book->description}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{is_null($book->resolved_by) ? "Not Resolved" : 'Resolved'}}</span>
                                </td>

                                {{-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">Owner</td> --}}

                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <!-- Using utilities: -->

                                @if(is_null($book->resolved_by) && !$book->status)
                                    <form method="post" action="{{route('mark-as-resolved')}}">
                                        @csrf
                                    <input type="hidden" name="id" value="{{$book->id}}">

                                       <button type="submit" class=" {{is_null($book->resolved_by) ? 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded' : '' }}">
                                            {{is_null($book->resolved_by) ? "Mark as Resolved" : ''}}
                                        </button>
                                    </form>

                                @elseif(!$book->status)
                                            <span class="px-2 inline-flex text-xs leading-5  ml-8 rounded-full bg-red-300 text-white-200">Waiting for Approval</span>
                                @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
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
</x-app-layout>
