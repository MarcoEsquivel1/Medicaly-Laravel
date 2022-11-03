<div class="modal fade" id="appointmentEditModal" tabindex="-1" aria-labelledby="appointmentEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4 py-3">
                <h3 class="modal-title" style="color:#3bb9e7" id="appointmentEditModalLabel">Editar Cita</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 pt-1">
                <form action="" method="POST">
                    @csrf @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="form-floating my-4">
                        <select class="form-select" style="background-color: #76c7e5; color: white" name="doctor_id" id="doctor_id" required>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }} {{ $doctor->surname }}</option>
                            @endforeach
                        </select>
                        <label for="doctor_id" style="color: white; font-style: italic;">Doctor</label>
                    </div>
                    <div class="form-floating my-4">
                        <select class="form-select" style="background-color: #76c7e5; color: white" name="patient_id" id="patient_id" required>                        
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }} {{ $patient->surname }}</option>
                            @endforeach
                        </select>
                        <label for="patient_id" style="color: white; font-style: italic;">Paciente</label>
                    </div>
                    <div class="form-floating my-4">
                        <input type="date" class="form-control" style="background-color: #76c7e5; color: white"  name="date" id="date" placeholder="#" value="" required>
                        <label for="date" style="color: white; font-style: italic;">Fecha</label>
                    </div>
                    <div class="form-floating my-4">
                        <input type="time" class="form-control" style="background-color: #76c7e5; color: white"  name="time" id="time" placeholder="#" value="" required>
                        <label for="time" style="color: white; font-style: italic;">Hora</label>
                    </div>
                    <input type="submit" class="btn" style="background: #76c7e5; color: #fff" value="Editar" name="submit">
                    <button type="button" class="btn" style="background: #ff4d89; color: #fff" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
