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
