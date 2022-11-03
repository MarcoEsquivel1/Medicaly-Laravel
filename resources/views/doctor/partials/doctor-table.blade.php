@include('doctor.partials.doctor-edit-modal')
@include('doctor.partials.doctor-delete-modal')
<div class="row py-3">
    <div class="col-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Hora de entrada</th>
                    <th scope="col">Hora de salida</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->id }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->surname }}</td>
                        <td>{{ $doctor->speciality->specialityName }}</td>
                        <td>{{ $doctor->start_time}}</td>
                        <td>{{ $doctor->end_time}}</td>
                        <td>
                            {{-- <a href="{{ route('doctor.edit', $doctor->id) }}" id="btn-create" class="btn">
                                <ion-icon name="create-outline"></ion-icon>
                            </a> --}}
                            <button type="button" id="btn-create" class="btn" data-bs-toggle="modal" data-bs-target="#doctorEditModal" data-id="{{ $doctor->id }}" data-name="{{ $doctor->name }}" data-surname="{{ $doctor->surname }}" data-speciality_id="{{ $doctor->speciality->id}}" data-speciality_name="{{ $doctor->speciality->specialityName }}" data-start_time="{{ $doctor->start_time }}" data-end_time="{{ $doctor->end_time }}">
                                <ion-icon name="create-outline"></ion-icon>
                            </button>
                            <button type="button" id="btn-delete" class="btn" data-bs-toggle="modal" data-bs-target="#doctorDeleteModal" data-id="{{ $doctor->id }}" data-name="{{ $doctor->name }}" data-surname="{{ $doctor->surname }}">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
