<div class="modal fade" id="subject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subject.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="Subject" class="text-dark text-black font-weight-bold">Subject:</label>
                        <input class="form-control w-50" type="text" name="subject" id="Subject"
                            placeholder="Subject">
                    </div>
                    <button class="btn btn-primary" type="submit">Add Subject</button>
                </form>

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}

            </div>
        </div>
    </div>
</div>

