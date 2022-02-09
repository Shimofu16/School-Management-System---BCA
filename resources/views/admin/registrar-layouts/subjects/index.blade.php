@extends('admin.registrar-layouts.index')
@section('page-title')Subjects @endsection
@section('contents')
    @include('admin.alert-msgs._success')
    <div class="row align-items-center mb-3">
        <div class="col">
            <h1 class="h3 text-gray-800 py-2">@yield('page-title')</h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#add">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Subject</span>
                </a>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="subjects-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Grade</th>
                            <th class="text-center">Subject</th>
                            <th class="text-center">Acions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td class="text-center">{{ $subject->gradeLevel->grade_name }}</td>
                                <td class="text-center">{{ $subject->subject }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                        data-target="#edit{{ $subject->id }}">Edit</a>
                                    <a class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#delete{{ $subject->id }}">Delete</a>
                                    @include('admin.registrar-layouts.subjects.modal._modal-edit')
                                    @include('admin.registrar-layouts.subjects.modal._modal-delete')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    @include('admin.registrar-layouts.subjects.modal._modal-subject')
@endsection
@section('dashboard-javascript')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#subjects-table').DataTable(
                "ordering": false
            );
        });
    </script>
@endsection
