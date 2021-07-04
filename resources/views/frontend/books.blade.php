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
                <x-books :books=$books/>
          </div>

      </div>

    </section>
  </main>
@endsection
