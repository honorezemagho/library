<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Library</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon"> -->
  <link href="{{asset('frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{ asset('frontend/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link  href="{{ asset('frontend/vendor/owl.carousel/assets/owl.carousel.min.css')}}"  rel="stylesheet">
  <link href="{{asset('frontend/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">

</head>

<body>

<header id="header" class="header-fixed">
    <div class="container">


        <div id="logo" class="pull-left">
            <a href="{{url('/')}}" class="scrollto h1">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
          </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
            <li class="menu-active"><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{ route('books') }}">Works</a></li>
            <li><a href="{{route('about')}}">About</a></li>
            <li><a href="{{route('login')}}">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- End Header -->


  @yield('content')
  <x-frontend-footer/>
