<x-frontend-header/>
<x-hero/>
<!-- Start Main Section -->

<main id="main">
    <!-- ======= Speakers Section ======= -->
    <section id="speakers">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Our latest Works</h2>
        </div>

        <div class="row">

            @foreach ($latest_books as $book)

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

        </section><!-- End Speakers Section -->
        <a class="mt-4" href="">
          <h2 class="text-center">View all our works <i class="fa fa-arrow-right" aria-hidden="true"></i></h2>
        </a>
    <!-- ======= Hotels Section ======= -->
    <section id="hotels" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Top Categories</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

            @foreach ($categories as $category)
            <div class="col-lg-4 col-md-6">
                <div class="hotel">
                  <div class="hotel-img">
                    <img src="{{asset('frontend/img/5.jpeg')}}" alt="" class="img-fluid">
                  </div>
                  <h3><a href="#">{{  $category->name }}</a></h3>
                  <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                  <p>9000</p>
                </div>
              </div>
            @endforeach
        </div>subscr
      </div>

    </section><!-- End Hotels Section -->
    <!-- TESTIMONIALS -->
<section class="testimonials">
	<div class="container ">
    <div class="section-header mt-4">
      <h2 class="mt-4">Testimonials</h2>
    </div>
      <div class="row">
        <div class="col-sm-12">
          <div id="customers-testimonials" class="owl-carousel">

            <!--TESTIMONIAL 1 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">EMILIANO AQUILANI</div>
            </div>
            <!--END OF TESTIMONIAL 1 -->
            <!--TESTIMONIAL 2 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">ANNA ITURBE</div>
            </div>
            <!--END OF TESTIMONIAL 2 -->
            <!--TESTIMONIAL 3 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">LARA ATKINSON</div>
            </div>
            <!--END OF TESTIMONIAL 3 -->
            <!--TESTIMONIAL 4 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">IAN OWEN</div>
            </div>
            <!--END OF TESTIMONIAL 4 -->
            <!--TESTIMONIAL 5 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">MICHAEL TEDDY</div>
            </div>
            <!--END OF TESTIMONIAL 5 -->
          </div>
        </div>
      </div>
      </div>
    </section>
    <!-- END OF TESTIMONIALS -->
  </main><!-- End #main -->
<x-frontend-footer/>
