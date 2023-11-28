
<form action="" method="POST">
    @csrf @method('PUT')
    <div class="form-floating my-4">
        <input type="text" class="form-control" style="background-color: #76c7e5; color: white" @if(isset($doctor) && $doctor->name!= 'null') value="{{$doctor->name}}" @endif  name="name" id="name" placeholder="#">
        <label for="name" style="color: white; font-style: italic;">Nombre de doctor</label>
    </div>
    <div class="form-floating my-4">
        <input type="time" class="form-control" style="background-color: #76c7e5; color: white" @if(isset($doctor)) value="{{$doctor->start_time}}" @endif  name="start_time" id="start_time" placeholder="#" required>
        <label for="start_time" style="color: white; font-style: italic;">Hora de inicio</label>
    </div>
    <div class="form-floating my-4">
        <input type="time" class="form-control" style="background-color: #76c7e5; color: white" @if(isset($doctor)) value="{{$doctor->end_time}}" @endif  name="end_time" id="end_time" placeholder="#" required>
        <label for="end_time" style="color: white; font-style: italic;">Hora de finalización</label>
    </div>
    <input type="submit" class="btn" style="background: #76c7e5; color: #fff" value="Actualizar" name="submit">
</form>
