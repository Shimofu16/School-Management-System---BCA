@extends('admin.layouts.mainLayout')
@section('role')
    Admin
@endsection
@section('sidebar')

    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
            href="{{ route('admin.dashboard.index') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ Auth::user()->role }} dashboard</div>
        </a>
        <!-- Divider -->        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="{{ Request::is('admin') ? 'active' : '' }} nav-item ">
            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>
        <!-- Nav Item - Students Collapse Menu -->
        <li class="nav-item {{ Request::is('website/news', 'website/photo gallery', 'website/academic calendar') }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
                aria-controls="collapseFour">
                <i class="fas fa-fw fa-cogs"></i>
                <span>Manage Website</span>
            </a>
            <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                    <a class="collapse-item" href="">News</a>
                    <a class="collapse-item" href="">Photo Gallery</a>
                    <a class="collapse-item" href="">Academic Calendar</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Users</span>
            </a>

        </li>


        <hr class="sidebar-divider mb-0">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">
                <i class="fas fa-fw fa-power-off"></i>
                <span>Logout</span>
            </a>

        </li>
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
@endsection
