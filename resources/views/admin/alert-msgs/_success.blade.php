@if (Session::has('success'))
<div class="custom-alert">
    <div class="col-12">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <hr class="mt-4">
            {{ Session::get('success') }}
        </div>
    </div>
</div>

@endif
@if ($errors->any())

    <div class="custom-alert">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <hr class="mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
