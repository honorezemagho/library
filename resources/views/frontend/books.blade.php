@extends('layouts.custom')
@section('content')

  <main id="main" class="main-page mb-5" >

    <!-- ======= Speaker Details Sectionn ======= -->
    <section id="speakers-details">
      <div class="container">
        <div class="section-header">
          <h2>Our Works</h2>
          <p>Some Books that we have </p>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @foreach ($books as $book)

                <div class="col-lg-3 col-md-3">
                    <div class="speaker" data-aos="fade-up" data-aos-delay="200">
                        @php
                            $book->cover =  $book->cover  ?? 'awaiting_cover.jpg'
                        @endphp
                      <img src=" {{ asset('uploads/'.$book->cover) }}" alt="Speaker 2" class="">
                      <div class="details">
                        <h3><a href="{{ route('admin.books.show', $book->id) }}">{{ $book->author }}</a></h3>
                        <p>{{  \Str::slug($book->description, 100) ?? 'Book Description'}}</p>
                      </div>
                    </div>
                  </div>

                @endforeach
            </div>
          </div>

      </div>

    </section>
  </main>
@endsection
