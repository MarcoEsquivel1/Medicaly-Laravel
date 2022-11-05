@include('appointment.partials.appointment-edit-modal')
@include('appointment.partials.appointment-delete-modal')
<div class="row py-3">
    <div class="col-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Paciente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr @if($appointment->done) class="table-danger text-decoration-line-through" @endif>
                        <td>{{ $appointment->patient->name }} {{ $appointment->patient->surname }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>{{ $appointment->comment }}</td>
                        <td>{{ $appointment->done ? 'Hecho' : 'Pendiente' }}</td>
                        <td class="d-flex">
                            {{-- <a href="{{ route('appointment.edit', $appointment->id) }}" id="btn-create" class="btn">
                                <ion-icon name="create-outline"></ion-icon>
                            </a> --}}
                            <button type="button" id="btn-create" class="btn mx-1" data-bs-toggle="modal" data-bs-target="#appointmentEditModal" data-id="{{ $appointment->id }}" data-patient_id="{{ $appointment->patient->id }}" data-patient_name="{{ $appointment->patient->name }}" data-date="{{ $appointment->date }}" data-time="{{ $appointment->time }}" data-comment="{{ $appointment->comment }}">
                                <ion-icon name="create-outline"></ion-icon>
                            </button>
                            <button type="button" id="btn-delete" class="btn mx-1" data-bs-toggle="modal" data-bs-target="#appointmentDeleteModal" data-id="{{ $appointment->id }}" data-patient_name="{{ $appointment->patient->name }}"  data-date="{{ $appointment->date }}" data-time="{{ $appointment->time }} data-comment="{{ $appointment->comment }}">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $appointment->id }}">
                                <input type="hidden" name="done" value="{{ $appointment->done }}">
                                <button type="submit" id="btn-create" name="btn-done" class="btn mx-1">
                                    <ion-icon name="checkmark-outline"></ion-icon>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
