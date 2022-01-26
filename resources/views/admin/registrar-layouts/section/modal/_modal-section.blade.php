<div class="modal fade" id="addSection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
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
                <form action="{{ route('section.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="section_name" class="text-dark text-black font-weight-bold">Section name:</label>
                        <input class="form-control w-50" type="text" name="section_name" id="section_name"
                            placeholder="Section name">
                    </div>
                    <button class="btn btn-primary" type="submit">Add Student</button>
                </form>

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}

            </div>
        </div>
    </div>
</div>
