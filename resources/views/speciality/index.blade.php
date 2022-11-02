@extends('layouts.app-master')

@section('content')
<body>
  @include('layouts.partials.toast-messages')
  <div class="container pt-5">
    <div class="row">
        <div class="col-12 col-sm-8">

            <h1 class="display-4" style="color:#3bb9e7">Especialidades</h1>
        </div>
        <div class="col-12 col-sm-4">
            <button id="f-button" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#specialityModal">
                <span class="f-icon"><ion-icon name="add-outline"></ion-icon></span>
                <span class="f-title">Agregar Especialidad</span>               
            </button> 
        </div>
        @include('speciality.partials.speciality-modal')
        @include('speciality.partials.speciality-table')
    </div>   
  </div>

</body>
@endsection