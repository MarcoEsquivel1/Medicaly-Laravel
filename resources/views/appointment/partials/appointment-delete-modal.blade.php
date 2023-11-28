<div class="modal fade" id="appointmentDeleteModal" tabindex="-1" aria-labelledby="appointmentDeleteModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4 py-3">
                <h3 class="modal-title" style="color:#3bb9e7" id="appointmentDeleteModalLabel">Eliminar Cita</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 pt-1">
                <form action="" method="POST">
                    @csrf @method('DELETE')
                    <input type="hidden" name="id" id="id">
                    <p id="modal-message">mensaje</p>
                    <p id="modal-doctor">mensaje</p>
                    <p id="modal-patient">mensaje</p>
                    <p id="modal-date">mensaje</p>
                    <p id="modal-time">mensaje</p>
                    <p id="modal-comment">mensaje</p>
                    <input type="submit" class="btn" style="background: #76c7e5; color: #fff" value="Eliminar" name="submit">
                    <button type="button" class="btn" style="background: #ff4d89; color: #fff" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>