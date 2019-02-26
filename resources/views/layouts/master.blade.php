<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Video Club</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    @include('partials.navbar')
    <div id='app' class="container"> 
        @yield('content')
        {!! Alert::render() !!}
    </div>
   
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
  </body>
</html>
