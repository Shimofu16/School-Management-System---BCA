@extends('admin.registrar-layouts.index')
@section('page-title')Student Information @endsection
@section('dashboard-css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('contents')
    <div class="row">
        <div class="col-12">
            {{$student->first_name}}
        </div>
    </div>
@endsection
@section('dashboard-javascript')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#regStudent-table').DataTable();
        });
    </script>
@endsection
