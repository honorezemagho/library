@extends('../layouts/base')

@section('body')
    <body class="app">
        @yield('content')

        <!-- BEGIN: JS Assets
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=['your-google-map-api']&libraries=places"></script> -->
        <script src="{{ asset('dist/js/alpine.js') }}" defer></script>
        <script src="{{ asset('dist/js/app.js') }}" defer></script>
        @stack('modals')
        @livewireScripts
        <!-- END: JS Assets-->
    </body>
@endsection
