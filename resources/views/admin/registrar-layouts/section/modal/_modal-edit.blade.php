<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog"
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
                <form action="{{ route('section.update', $section->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="section" class="text-dark text-black font-weight-bold">Section name:</label>
                        <input class="form-control w-50" type="text" name="section_name" id="section"
                            placeholder="Section name" value="{{ $section->section_name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="advicer" class="text-dark text-black font-weight-bold">advicer:</label>
                        <select name="advicer" class="custom-select" id="advicer">
                            <option selected>Choose...</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Update Section</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
