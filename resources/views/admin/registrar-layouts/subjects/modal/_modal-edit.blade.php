<div class="modal fade" id="edit{{ $subject->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('section.update', $subject->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="subject_name" class="text-dark text-black font-weight-bold">Subject name:</label>
                        <input class="form-control w-50" type="text" name="subject" id="subject_name"
                            placeholder="Section name" value="{{ $subject->subject }}">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Update Section</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
