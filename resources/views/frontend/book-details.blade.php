@extends('layouts.custom')
@section('content')

<div class="container my-5 py-5">
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
            <img src=" {{ secure_asset('uploads/'.$book->cover) }}" alt="Speaker 2" class="">
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

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if(!empty($book->number_copies))
            <form action="{{ route('request-book') }}" method="post" @error('email')  class="was-invalid" @enderror>
                @csrf
                <div class="form-row">

                <div class="form-inline">
                    <label for=""> Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror mx-sm-3 mb-2">
                    @error('email') <span class="invalid-feedback">{{ $message }}</p> @enderror

                    <input type="hidden" name="book_id" class="form-control mx-sm-3 mb-2" value="{{ $book->id }}">
                </div>
                <button class="btn btn-primary my-2"> Request or Borrow this book</button>
            </form>
            @else
            <h5>This book is no more available</h5>
        @endif

      </div>

    </div>
  </div>

@endsection
