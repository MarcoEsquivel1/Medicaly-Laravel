@extends('layouts.app-master')

@section('content')
<body>
  <div class="container pt-5">
    <h1 class="text-primary">Bienvenido {{auth()->user()->name ?? auth()->user()->username}}</h1>
    <p>
      <a href="/logout">Cerrar sesión</a>
    </p>
  </div>
</body>
@endsection