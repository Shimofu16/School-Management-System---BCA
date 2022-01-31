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
                    <div class="form-group">
                        <label for="student_lrn" class="text-dark text-black font-weight-bold">Student
                            LRN:</label>
                        <input class="form-control w-75" type="text" name="student_lrn" id="student_lrn"
                            placeholder="Student LRN" value="{{ $student->student_lrn }}">
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
