@include('appointment.partials.appointment-edit-modal')
@include('appointment.partials.appointment-delete-modal')
<div class="row py-3">
    <div class="col-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->patient->name }} {{ $appointment->patient->surname }}</td>
                        <td>{{ $appointment->doctor->name }} {{ $appointment->doctor->surname }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>
                            {{-- <a href="{{ route('appointment.edit', $appointment->id) }}" id="btn-create" class="btn">
                                <ion-icon name="create-outline"></ion-icon>
                            </a> --}}
                            <button type="button" id="btn-create" class="btn" data-bs-toggle="modal" data-bs-target="#appointmentEditModal" data-id="{{ $appointment->id }}" data-patient_id="{{ $appointment->patient->id }}" data-patient_name="{{ $appointment->patient->name }}" data-patient_surname="{{ $appointment->patient->surname }}" data-doctor_id="{{ $appointment->doctor->id }}" data-doctor_name="{{ $appointment->doctor->name }}" data-doctor_surname="{{ $appointment->doctor->surname }}" data-date="{{ $appointment->date }}" data-time="{{ $appointment->time }}">
                                <ion-icon name="create-outline"></ion-icon>
                            </button>
                            <button type="button" id="btn-delete" class="btn" data-bs-toggle="modal" data-bs-target="#appointmentDeleteModal" data-id="{{ $appointment->id }}" data-patient_name="{{ $appointment->patient->name }}" data-patient_surname="{{ $appointment->patient->surname }}" data-doctor_name="{{ $appointment->doctor->name }}" data-doctor_surname="{{ $appointment->doctor->surname }}" data-date="{{ $appointment->date }}" data-time="{{ $appointment->time }}">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
