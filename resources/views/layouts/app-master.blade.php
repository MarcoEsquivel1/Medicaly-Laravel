<!doctype html>
<html lang="en">

<head>
  <title>Dentaly</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">

</head>

<body>
  @auth
  @include('layouts.partials.navbar')
  @endauth
  @yield('content')

  <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>