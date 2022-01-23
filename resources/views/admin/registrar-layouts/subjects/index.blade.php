@extends('admin.registrar-layouts.index')
@section('page-title')Subjects @endsection
@section('contents')
    @include('admin.alert-msgs._success')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-4 text-gray-800 mr-auto pt-3">@yield('page-title')</h1>
            <div class="col-2 d-flex">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#subject">
                    <span class="d-flex align-items-center"><i class="fas fa-plus-circle"></i>&#160; Add Subject</span>
                </button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="subject-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Subject</th>
                            <th class="text-center">Acions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td class="text-center">{{ $subject->id }}</td>
                                <td class="text-center">{{ $subject->subject }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                        data-target="#edit{{ $subject->id }}">Edit</button>
                                    <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#delete{{ $subject->id }}">Delete</button>
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
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#subject-table').DataTable();
        });
    </script>
@endsection
