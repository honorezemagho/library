@extends('../layouts/' . $layout)

@section('subhead')
    <title>Author Management</title>
@endsection

@section('subcontent')
   @livewire('authors')
@endsection