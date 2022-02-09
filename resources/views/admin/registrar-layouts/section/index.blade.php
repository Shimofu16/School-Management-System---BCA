@extends('admin.registrar-layouts.index')
@section('page-title')Sections @endsection
@section('dashboard-css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('contents')
    @include('admin.alert-msgs._success')
    <div class="row align-items-center mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 py-2">@yield('page-title')</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#add">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Section</span>
                </a>
                @include('admin.registrar-layouts.section.modal._modal-section')
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="section-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Section name</th>
                            <th class="text-center">Grade level</th>
                            <th class="text-center">Number of students</th>
                            <th class="text-center">Adviser</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <td class="text-center">{{ $section->section_name }}</td>
                                <td class="text-center">{{ $section->gradeLevel->grade_name }}</td>
                                @if ($section->students->count() == null)
                                    <td class="text-center">No Student</td>
                                @else
                                    <td class="text-center">{{ $section->students->count() }}</td>
                                @endif
                                @if ($section->adviser == null)
                                    <td class="text-center">No Adviser</td>
                                @else
                                    <td class="text-center">{{ $section->adviser }}</td>
                                @endif

                                <td class="d-flex justify-content-center align-items-center">
                                    <a class="btn btn-sm btn-info mr-1"
                                        href="{{ route('section.show', $section->id) }}">View</a>
                                    <button type="button" class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                        data-target="#edit{{ $section->id }}">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm " data-toggle="modal"
                                        data-target="#delete{{ $section->id }}">Delete</button>
                                    @include('admin.registrar-layouts.section.modal._modal-edit')
                                    @include('admin.registrar-layouts.section.modal._modal-delete')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
@section('dashboard-javascript')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#section-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
