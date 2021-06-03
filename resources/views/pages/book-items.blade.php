@extends('../layouts/' . $layout)

@section('subhead')
    <title>Book Items Management</title>
@endsection

@section('subcontent')
   @livewire('book-items',['book_id' => $book_id])
@endsection