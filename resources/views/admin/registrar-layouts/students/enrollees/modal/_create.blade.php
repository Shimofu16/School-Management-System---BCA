<div class="modal fade" id="accept{{ $student->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-light font-weight-bold" id="exampleModalLabel">WARNING</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
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
                    <input type="hidden" name="yearlevel_id" value="{{ $student->yearlevel_id }}">
                    <div class="form-group">
                        <label for="section" class="text-dark text-black font-weight-bold">Assign Section for
                            {{ $student->last_name }}, {{ $student->first_name }}:</label>
                        <select name="section_id" id="section" class="form-control w-50">
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->section_name }}</option>
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
