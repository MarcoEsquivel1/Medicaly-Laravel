@extends('layouts.app-master')

@section('content')

<body class="img-fluid" style="background-image: url('{{ URL::to('/') }}/images/background.jpg'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
  <div class="d-flex" style="height: 100vh;">
    <div class="container mx-auto my-auto p-5" style="background-color: white; opacity: 0.97">
      <div class="px-5">
        <!-- image logo -->
        <div class="row">
          <div class="col-12 pb-3" >
            <h2 class="display-5 text-center my-3">Login</h2>
            <img src='{{ URL::to('/') }}/images/dentista.png' class="img-fluid mx-auto d-block" width="150px" alt="logo">
          </div>
          <form action="/login" method="POST">
            @csrf
            @include('layouts.partials.messages')
            <div class="form-floating my-4">
              <input type="text" class="form-control" style="background-color: #76c7e5; color: white"  name="username" id="username" placeholder="#" required>
              <label for="username" style="color: white; font-style: italic;">Nombre de usuario/Correo</label>
            </div>
            <div class="form-floating  my-4">
              <input type="password" class="form-control" style="background-color: #76c7e5; color: white" name="password" id="password" placeholder="#" required>
                <label for="password" style="color: white; font-style: italic;">Contraseña</label>
            </div>
            <input type="submit" class="btn" style="background: #76c7e5; color: #fff" value="Iniciar Sesión" name="submit">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

@endsection