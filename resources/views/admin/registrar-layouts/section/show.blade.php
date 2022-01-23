@extends('admin.registrar-layouts.index')
@section('page-title')Sections @endsection
@section('dashboard-css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('contents')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-4 text-gray-800 mr-auto pt-3">{{ $sections->section_name }}</h1>
            <div class="col-1 d-flex">
                <a href="{{ route('section.index') }}" class="btn btn-primary btn-sm d-flex align-items-center mr-1">

                    <span class="d-flex align-items-center"><i class="fas fa-chevron-circle-left"></i>&#160;Back</span>
                </a>
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
                            <th class="text-center">Student LRN</th>
                            <th class="text-center">First Name</th>
                            <th class="text-center">Middle Name</th>
                            <th class="text-center">Last Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections->students as $student)
                            <tr>
                                <td>{{ $student->student_lrn }}</td>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->middle_name }}</td>
                                <td>{{ $student->last_name }}</td>
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
