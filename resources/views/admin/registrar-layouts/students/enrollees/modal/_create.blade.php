<div class="modal" id="accept{{ $student->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-light font-weight-bold" id="exampleModalLabel">Assign section</h5>
                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('enrollees.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $student->id }}">
                    <input type="hidden" name="student_lrn" value="{{ $student->student_lrn }}">
                    <input type="hidden" name="last_name" value="{{ $student->last_name }}">
                    <input type="hidden" name="middle_name" value="{{ $student->middle_name }}">
                    <input type="hidden" name="first_name" value="{{ $student->first_name }}">
                    <input type="hidden" name="ext_name" value="{{ $student->ext_name }}">
                    <input type="hidden" name="gender" value="{{ $student->gender }}">
                    <input type="hidden" name="age" value="{{ $student->age }}">
                    <input type="hidden" name="email" value="{{ $student->email }}">
                    <input type="hidden" name="birthdate" value="{{ $student->birthdate }}">
                    <input type="hidden" name="birthplace" value="{{ $student->birthplace }}">
                    <input type="hidden" name="address" value="{{ $student->address }}">
                    <input type="hidden" name="grade_level_id" value="{{ $student->grade_level_id }}">
                    {{--  fam   --}}

                    @foreach ($families as $family)
                    @if ($family->student_id == $student->id)

                        @if ($family->relationship == 'Father')
                        <input type="hidden" name="father_name" value="{{ $family->name }}">
                        <input type="hidden" name="father_birthdate" value="{{ $family->birthdate }}">
                        <input type="hidden" name="father_email" value="{{ $family->email }}">
                        <input type="hidden" name="father_landline" value="{{ $family->landline }}">
                        <input type="hidden" name="father_contact_no" value="{{ $family->contact_no }}">
                        <input type="hidden" name="father_occupation" value="{{ $family->occupation }}">
                        <input type="hidden" name="father_office_address" value="{{ $family->office_address }}">
                        <input type="hidden" name="father_office_contact" value="{{ $family->office_contact_no }}">
                            @break
                        @endif
                    @endif
                    @endforeach
                    @foreach ($families as $family)
                    @if ($family->student_id == $student->id)
                        @if ($family->relationship == 'Mother')
                        <input type="hidden" name="mother_name" value="{{ $family->name }}">
                        <input type="hidden" name="mother_birthdate" value="{{ $family->birthdate }}">
                        <input type="hidden" name="mother_email" value="{{ $family->email }}">
                        <input type="hidden" name="mother_landline" value="{{ $family->landline }}">
                        <input type="hidden" name="mother_contact_no" value="{{ $family->contact_no }}">
                        <input type="hidden" name="mother_occupation" value="{{ $family->occupation }}">
                        <input type="hidden" name="mother_office_address" value="{{ $family->office_address }}">
                        <input type="hidden" name="mother_office_contact" value="{{ $family->office_contact_no }}">
                            @break
                        @endif
                    @endif
                    @endforeach
                    @foreach ($families as $family)
                    @if ($family->student_id == $student->id)
                        @if ($family->relationship == 'Guardian')
                        <input type="hidden" name="guardian_name" value="{{ $family->name }}">
                        <input type="hidden" name="guardian_contact" value="{{ $family->contact_no }}">
                            @break
                        @endif
                    @endif
                    @endforeach
                    @foreach ($requirements as $requirement)
                        @if ($requirement->isSubmitted == 1 && $requirement->filename == 'form_137' && $requirement->student_id == $student->id)
                            <input type="hidden" name="form137_student_id" value="{{ $requirement->student_id }}">
                            <input type="hidden" name="form137_filename" value="{{ $requirement->filename }}">
                            <input type="hidden" name="form137_filepath" value="{{ $requirement->filepath }}">
                            <input type="hidden" name="form137_isSubmitted" value="{{ $requirement->isSubmitted }}">
                        @endif
                    @endforeach
                    @foreach ($requirements as $requirement)
                        @if ($requirement->isSubmitted == 1 && $requirement->filename == 'psa' && $requirement->student_id == $student->id)
                            <input type="hidden" name="psa_student_id" value="{{ $requirement->student_id }}">
                            <input type="hidden" name="psa_filename" value="{{ $requirement->filename }}">
                            <input type="hidden" name="psa_filepath" value="{{ $requirement->filepath }}">
                            <input type="hidden" name="psa_isSubmitted" value="{{ $requirement->isSubmitted }}">
                        @endif
                    @endforeach
                    <div class="form-group">
                        <label for="section" class="text-dark text-black font-weight-bold">Section:</label>
                        <select name="section_id" id="section" class="form-control w-50">
                            <option selected >---- Select section ----</option>
                            @foreach ($sections as $section)
                                @if ($student->grade_level_id == $section->grade_level_id)
                                <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Accept</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
