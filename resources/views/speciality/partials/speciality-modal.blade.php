<div class="modal fade" id="specialityModal" tabindex="-1" aria-labelledby="specialityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4 py-3">
                <h3 class="modal-title" style="color:#3bb9e7" id="specialityModalLabel">Agregar Especialidad</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 pt-1">
                <form action="" method="POST">
                    @csrf
                    <div class="form-floating my-4">
                        <input type="text" class="form-control" style="background-color: #76c7e5; color: white"  name="specialityName" id="specialityName" placeholder="#" required>
                        <label for="specialityName" style="color: white; font-style: italic;">Nombre de especialidad</label>
                    </div>
                    <input type="submit" class="btn" style="background: #76c7e5; color: #fff" value="Agregar" name="submit">
                    <button type="button" class="btn" style="background: #ff4d89; color: #fff" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>


