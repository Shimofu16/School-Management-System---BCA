<div class="modal fade" id="view{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Students information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column">
                <div class="modal-body-top d-flex">
                    <div class="id border p-2 mx-auto">
                        <img class="img-fluid" src="{{ asset('/img/students-icns/user-male.png') }}" alt="">
                    </div>
                </div>
                <div class="modal-body-bottom mt-2">
                    <h6 class="text-md-left text-dark font-weight-bold">First name: <span class="font-weight-normal">{{ $student->first_name }}</span></h6>
                    <h6 class="text-md-left text-dark font-weight-bold">Middle name: <span class="font-weight-normal">{{ $student->middle_name }}</span></h6>
                    <h6 class="text-md-left text-dark font-weight-bold">Last name: <span class="font-weight-normal">{{ $student->last_name }}</span></h6>
                </div>

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
