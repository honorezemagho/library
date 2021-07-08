

          @foreach ($books as $book)
            <a href="{{ route('book-detail', $book->id ) }}">
              <div class="col-lg-3 col-md-3">
                <div class="speaker" data-aos="fade-up" data-aos-delay="200">
                    @php
                        $book->cover =  $book->cover  ?? 'awaiting_cover.jpg'
                    @endphp
                  <img src=" {{ asset('uploads/'.$book->cover) }}" alt="Speaker 2" class="">
                  <div class="details">
                    <h3><a href="{{ route('book-detail', $book->id) }}">{{ $book->author }}</a></h3>
                    <p>{{  \Str::limit($book->description, 100) ?? 'Book Description'}}</p>
                  </div>
                </div>
              </div>
            </a>
          @endforeach
