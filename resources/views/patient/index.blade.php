@extends('layouts.app-master')

@section('content')
<body>
  @include('layouts.partials.toast-messages')
  <div class="container pt-5">
    <div class="row">
        <div class="col-12 col-sm-8">

            <h1 class="display-4" style="color:#3bb9e7">Pacientes</h1>
        </div>
        <div class="col-12 col-sm-4">
            <button id="f-button" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#patientModal">
                <span class="f-icon"><ion-icon name="add-outline"></ion-icon></span>
                <span class="f-title">Agregar Paciente</span>               
            </button> 
        </div>
        @include('patient.partials.patient-modal')
        @include('patient.partials.patient-table')
    </div>   
  </div>

</body>
@endsection