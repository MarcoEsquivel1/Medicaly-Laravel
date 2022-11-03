/* Toggle menu */
let menuToggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
menuToggle.onclick = function () {
    menuToggle.classList.toggle('active');
    navigation.classList.toggle('active');
}

/* Edit speciality modal */
$('#specialityEditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #specialityName').val(name)
})

/* Delete speciality modal */
$('#specialityDeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('#modal-message').text('¿Está seguro que desea eliminar la especialidad ' + name + '?')
})

/* Edit patient modal */
$('#patientEditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    var surname = button.data('surname')
    var phone = button.data('phone')
    var dni = button.data('dni')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #name').val(name)
    modal.find('.modal-body #surname').val(surname)
    modal.find('.modal-body #phone').val(phone)
    modal.find('.modal-body #dni').val(dni)
})

/* Delete patient modal */
$('#patientDeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    var surname = button.data('surname')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('#modal-message').text('¿Está seguro que desea eliminar el paciente ' + name + ' ' + surname + '?')
})

/* Edit doctor modal */
$('#doctorEditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    var surname = button.data('surname')
    var speciality_id = button.data('speciality_id')
    var speciality_name = button.data('speciality_name')
    var start_time = button.data('start_time')
    var end_time = button.data('end_time')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #name').val(name)
    modal.find('.modal-body #surname').val(surname)
    modal.find('.modal-body #speciality_id').val(speciality_id)
    modal.find('.modal-body #speciality_name').val(speciality_name)
    modal.find('.modal-body #start_time').val(start_time)
    modal.find('.modal-body #end_time').val(end_time)
})

/* Delete doctor modal */
$('#doctorDeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var name = button.data('name')
    var surname = button.data('surname')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('#modal-message').text('¿Está seguro que desea eliminar el doctor ' + name + ' ' + surname + '?')
})

/* Edit appointment modal */
$('#appointmentEditModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    var patient_id = button.data('patient_id')
    var patient_name = button.data('patient_name')
    var patient_surname = button.data('patient_surname')
    var doctor_id = button.data('doctor_id')
    var doctor_name = button.data('doctor_name')
    var doctor_surname = button.data('doctor_surname')
    var date = button.data('date')
    var time = button.data('time')
    var modal = $(this)
    modal.find('.modal-body #id').val(id)
    modal.find('.modal-body #patient_id').val(patient_id)
    modal.find('.modal-body #patient_name').val(patient_name)
    modal.find('.modal-body #patient_surname').val(patient_surname)
    modal.find('.modal-body #doctor_id').val(doctor_id)
    modal.find('.modal-body #doctor_name').val(doctor_name)
    modal.find('.modal-body #doctor_surname').val(doctor_surname)
    modal.find('.modal-body #date').val(date)
    modal.find('.modal-body #time').val(time)
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