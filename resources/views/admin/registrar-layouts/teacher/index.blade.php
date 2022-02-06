@extends('admin.registrar-layouts.index')
@section('page-title')Teachers @endsection
@section('dashboard-css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('contents')
    <h1 class="h3 mb-4 text-gray-800">@yield('page-title')</h1>
    @include('admin.alert-msgs._success')
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="teacher-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Phone No.</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Action</td>
                            <th class="text-center">Subject</td>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->gender }}</td>
                                <td>{{ $teacher->age }}</td>
                                <td>{{ $teacher->phone_no }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="" data-toggle="modal" data-target="#edit{{ $teacher->id }}">Edit</a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-info" href="" data-toggle="modal" data-target="#view{{ $teacher->id }}">view</a>
                                    <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#add{{ $teacher->id }}">add subject</a>
                                </td>
                            </tr>
                            @include('admin.registrar-layouts.teacher.modal._modal-edit')
                            @include('admin.registrar-layouts.teacher.modal._modal-add')
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
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#teacher-table').DataTable(
                "ordering": false
            );
        });
    </script>
@endsection
