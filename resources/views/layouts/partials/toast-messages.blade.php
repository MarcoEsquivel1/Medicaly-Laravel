@if (isset($errors) && count($errors) > 0)
<div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3">
    <div class="toast show align-items-center text-bg-danger border-0 p-2 fs-6" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
        <div class="d-flex">
            <div class="toast-body">
                <ul class="list-unstyled mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

@if (Session::get('success', false))
    <?php 
        $data = Session::get('success');
    ?>
    @if (is_array($data))
        @foreach ($data as $message)
        <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3">
            <div class="toast show align-items-center text-bg-success border-0 p-2 fs-6" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        Exito: {{ $message }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endforeach
    @else
    <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3">
        <div class="toast show align-items-center text-bg-success border-0 p-2 fs-6" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    Exito: {{ $data }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif
@endif