<div class="modal fade" id="patientEditModal" tabindex="-1" aria-labelledby="patientEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4 py-3">
                <h3 class="modal-title" style="color:#3bb9e7" id="patientEditModalLabel">Editar Paciente</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 pt-1">
                <form action="" method="POST">
                    @csrf @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="form-floating my-4">
                        <input type="text" class="form-control" style="background-color: #76c7e5; color: white"  name="name" id="name" value="" placeholder="#" required>
                        <label for="name" style="color: white; font-style: italic;">Nombre de paciente</label>
                    </div>
                    <div class="form-floating my-4">
                        <input type="text" class="form-control" style="background-color: #76c7e5; color: white"  name="dni" id="dni" value="" placeholder="#" required>
                        <label for="dni" style="color: white; font-style: italic;">DNI de paciente</label>
                    </div>
                    <div class="form-floating my-4">
                        <input type="text" class="form-control" style="background-color: #76c7e5; color: white"  name="phone" id="phone" value="" placeholder="#" required>
                        <label for="phone" style="color: white; font-style: italic;">Teléfono de paciente</label>
                    </div>
                    <div class="form-floating my-4">
                        <input type="date" class="form-control" style="background-color: #76c7e5; color: white"  name="birthday" id="birthday" value="" placeholder="#" required>
                        <label for="birthday" style="color: white; font-style: italic;">Fecha de nacimiento de paciente</label>
                    </div>
                    <input type="submit" class="btn" style="background: #76c7e5; color: #fff" value="Editar" name="submit">
                    <button type="button" class="btn" style="background: #ff4d89; color: #fff" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>