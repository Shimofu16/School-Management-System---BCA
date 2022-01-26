@extends('admin.registrar-layouts.index')
@section('page-title')Enrolled student @endsection
@section('dashboard-css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('contents')
    <h1 class="h3 mb-4 text-gray-800">@yield('page-title')</h1>
    @include('admin.alert-msgs._success')
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="regStudent-table">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">Student LRN</th>
                            <th class="text-center">Last name</th>
                            <th class="text-center">First name</th>
                            <th class="text-center">Middle name</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Section</th>
                            <th class="text-center">Year Level</th>
                            <th class="text-center">More details</th>
                            <th class="text-center">Actions</th>

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
                                <td class="text-center">{{ $student->section->section_name }}</td>
                                <td class="text-center">{{ $student->gradeLevel->grade_name }}</td>
                                <td class="text-center">
                                    {{--< a class="btn btn-sm btn-info" href="{{ route('enrolled.show', $student) }}">View</> --}}
                                    <a class="btn btn-sm btn-info" href="" data-toggle="modal"
                                    data-target="#view{{ $student->id }}">View</a>
                                    @include('admin.registrar-layouts.students.enrolled.modal._show')
                                </td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <button type="submit" class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                        data-target="#edit{{ $student->id }}">Edit</button>
                                    @include('admin.registrar-layouts.students.enrolled.modal._modal-edit')
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
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#regStudent-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
