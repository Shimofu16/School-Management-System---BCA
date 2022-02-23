<div>

    <form wire:submit.prevent="register">
        @csrf
        {{-- STEP 1 --}}
        @if ($currentStep == 1)
            <div class="step-one">
                <div class="card">
                    <div
                        class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                        <div class="text-left border rounded p-2">1/5</div>
                        <div class="w-100">
                            <span class="d-flex justify-content-center ">Student’s Information </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-9 col-lg-7 mb-3">
                                <label for="student_lrn" class="text-dark h5 font-weight-bold">Learner Reference Number
                                    (LRN)</label>
                                <input class="form-control @error('student_lrn') is-invalid @enderror" type="text"
                                    name="student_lrn" id="student_lrn" placeholder="Ex. 123456789101"
                                    wire:model="student_lrn">
                                @error('student_lrn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-9 col-lg-5 mb-3 mr-3">
                                <label for="first_name" class="text-dark h5 font-weight-bold">First name </label>
                                <input class="form-control @error('first_name') is-invalid @enderror" type="text"
                                    name="first_name" id="first_name" placeholder="Ex. Juan" wire:model="first_name">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-9 col-lg-5 mb-3 mr-3">
                                <label for="middle_name" class="text-dark h5 font-weight-bold">Middle name </label>
                                <input class="form-control @error('middle_name') is-invalid @enderror" type="text"
                                    name="middle_name" id="middle_name" placeholder="Ex. Santos"
                                    wire:model="middle_name">
                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-9 col-lg-5 mb-3 mr-3">
                                <label for="last_name" class="text-dark h5 font-weight-bold">Last name </label>
                                <input class="form-control @error('last_name') is-invalid @enderror" type="text"
                                    name="last_name" id="last_name" placeholder="Ex. Dela Cruz" wire:model="last_name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3 mr-3">
                                <label for="ext_name" class="text-dark h5 font-weight-bold">Ext. name</label>
                                <input class="form-control @error('ext_name') is-invalid @enderror" type="text"
                                    name="ext_name" id="ext_name" placeholder="Ex. Jr." wire:model="ext_name">
                                @error('ext_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5 col-lg-3 mb-3 mr-3">
                                <label for="Male" class="text-dark h5 font-weight-bold">Gender </label>
                                <div>
                                    @if ($gender == 'Male')
                                        <label for="male"
                                            class="radio-inline py-2 mr-1 gender @error('gender') is-invalid @enderror"><input
                                                type="radio" name="gender" id="male" value="Male" wire:model="gender"
                                                checked>
                                            Male</label>
                                    @else
                                        <label for="male"
                                            class="radio-inline py-2 mr-1 gender @error('gender') is-invalid @enderror"><input
                                                type="radio" name="gender" id="male" value="Male" wire:model="gender">
                                            Male</label>
                                    @endif

                                    @if ($gender == 'Female')
                                        <label for="female"
                                            class="radio-inline py-2 mr-1 gender @error('gender') is-invalid @enderror"><input
                                                type="radio" name="gender" id="female" value="Female"
                                                wire:model="gender" checked>
                                            Female</label>
                                    @else
                                        <label for="female"
                                            class="radio-inline py-2 mr-1 gender @error('gender') is-invalid @enderror"><input
                                                type="radio" name="gender" id="female" value="Female"
                                                wire:model="gender">
                                            Female</label>
                                    @endif

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-5 mb-3 mr-3">
                                <label for="age" class="text-dark h5 font-weight-bold">Age </label>
                                <input class="form-control        @error('age') is-invalid @enderror" type="number"
                                    name="age" id="age" placeholder="Age" wire:model="age">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-9 col-lg-5 mb-3 mr-3">
                                <label for="email" class="text-dark h5 font-weight-bold">Email </label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                    name="email" id="email" placeholder="Ex. student@email.com" wire:model="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-lg-5 mb-3 mr-3">
                                <label for="birthdate" class="text-dark h5 font-weight-bold">Birthdate </label>
                                <input class="form-control @error('birthdate') is-invalid @enderror" type="date"
                                    name="birthdate" id="birthdate" placeholder="birthdate" wire:model="birthdate">
                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-9 col-lg-5 mb-3 mr-3">
                                <label for="birthplace" class="text-dark h5 font-weight-bold">Birthplace</label>
                                <input class="form-control @error('birthplace') is-invalid @enderror" type="text"
                                    name="birthplace" id="birthplace" placeholder="Ex. Quezon City"
                                    wire:model="birthplace">
                                @error('birthplace')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-9 col-lg-5 mb-3 mr-3">
                                <label for="address" class="text-dark h5 font-weight-bold">Address </label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text"
                                    name="address" id="address" placeholder="Ex. Brgy Lamot 2, Quezon City"
                                    wire:model="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-9 col-lg-7">
                                <label for="grade_level_id " class="text-dark h5 font-weight-bold">Grade Level </label>
                                <select name="grade_level_id" id="grade_level_id "
                                    class="form-control @error('grade_level_id') is-invalid @enderror"
                                    wire:model="grade_level_id" required>
                                    <option selected disabled value="" class="text-center">--- Select grade level ---
                                    </option>
                                    @foreach ($gradelevels as $gradelevel)
                                        <option value="{{ $gradelevel->grade_level }}" class="text-center">
                                            {{ $gradelevel->grade_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('grade_level_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif



        {{-- STEP 2 --}}
        @if ($currentStep == 2)
            <div class="step-two">
                <div class="card">
                    <div
                        class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                        <div class="text-left border rounded p-2">2/5</div>
                        <div class="w-100">
                            <span class="d-flex justify-content-center ">Parent’s Information </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-9 col-lg-5 mb-3 mr-3">
                                <label for="father_name" class="text-dark h5 font-weight-bold">Father Full name</label>
                                <input class="form-control @error('father_name') is-invalid @enderror" type="text"
                                    name="father_name" id="father_name" placeholder="Ex. Juan G. Dela Cruz Sr."
                                    wire:model="father_name">
                                @error('father_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 col-lg-4 mr-3 mb-3">
                                <label for="father_birthdate" class="text-dark h5 font-weight-bold">Birthdate</label>
                                <input class="form-control @error('father_birthdate') is-invalid @enderror" type="date"
                                    name="father_birthdate" id="father_birthdate" wire:model="father_birthdate">
                                @error('father_birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-9 col-lg-5 mr-3 mb-3">
                                <label for="father_email" class="text-dark h5 font-weight-bold">Email</label>
                                <input class="form-control @error('father_email') is-invalid @enderror" type="text"
                                    name="father_email" id="father_email" placeholder="Ex. jCruz@gmail.com"
                                    wire:model="father_email">
                                @error('father_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <p class="form-text text-muted">Fill up your preferred contact
                            method.
                        </p>
                        <div class="form-row mb-3">
                            <div class="col-md-9 col-lg-5 mr-3 ">
                                <label for="father_landline" class="text-dark h5 font-weight-bold">Landline</label>
                                <input class="form-control @error('father_landline') is-invalid @enderror" type="text"
                                    name="father_landline" id="father_landline" placeholder=""
                                    wire:model="father_landline">
                                @error('father_landline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-9 col-lg-5 mr-3 ">
                                <label for="father_contact_no" class="text-dark h5 font-weight-bold">Contact
                                    no.</label>
                                <input class="form-control @error('father_contact_no') is-invalid @enderror"
                                    type="text" name="father_contact_no" id="father_contact_no" placeholder=""
                                    wire:model="father_contact_no">
                                @error('father_contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-9 col-lg-5 mr-3 mb-3">
                                <label for="father_occupation" class="text-dark h5 font-weight-bold">Occupation</label>
                                <input class="form-control @error('father_occupation') is-invalid @enderror"
                                    type="text" name="father_occupation" id="father_occupation"
                                    wire:model="father_occupation">
                                @error('father_occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-9 col-lg-5 mr-3 mb-3">
                                <label for="father_office_address" class="text-dark h5 font-weight-bold">Office
                                    address</label>
                                <input class="form-control @error('father_office_address') is-invalid @enderror"
                                    type="text" name="father_office_address" id="father_office_address" placeholder=""
                                    wire:model="father_office_address">
                                @error('father_office_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-9 col-lg-5 mr-3 mb-3">
                                <label for="father_office_contact" class="text-dark h5 font-weight-bold">Office Contact
                                    no.</label>
                                <input class="form-control @error('father_office_contact') is-invalid @enderror"
                                    type="text" name="father_office_contact" id="father_office_contact" placeholder=""
                                    wire:model="father_office_contact">
                                @error('father_office_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr class="shadow">
                        <div class="form-row">
                            <div class="col-md-9 col-lg-5 mb-3 mr-3">
                                <label for="mother_name" class="text-dark h5 font-weight-bold">Mother Full name</label>
                                <input class="form-control @error('mother_name') is-invalid @enderror" type="text"
                                    name="mother_name" id="mother_name" placeholder="Ex. Juan G. Dela Cruz"
                                    wire:model="mother_name">
                                @error('mother_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 col-lg-4 mr-3 mb-3">
                                <label for="Mother_birthdate" class="text-dark h5 font-weight-bold">Birthdate</label>
                                <input class="form-control @error('Mother_birthdate') is-invalid @enderror"
                                    type="date" name="Mother_birthdate" id="Mother_birthdate"
                                    wire:model="Mother_birthdate">
                                @error('Mother_birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-9 col-lg-5 mr-3 mb-3">
                                <label for="mother_email" class="text-dark h5 font-weight-bold">Email</label>
                                <input class="form-control @error('mother_email') is-invalid @enderror" type="text"
                                    name="mother_email" id="mother_email" placeholder="" wire:model="mother_email">
                                @error('mother_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <p class="form-text text-muted">Fill up your preferred contact
                            method.
                        </p>
                        <div class="form-row">
                            <div class="col-md-9 col-lg-5 mr-3 mb-3">
                                <label for="mother_landline" class="text-dark h5 font-weight-bold">Landline</label>
                                <input class="form-control @error('mother_landline') is-invalid @enderror" type="text"
                                    name="mother_landline" id="mother_landline" placeholder=""
                                    wire:model="mother_landline">
                                @error('mother_landline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-9 col-lg-5 mr-3 mb-3">
                                <label for="mother_contact_no" class="text-dark h5 font-weight-bold">Contact
                                    no.</label>
                                <input class="form-control @error('mother_contact_no') is-invalid @enderror"
                                    type="text" name="mother_contact_no" id="mother_contact_no" placeholder=""
                                    wire:model="mother_contact_no">
                                @error('mother_contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-9 col-lg-5 mr-3 mb-3">
                                <label for="mother_occupation" class="text-dark h5 font-weight-bold">Occupation</label>
                                <input class="form-control @error('mother_occupation') is-invalid @enderror"
                                    type="text" name="mother_occupation" id="mother_occupation"
                                    wire:model="mother_occupation">
                                @error('mother_occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-9 col-lg-5 mr-3 mb-3">
                                <label for="mother_office_address" class="text-dark h5 font-weight-bold">Office
                                    address</label>
                                <input class="form-control @error('mother_office_address') is-invalid @enderror"
                                    type="text" name="mother_office_address" id="mother_office_address" placeholder=""
                                    wire:model="mother_office_address">
                                @error('mother_office_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-9 col-lg-5 mr-3 mb-3">
                                <label for="mother_office_contact" class="text-dark h5 font-weight-bold">Office Contact
                                    no.</label>
                                <input class="form-control @error('mother_office_contact') is-invalid @enderror"
                                    type="text" name="mother_office_contact" id="mother_office_contact" placeholder=""
                                    wire:model="mother_office_contact">
                                @error('mother_office_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- STEP 3 --}}
        @if ($currentStep == 3)
            <div class="step-three">
                <div class="card">
                    <div
                        class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                        <div class="text-left border rounded p-2">3/5</div>
                        <div class="w-100">
                            <span class="d-flex justify-content-center ">Guardian Information </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-5 mr-3 mb-3">
                                <label for="guardian_name" class="text-dark h5 font-weight-bold">Full name </label>
                                <input class="form-control @error('guardian_name') is-invalid @enderror" type="text"
                                    name="guardian_name" id="guardian_name" placeholder="Ex. Maria S. Dela Cruz"
                                    wire:model="guardian_name">
                                @error('guardian_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-5 mr-3 mb-3">
                                <label for="guardian_contact" class="text-dark h5 font-weight-bold">Contact No.
                                </label>
                                <input class="form-control @error('guardian_contact') is-invalid @enderror"
                                    type="text" name="guardian_contact" id="guardian_contact"
                                    wire:model="guardian_contact">
                                @error('guardian_contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mr-3 mb-3">
                                <label for="guardian_relationship" class="text-dark h5 font-weight-bold">Relationship
                                    to learner </label>
                                <input class="form-control @error('guardian_relationship') is-invalid @enderror"
                                    type="text" name="guardian_relationship" id="guardian_relationship"
                                    wire:model="guardian_relationship">
                                @error('guardian_relationship')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        {{-- STEP 4 --}}
        @if ($currentStep == 4)
            <div class="step-four">
                <div class="card">
                    <div
                        class="card-header h5 bg-secondary text-white d-flex justify-content-between align-items-center">
                        <div class="text-left border rounded p-2">4/5</div>
                        <div class="w-100">
                            <span class="d-flex justify-content-center ">Requirements</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <label class="text-dark h5 font-weight-bold">PSA </label>
                        <div class="form-row">
                            <div class="col-md-6 col-lg-7 mr-3 mb-3">
                                <input type="file" name="psa" id="psa" wire:model="psa"
                                    class="custom-file-input @error('psa') is-invalid @enderror" id="psa">
                                <label class="custom-file-label" for="psa">Choose file</label>
                                @error('psa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <label class="text-dark h5 font-weight-bold">PSA </label>
                        <div class="form-row">
                            <div class="col-md-6 col-lg-7 mr-3 mb-3">
                                <input type="file" name="psa" id="psa" wire:model="psa"
                                    class="custom-file-input @error('psa') is-invalid @enderror" id="psa">
                                <label class="custom-file-label" for="psa">Choose file</label>
                                @error('psa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <label class="text-dark h5 font-weight-bold">PSA </label>
                        <div class="form-row">
                            <div class="col-md-6 col-lg-7 mr-3 mb-3">
                                <input type="file" name="psa" id="psa" wire:model="psa"
                                    class="custom-file-input @error('psa') is-invalid @enderror" id="psa">
                                <label class="custom-file-label" for="psa">Choose file</label>
                                @error('psa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2 px-3">
            @if ($currentStep == 1)
                <div></div>
            @endif

            @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5)
                <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
            @endif

            @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                <button type="button" class="btn btn-md btn-bca" wire:click="increaseStep()">Next</button>
            @endif

            @if ($currentStep == 5)
                <button type="submit" class="btn btn-md btn-primary">Submit</button>
            @endif


        </div>

    </form>


</div>
<script>
    var curStep = $currentStep;
    console.log(curStep);
</script>
