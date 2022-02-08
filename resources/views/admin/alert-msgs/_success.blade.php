@if (Session::has('success'))
    <div class="custom-alert">
        <div class="col-12">
            <div id="success-alert" class="alert alert-success">
                <div class="d-flex justify-content-between align-items-start">
                    <span class=" text-dark">Success</span>
                    <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <hr class="">
                <div class="contents">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    </div>
@elseif (Session::has('error'))
    <div class="custom-alert">
        <div class="col-12">
            <div id="success-alert" class="alert alert-danger">
                <div class="d-flex justify-content-between align-items-start">
                    <span class=" text-dark">Error</span>
                    <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <hr class="">
                <div class="contents">
                    {{ Session::get('error') }}
                </div>

            </div>
        </div>
    </div>
@endif
@if ($errors->any())
    <div class="custom-alert">
        <div class="col-12">
            <div id="success-alert" class="alert alert-danger">
                <div class="d-flex justify-content-between align-items-start">
                    <span class=" text-dark">Error</span>
                    <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <hr class="">
                <div class="contents">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endif
