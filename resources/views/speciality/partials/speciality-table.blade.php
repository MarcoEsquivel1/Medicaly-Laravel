@include('speciality.partials.speciality-edit-modal')
@include('speciality.partials.speciality-delete-modal')
<div class="row py-3">
    <div class="col-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specialities as $speciality)
                    <tr>
                        <td>{{ $speciality->id }}</td>
                        <td>{{ $speciality->specialityName }}</td>
                        <td>
                            {{-- <a href="{{ route('speciality.edit', $speciality->id) }}" id="btn-create" class="btn">
                                <ion-icon name="create-outline"></ion-icon>
                            </a> --}}
                            <button type="button" id="btn-create" class="btn" data-bs-toggle="modal" data-bs-target="#specialityEditModal" data-id="{{ $speciality->id }}" data-name="{{ $speciality->specialityName }}">
                                <ion-icon name="create-outline"></ion-icon>
                            </button>
                            <button type="button" id="btn-delete" class="btn" data-bs-toggle="modal" data-bs-target="#specialityDeleteModal" data-id="{{ $speciality->id }}" data-name="{{ $speciality->specialityName }}">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>