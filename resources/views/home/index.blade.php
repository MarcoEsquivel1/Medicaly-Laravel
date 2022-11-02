@extends('layouts.app-master')

@section('content')
<body>
  <div class="container pt-5">
    <div class="row">
      <div class="col-12">
          <h1 class="display-4" style="color:#3bb9e7">Bienvenido {{auth()->user()->name ?? auth()->user()->username}}</h1>
          <p>
            <a href="/logout">Cerrar sesión</a>
          </p>
      </div>
    </div>    
  </div>
</body>
@endsection