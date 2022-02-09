@extends('admin.registrar-layouts.index')
@section('page-title')Enrollees @endsection
@section('dashboard-css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('contents')
    <h1 class="h3 mb-4 text-gray-800">@yield('page-title')</h1>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="unregStudent-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Student LRN</th>
                            <th class="text-center">Last name</th>
                            <th class="text-center">First name</th>
                            <th class="text-center">Middle name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Grade</th>
                            <th class="text-center">More details</th>
                            <th class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td class="text-center">{{ $student->student_lrn }}</td>
                                <td class="text-center">{{ $student->last_name }}</td>
                                <td class="text-center">{{ $student->first_name }}</td>
                                <td class="text-center">{{ $student->middle_name }}</td>
                                <td class="text-center">{{ $student->gender }}</td>
                                <td class="text-center">{{ $student->age }}</td>
                                <td class="text-center">{{ $student->gradeLevel->grade_name }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-info"
                                        href="{{ route('enrollees.show', $student->id) }}">View</a>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a class="btn btn-sm btn-success mr-1" href="#" data-toggle="modal"
                                        data-target="#accept{{ $student->id }}">Accept</a>
                                    <a class="btn btn-sm btn-danger" href="#">Decline</a>
                                </td>
                            </tr>
                            @include('admin.registrar-layouts.students.enrollees.modal._create')
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
            $('#unregStudent-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
