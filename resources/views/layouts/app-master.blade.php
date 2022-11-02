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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  @auth
  @include('layouts.partials.navbar')
  @endauth
  @yield('content')
  <script>
    let menuToggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    menuToggle.onclick = function () {
      menuToggle.classList.toggle('active');
      navigation.classList.toggle('active');
    }
  </script>
  <script>
    $('#specialityEditModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #specialityName').val(name)
    })
  </script>
  <script>
    $('#specialityDeleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id)
        modal.find('#modal-message').text('¿Está seguro que desea eliminar la especialidad ' + name + '?')
    })
  </script>
</body>

</html>