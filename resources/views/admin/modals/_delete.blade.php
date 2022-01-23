@if (Request::is('subjects'))
    <div class="modal fade" id="delete{{ $subject->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
@endif
@if (Request::is('sections'))
    <div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
@endif
<div class="modal-dialog" role="document">
    <div class="modal-content ">
        <div class="modal-header bg-danger">
            <h5 class="modal-title text-light font-weight-bold" id="exampleModalLabel">WARNING</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Are you sure you want to delete this data? </div>

        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            @if (Request::is('subjects'))
                <form action="{{ route('subject.destroy', $subject->id) }}" method="post">
            @endif
            @if (Request::is('sections'))
                <form action="{{ route('section.destroy', $section->id) }}" method="post">
            @endif
            @csrf
            @method('DELETE')

            <button class="btn btn-danger" type="submit">Yes</button>
            </form>

        </div>
    </div>
</div>
</div>
