@extends('layouts.custom')
@section('content')

<div class="container mt-5 pt-5">
    <div class="section-header">
      <h2>Book Details</h2>
      <p>{{ $book->title }}</p>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="speaker">
            @php
                $book->cover =  $book->cover  ?? 'awaiting_cover.jpg'
            @endphp
            <img src=" {{ asset('uploads/'.$book->cover) }}" alt="Speaker 2" class="">
        </div>
      </div>

      <div class="col-md-6">
        <div class="details">
          <h2>{{ $book->title }}</h2>

          <p>Author: {{ $book->author }}</p>
          <p>ISBN: {{ $book->isbn }}</p>
          <P>Date of Publication {{ $book->pub_year }}</P>
          <P>Available {{ $book->number_copies}}</P>

          <p>Description : {{ $book->description }}</p>

        </div>
      </div>

    </div>
  </div>

@endsection
