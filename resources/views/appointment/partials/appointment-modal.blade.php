<div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="appointmentModalLabel">Editar Cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 pt-1">
                <form action="" method="POST">
                    @csrf
                    <div class="form-floating my-4">
                        <select class="form-select" style="background-color: #76c7e5; color: white" name="patient_id" id="patient_id" required>
                            <option value="" selected disabled>Seleccione un paciente</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
                        <label for="patient_id" style="color: white; font-style: italic;">Paciente</label>
                    </div>
                    <div class="form-floating my-4">
                        <input type="date" class="form-control" style="background-color: #76c7e5; color: white"  name="date" id="date" placeholder="#" required>
                        <label for="date" style="color: white; font-style: italic;">Fecha</label>
                    </div>
                    <div class="form-floating my-4">
                        <input type="time" class="form-control" style="background-color: #76c7e5; color: white"  name="time" id="time" placeholder="#" required>
                        <label for="time" style="color: white; font-style: italic;">Hora</label>
                    </div>
                    <div class="form-floating my-4">
                        <textarea class="form-control" style="background-color: #76c7e5; color: white"  name="comment" id="comment" placeholder="#"></textarea>
                        <label for="comment" style="color: white; font-style: italic;">Comentario</label>
                    </div>
                    <input type="submit" class="btn" style="background: #76c7e5; color: #fff" value="Agregar" name="submit">
                    <button type="button" class="btn" style="background: #ff4d89; color: #fff" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
