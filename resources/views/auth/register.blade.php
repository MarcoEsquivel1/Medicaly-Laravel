@extends('layouts.app-master')

@section('content')

<body class="img-fluid" style="background-image: url('{{ URL::to('/') }}/images/background.jpg'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <div class="d-flex" style="height: 100vh;">
      <div class="container mx-auto my-auto p-5" style="background-color: white; opacity: 0.97">
        <div class="px-5">  
          <!-- image logo -->
          <div class="row">
            <div class="col-12 pb-3" >
              <h2 class="display-5 text-center my-3">Registrar Usuario</h2>
              <img src='{{ URL::to('/') }}/images/saludlogo.png' class="img-fluid mx-auto d-block" width="150px" alt="logo">
            </div>
            <form action="/register" method="POST">
              @csrf
              @include('layouts.partials.messages')
              <div class="form-floating  my-4">
                <input type="text" class="form-control" style="background-color: #76c7e5; color: white"  name="username" id="username" placeholder="#" required>
                <label for="username" style="color: white; font-style: italic;">Nombre de usuario</label>
              </div>
              <div class="form-floating  my-4">
                <input type="email" class="form-control" style="background-color: #76c7e5; color: white" name="email" id="email" placeholder="#" required>
                <label for="email" style="color: white; font-style: italic; ">Correo</label>
              </div>
              <div class="form-floating  my-4">
                <input type="password" class="form-control" style="background-color: #76c7e5; color: white" name="password" id="password" placeholder="#" required>
                  <label for="password" style="color: white; font-style: italic;">Contraseña</label>
              </div>
              <div class="form-floating  my-4">
                <input type="password" class="form-control" style="background-color: #76c7e5; color: white" name="password_confirmation" id="password_confirmation" placeholder="#" required>
                  <label for="password_confirmation" style="color: white; font-style: italic;">Confirmar Contraseña</label>
              </div>
              <div class="d-flex justify-content-center">
                <a href="/login" class="text-decoration-none" style="color: #76c7e5">¿Ya tienes cuenta? Inicia Sesión</a>
              </div>
              <input type="submit" class="btn" style="background: #76c7e5; color: #fff" value="Registrarse" name="submit">
            </form>
          </div>
        </div>
      </div>
    </div>
</body>

@endsection