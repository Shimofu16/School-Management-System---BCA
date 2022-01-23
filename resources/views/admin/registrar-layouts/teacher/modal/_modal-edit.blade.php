<div class="modal fade" id="edit{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Section</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('teachers.update',$teacher->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="text-dark text-black font-weight-bold">Name:</label>
                        <input class="form-control w-75" type="text" name="name" id="name" placeholder="Name" value="{{ $teacher->name }}">
                    </div>
                    <div class="form-group">
                        <label for="Gender" class="text-dark text-black font-weight-bold">Gender:</label>
                        <div>
                            <label for="male" class="radio-inline"><input type="radio" name="gender" id="Gender" value="Male" value="{{ $teacher->gender }}">
                                Male</label>
                            <label for="female" class="radio-inline"><input type="radio" name="gender" id="Gender" value="Female" value="{{ $teacher->gender }}">
                                Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Age" class="text-dark text-black font-weight-bold">Age:</label>
                        <input class="form-control w-25" type="number" name="age" id="Age" placeholder="Age" value="{{  $teacher->age }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_no" class="text-dark text-black font-weight-bold">Phone No:</label>
                        <input class="form-control w-50" type="tel" name="phone_no" id="phone_no" placeholder="Phone Number" value="{{ $teacher->phone_no }}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-dark text-black font-weight-bold">Email:</label>
                        <input class="form-control w-75" type="text" name="email" id="email" placeholder="Email" value="{{ $teacher->email }}">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

