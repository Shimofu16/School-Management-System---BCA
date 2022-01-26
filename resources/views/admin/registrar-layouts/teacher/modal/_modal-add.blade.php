<div class="modal fade" id="add{{ $teacher->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add Section & subject to
                    {{ $teacher->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teachers.store', $teacher->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="section" class="text-dark text-black font-weight-bold">Section:</label>
                        <select name="section" id="section" class="form-control w-50">
                            @foreach ($sections as $section)
                                <option value="{{ $section->section_name }}">{{ $section->section_name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="text-dark text-black font-weight-bold">Subject:</label>
                        <select name="subject" id="subject" class="form-control w-50">
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->subject }}">{{ $subject->subject }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time" class="text-dark text-black font-weight-bold">Student LRN:</label>
                        <time datetime="08:00">
                        <div class="d-flex">
                            <input class="form-control w-25" type="time" name="timeOne" id="time" placeholder="2:00pm"
                                value="{{ old('time') }}">
                            <h2>&#160;-&#160;</h2>
                            <input class="form-control w-25" type="time" name="timeTwo" id="time" placeholder="2:00pm"
                                value="{{ old('time') }}">
                        </div>
                    </div>
                    <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                    <hr>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
