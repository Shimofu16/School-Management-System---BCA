@extends('admin.registrar-layouts.index')
@section('page-title')Add Teacher @endsection
@section('dashboard-css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('contents')
<h1 class="h3 mb-4 text-gray-800">@yield('page-title')</h1>
{{-- error msg --}}
    @if ($errors->any())
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                All Fields are Required!
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
        <div class="w-100 d-flex">
            <div class="col-12 form-overflow">
                <form action="{{ route('teachers.store') }}" method="POST">
                    {{-- {{ route('add_teacher') }} --}}
                    @csrf
                    <div class="form-group">
                        <label for="name" class="text-dark text-black font-weight-bold">Name:</label>
                        <input class="form-control w-75" type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="Extname" class="text-dark text-black font-weight-bold">Gender:</label>
                        <div>
                            <label for="male" class="radio-inline"><input type="radio" name="gender" id="male" value="Male" value="{{ old('gender') }}">
                                Male</label>
                            <label for="female" class="radio-inline"><input type="radio" name="gender" id="female" value="Female" value="{{ old('gender') }}">
                                Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Age" class="text-dark text-black font-weight-bold">Age:</label>
                        <input class="form-control w-25" type="number" name="age" id="Age" placeholder="Age" value="{{ old('age') }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_no" class="text-dark text-black font-weight-bold">Phone No:</label>
                        <input class="form-control w-25" type="tel" name="contact" id="phone_no" placeholder="Phone Number" value="{{ old('phone_no') }}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-dark text-black font-weight-bold">Email:</label>
                        <input class="form-control w-25" type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    <button class="btn btn-bca" type="submit">Add Teacher</button>
                </form>
            </div>
    </div>
@endsection

