<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Smart Wallet :: {{(Request::path() == '/') ? 'Home' : ucwords(Request::path())}}</title>
    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="{{ asset('assets/css/style-starter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
  </head>
<body>
        @include('nav.header')
        @yield('banner')
    <v-app id="app">

        @yield('content')

    </v-app>
        @include('nav.footer')
    <script src="{{ asset('js/app.js') }}"></script>
    @include('nav.scripts')
</body>
</html>
