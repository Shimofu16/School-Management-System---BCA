@extends('admin.registrar-layouts.index')
@section('page-title')Sections @endsection
@section('dashboard-css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('contents')
    @include('admin.alert-msgs._success')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-4 text-gray-800 mr-auto pt-3">@yield('page-title')</h1>
            <div class="col-2 d-flex">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSection">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Section</span>
                </button>
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
                            <th class="text-center">No.</th>
                            <th class="text-center">Section name</th>
                            <th class="text-center">Number of students</th>
                            <th class="text-center">Adviser</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <td class="text-center">{{ $section->id }}</td>
                                <td class="text-center">{{ $section->section_name }}</td>
                                @if ($section->students->count() == null)
                                    <td class="text-center">No Student</td>
                                @else

                                    <td class="text-center">{{ $section->students->count() }}</td>
                                @endif
                                @if ($section->advicer == null)
                                    <td class="text-center">No Advicer</td>
                                @else
                                    <td class="text-center">{{ $section->advicer }}</td>
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
    {{-- bakit wala to pota --}}
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