<!doctype html>
<html lang="en">

<head>
  <title>Dentaly</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="{{url('assets/css/nav.css')}}" type="text/css" rel="stylesheet">
  <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>
  @auth
  @include('layouts.partials.navbar')
  @endauth
  @yield('content')

  <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script>
    let menuToggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    menuToggle.onclick = function () {
      menuToggle.classList.toggle('active');
      navigation.classList.toggle('active');
    }
  </script>
</body>

</html>