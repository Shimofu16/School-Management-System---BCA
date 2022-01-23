<div class="modal fade" id="add{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add Section & subject to {{ $teacher->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teachers.store',$teacher->id) }}" method="POST">
                    @csrf
                   <div class="form-group">
                        <label for="section" class="text-dark text-black font-weight-bold">Section:</label>
                        <select name="section_id" id="section" class="form-control w-50">
                           @foreach ($sections as $section)
                           <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                           @endforeach

                        </select>
                    </div>
                   <div class="form-group">
                        <label for="subject" class="text-dark text-black font-weight-bold">Subject:</label>
                        <select name="subject_id" id="subject" class="form-control w-50">
                           @foreach ($subjects as $subject)
                           <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                           @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="teacher_id" value="{{ $teacher->id}}">
                    <hr>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

