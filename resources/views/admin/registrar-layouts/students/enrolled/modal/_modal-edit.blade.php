<div class="modal fade" id="edit{{ $student->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Students information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('enrolled.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group">
                                <label for="student_lrn" class="text-dark text-black font-weight-bold">Student
                                    LRN:</label>
                                <input class="form-control w-75" type="text" name="student_lrn" id="student_lrn"
                                    placeholder="Student LRN" value="{{ $student->student_lrn }}">
                            </div>
                            <div class="form-group">
                                <label for="Lastname" class="text-dark text-black font-weight-bold">Last name:</label>
                                <input class="form-control w-75" type="text" name="last_name" id="Lastname"
                                    placeholder="Last name" value="{{ $student->last_name }}">
                            </div>
                            <div class="form-group">
                                <label for="Firstname" class="text-dark text-black font-weight-bold">First name:</label>
                                <input class="form-control w-75" type="text" name="first_name" id="Firstname"
                                    placeholder="First name" value="{{ $student->first_name }}">
                            </div>
                            <div class="form-group">
                                <label for="Middlename" class="text-dark text-black font-weight-bold">Middle
                                    name:</label>
                                <input class="form-control w-75" type="text" name="middle_name" id="Middlename"
                                    placeholder="Middle name" value="{{ $student->middle_name }}">
                            </div>
                            <div class="form-group">
                                <label for="Extname" class="text-dark text-black font-weight-bold">Ext. name:</label>
                                <input class="form-control w-75" type="text" name="ext_name" id="Extname"
                                    placeholder="Jr. Ma. | write none if you dont have Ext name"
                                    value="{{ $student->ext_name }}">
                            </div>
                        </div>
                        <hr class="bordered">
                        <div class="row">
                            <div class="form-group mr-4">
                                <label for="Extname" class="text-dark text-black font-weight-bold">Gender:</label>
                                <div>
                                    @if ($student->gender == 'Male')
                                        <label for="male" class="radio-inline"><input type="radio" name="gender"
                                                id="male" checked="true" value="{{ $student->gender }}">
                                            Male</label>
                                        <label for="female" class="radio-inline"><input type="radio" name="gender"
                                                id="female" value="{{ $student->gender }}">
                                            Female</label>
                                    @elseif ($student->gender == 'Female')
                                        <label for="male" class="radio-inline"><input type="radio" name="gender"
                                                id="male" value="{{ $student->gender }}">
                                            Male</label>
                                        <label for="female" class="radio-inline"><input type="radio" name="gender"
                                                id="female" checked="true" value="{{ $student->gender }}">
                                            Female</label>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Age" class="text-dark text-black font-weight-bold">Age:</label>
                                <input class="form-control w-25" type="number" name="age" id="Age" placeholder="Age"
                                    value="{{ $student->age }}">
                            </div>
                            <div class="form-group">
                                <label for="bdate" class="text-dark text-black font-weight-bold">Birthdate:</label>
                                <input class="form-control w-75" type="date" name="birthdate" id="bdate"
                                    placeholder="Birthdate" value="{{ $student->birthdate }}">
                            </div>
                            <div class="form-group">
                                <label for="birthplace"
                                    class="text-dark text-black font-weight-bold">Birthplace:</label>
                                <input class="form-control w-75" type="text" name="birthplace" id="birthplace"
                                    placeholder="Birthplace" value="{{ $student->birthplace }}">
                            </div>
                            <div class="form-group">
                                <label for="address" class="text-dark text-black font-weight-bold">Address:</label>
                                <input class="form-control w-75" type="text" name="address" id="address"
                                    placeholder="Address" value="{{ $student->address }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group mr-4">
                                <label for="year_level" class="text-dark text-black font-weight-bold">Year
                                    Level:</label>
                                <select name="yearlevel_id" id="year_level" class="form-control w-100">
                                    @foreach ($yl as $ylevel)
                                        <option value="{{ $ylevel->id }}">{{ $ylevel->yearlevel_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="section" class="text-dark text-black font-weight-bold">Section:</label>
                                <select name="section_id" id="section" class="form-control w-100">
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
