<div class="content-header page-title-row mb-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@yield('page-title')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="active" href="{{ route('admin.registrar-layouts.registrarSidebar') }}">Dashboard</a> </li>
                    <li class="breadcrumb-item">@yield('sidebar-link')</li>
                    <li class="breadcrumb-item active">@yield('sidebar-sublink')</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
