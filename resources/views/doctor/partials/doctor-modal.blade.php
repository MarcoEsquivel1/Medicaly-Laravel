<div class="modal fade" id="doctorModal" tabindex="-1" aria-labelledby="doctorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4 py-3">
                <h3 class="modal-title" style="color:#3bb9e7" id="doctorModalLabel">Agregar Doctor</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 pt-1">
                <form action="" method="POST">
                    @csrf
                    <div class="form-floating my-4">
                        <input type="text" class="form-control" style="background-color: #76c7e5; color: white"  name="name" id="name" placeholder="#" required>
                        <label for="name" style="color: white; font-style: italic;">Nombre de doctor</label>
                    </div>
                    <div class="form-floating my-4">
                        <input type="text" class="form-control" style="background-color: #76c7e5; color: white"  name="surname" id="surname" placeholder="#" required>
                        <label for="surname" style="color: white; font-style: italic;">Apellido de doctor</label>
                    </div>
                    <div class="form-floating my-4">
                        <select class="form-select" style="background-color: #76c7e5; color: white" name="speciality_id" id="speciality_id" required>
                            <option value="" selected disabled>Seleccione una especialidad</option>
                            @foreach ($specialities as $speciality)
                                <option value="{{ $speciality->id }}">{{ $speciality->specialityName }}</option>
                            @endforeach
                        </select>
                        <label for="speciality_id" style="color: white; font-style: italic;">Especialidad</label>
                    </div>
                    <div class="form-floating my-4">
                        <input type="time" class="form-control" style="background-color: #76c7e5; color: white"  name="start_time" id="start_time" placeholder="#" required>
                        <label for="start_time" style="color: white; font-style: italic;">Hora de inicio</label>
                    </div>
                    <div class="form-floating my-4">
                        <input type="time" class="form-control" style="background-color: #76c7e5; color: white"  name="end_time" id="end_time" placeholder="#" required>
                        <label for="end_time" style="color: white; font-style: italic;">Hora de finalización</label>
                    </div>
                    <input type="submit" class="btn" style="background: #76c7e5; color: #fff" value="Agregar" name="submit">
                    <button type="button" class="btn" style="background: #ff4d89; color: #fff" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
