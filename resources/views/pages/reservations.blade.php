@extends('../layouts/' . $layout)

@section('subhead')
    <title>Reservations Management</title>
@endsection

@section('subcontent')
   @livewire('reservations')
@endsection