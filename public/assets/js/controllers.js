/* Toggle menu */
let menuToggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
menuToggle.onclick = function () {
    menuToggle.classList.toggle('active');
    navigation.classList.toggle('active');
}

/* Edit patient modal */
$('#patientEditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    var phone = button.data('phone')
    var dni = button.data('dni')
    var birthday = button.data('birthday')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #name').val(name)
    modal.find('.modal-body #phone').val(phone)
    modal.find('.modal-body #dni').val(dni)
    modal.find('.modal-body #birthday').val(birthday)
})

/* Delete patient modal */
$('#patientDeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('#modal-message').text('¿Está seguro que desea eliminar el paciente ' + name + ', tambien se eliminaran su citas?')
})

/* Edit appointment modal */
$('#appointmentEditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var patient_id = button.data('patient_id')
    var patient_name = button.data('patient_name')
    var date = button.data('date')
    var time = button.data('time')
    var comment = button.data('comment')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #patient_id').val(patient_id)
    modal.find('.modal-body #patient_name').val(patient_name)
    modal.find('.modal-body #date').val(date)
    modal.find('.modal-body #time').val(time)
    modal.find('.modal-body #comment').val(comment)
})

/* Delete appointment modal */
$('#appointmentDeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var patient = button.data('patient_name') + " " + button.data('patient_surname')
    var doctor = button.data('doctor_name') + " " + button.data('doctor_surname')
    var date = button.data('date')
    var time = button.data('time')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('#modal-message').text('¿Está seguro que desea eliminar la cita?')
    modal.find('#modal-doctor').text('Doctor: ' + doctor)
    modal.find('#modal-patient').text('Paciente: ' + patient)
    modal.find('#modal-date').text('Fecha: ' + date)
    modal.find('#modal-time').text('Hora: ' + time)
})