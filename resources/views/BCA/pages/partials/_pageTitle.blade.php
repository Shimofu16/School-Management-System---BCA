<div class="py-3 mb-3 border custom-page-tittle">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h1 class="h1 text-gray-800">@yield('page-title')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 py-2">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">@yield('page-title')</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
