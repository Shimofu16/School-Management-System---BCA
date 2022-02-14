@extends('admin.layouts.mainLayout')
@section('role')
    Registrar
@endsection
@section('sidebar')
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center flex-column"
            href="{{ route('registrar.dashboard.index') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                {{-- <img src="{{ asset('img/BCA-Logo.png') }}" class="img-fluid" alt=""> --}}
            </div>
            <div class="sidebar-brand-text mx-3">{{ Auth::user()->role }} dashboard</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="{{ Request::is('registrar/dashboard') ? 'active' : '' }} nav-item ">
            <a class="nav-link" href="{{ route('registrar.dashboard.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Menu
        </div>

        <!-- Nav Item - Students Collapse Menu -->
        <li class="nav-item {{ Request::is('registrar/students/*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
                <i class="fas fa-fw fa-users"></i>
                <span>Students</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                    <a class="collapse-item" href="{{ route('enrolled.index') }}">Enrolled Student</a>
                    <a class="collapse-item" href="{{ route('enrollees.index') }}">Enrollees</a>
                    {{-- <a class="collapse-item" href="{{ route('enrollees.create') }}">Add Student</a> --}}
                </div>
            </div>
        </li>

        <!-- Nav Item - Teachers Collapse Me -->
        <li class="nav-item {{ Request::is('registrar/teachers/*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="{{ route('teachers.index') }}">
                <i class="fa-fw fas fa-chalkboard-teacher"></i>
                <span>Teachers</span>
            </a>
            {{-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('teachers.index') }}">Teachers</a>
                    <a class="collapse-item" href="{{ route('teachers.create') }}">Add Teacher</a>
                </div>
            </div> --}}
        </li>
        <!-- Nav Item - Sections -->

        <li class="nav-item {{ Request::is('registrar/section/*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-object-ungroup"></i>
                <span>Sections</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @php
                        $grade_levels = [];
                    @endphp
                    @foreach ($gradeLevels as $gradeLevel)
                        @foreach ($sections as $section)
                            @if ($gradeLevel->grade_name == $section->gradeLevel->grade_name)
                                @php
                                $grade_levels[$gradeLevel->id] = $section->gradeLevel->grade_name
                                @endphp
                            @endif
                        @endforeach
                    @endforeach
                    @foreach ($gradeLevels as $gradeLevel)
                        @foreach ($grade_levels as $grade_level)
                            @if ($gradeLevel->grade_name == $grade_level)
                                <a class="collapse-item" href="{{ route('section.' . str_replace(' ', '', Str::lower($gradeLevel->grade_name)) . '.index') }}">{{ $gradeLevel->grade_name }}</a>
                            @endif
                        @endforeach
                    @endforeach
                    <a class="collapse-item" href="{{ route('section.index') }}">Grade Levels</a>
                </div>
            </div>
        </li>
        <li class="nav-item {{ Request::is('registrar/subjects/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('subject.index') }}">
                <i class="fa-fw fas fa-book"></i>
                <span>Subjects</span>
            </a>
        </li>
        <!-- Nav Item - Teachers Collapse Me -->
        <hr class="sidebar-divider mb-0">
        <li class="nav-item {{ Request::is('teachers', 'teachers/add') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
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
