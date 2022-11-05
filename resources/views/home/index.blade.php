@extends('layouts.app-master')

@section('content')
<body>
  <div class="container pt-5">
    <div class="row mb-3">
      <div class="col-12 ">
        <h1 class="display-4" style="color:#3bb9e7">Bienvenido {{auth()->user()->name ?? auth()->user()->username}}</h1>
      </div>
    </div>   
    <div class="row">
      <div class="col-12 col-md-6 py-2">
        <a id="btn-link" href="/doctor" class="btn btn-lg btn-block w-100 align-items-center justify-content-center" style="height: 200px">
          <div class="row h-50">
            <div class="col-12 align-self-center text-center">
              <ion-icon name="medkit-outline" style="font-size: 4.5rem;"></ion-icon>
            </div>
          </div>
          <div class="row h-50">
            <div class="col-12 align-self-center text-center">
              <h1>Perfil</h1>
            </div>
          </div>
        </a>
      </div> 
      <div class="col-12 col-md-6 py-2">
        <a id="btn-link" href="/patient" class="btn btn-lg btn-block w-100 align-items-center justify-content-center" style="height: 200px">
          <div class="row h-50">
            <div class="col-12 align-self-center text-center">
              <ion-icon name="people-outline" style="font-size: 4.5rem;"></ion-icon>
            </div>
          </div>
          <div class="row h-50">
            <div class="col-12 align-self-center text-center">
              <h1>Pacientes</h1>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 py-2">
        <a id="btn-link" href="/appointment" class="btn btn-lg btn-block w-100 align-items-center justify-content-center" style="height: 200px">
          <div class="row h-50">
            <div class="col-12 align-self-center text-center">
              <ion-icon name="calendar-outline" style="font-size: 4.5rem;"></ion-icon>
            </div>
          </div>
          <div class="row h-50">
            <div class="col-12 align-self-center text-center">
              <h1>Citas</h1>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-md-6 py-2">
        <a id="btn-link-2" href="/logout" class="btn btn-lg btn-block w-100 align-items-center justify-content-center" style="height: 200px">
          <div class="row h-50">
            <div class="col-12 align-self-center text-center">
              <ion-icon name="log-out-outline" style="font-size: 4.5rem;"></ion-icon>
            </div>
          </div>
          <div class="row h-50">
            <div class="col-12 align-self-center text-center">
              <h1>Cerrar Sesión</h1>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</body>
@endsection