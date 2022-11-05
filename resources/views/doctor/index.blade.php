@extends('layouts.app-master')

@section('content')
<body>
  @include('layouts.partials.toast-messages')
  <div class="container pt-5">
    <div class="row">
        <div class="col-12 col-sm-8">

            <h1 class="display-4" style="color:#3bb9e7">Perfil</h1>
        </div>
        
        @include('doctor.partials.doctor-form')
    </div>   
  </div>

</body>
@endsection