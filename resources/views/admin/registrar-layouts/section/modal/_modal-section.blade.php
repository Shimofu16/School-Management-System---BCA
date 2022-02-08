<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Add Section</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
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
                    <div class="form-group mb-3">
                        <label for="adviser" class="text-dark text-black font-weight-bold">Adviser:</label>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Add Section</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
