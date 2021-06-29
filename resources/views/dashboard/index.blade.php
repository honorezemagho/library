<x-app-layout>
  @section('body')
    <h3 class="text-gray-700 text-3xl font-medium">Books</h3>



    <div class="mt-4">
        <div class="flex flex-wrap -mx-6">
            <div class="w-full px-6 sm:w-1/2 xl:w-1/2">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{  $total_books }}</h4>
                        <div class="text-gray-500">{{  $total_books > 1 ? 'Books' : "Book" }} in the library</div>
                    </div>
                </div>
            </div>


            <div class="w-full px-6 sm:w-1/2 xl:w-1/2">
                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{  $total_borrowed_books }}</h4>
                        <div class="text-gray-500"> {{ $total_borrowed_books > 1 ? 'Borrowed books' : "Borrowed Book" }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
</x-app-layout>
