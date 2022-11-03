@include('patient.partials.patient-edit-modal')
@include('patient.partials.patient-delete-modal')
<div class="row py-3">
    <div class="col-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->surname }}</td>
                        <td>{{ $patient->dni }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>
                            {{-- <a href="{{ route('patient.edit', $patient->id) }}" id="btn-create" class="btn">
                                <ion-icon name="create-outline"></ion-icon>
                            </a> --}}
                            <button type="button" id="btn-create" class="btn" data-bs-toggle="modal" data-bs-target="#patientEditModal" data-id="{{ $patient->id }}" data-name="{{ $patient->name }}" data-surname="{{ $patient->surname }}" data-dni="{{ $patient->dni }}" data-phone="{{ $patient->phone }}">
                                <ion-icon name="create-outline"></ion-icon>
                            </button>
                            <button type="button" id="btn-delete" class="btn" data-bs-toggle="modal" data-bs-target="#patientDeleteModal" data-id="{{ $patient->id }}" data-name="{{ $patient->name }}" data-surname="{{ $patient->surname }}">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>