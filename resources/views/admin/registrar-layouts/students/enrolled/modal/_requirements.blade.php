<div class="modal fade" id="requirements" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLongTitle">Students Requirements</h5>
                <button type="button" class="close  text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($student->status == 0)
                    <div class="form-row mb-2">
                        @if ($hasFilePsa == true)
                            <h5><span class="text-dark text-black font-weight-bold">Philippine Statistics Authority
                                    (PSA):</span> Submitted</h5>
                        @else
                            <form action="{{ route('enrollees.store.requirements') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file d-flex justify-content center align-items-center mb-3">
                                    <h5 span class="text-dark text-black text-center font-weight-bold py-3 mr-4">
                                        Philippine Statistics Authority
                                        (PSA)</h5>
                                    <input type="file" name="psa">
                                    <input type="hidden" name="id" value="{{ $student->id }}">
                                    <div>
                                        <button type="submit" name="submit"
                                            class="btn btn-primary btn-block">Upload</button>
                                    </div>
                                </div>
                            </form>
                        @endif

                    </div>
                    <div class="form-row mb-2">
                        <div class="col-12">
                            @if ($hasFileForm137 == true)
                                <h5><span class="text-dark text-black text-center font-weight-bold">Form 137 / Report
                                        Card:</span> Submitted</h5>
                            @else
                                <form action="{{ route('enrollees.store.requirements') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="custom-file d-flex justify-content center align-items-center mb-3">
                                        <h6 span class="text-dark text-black font-weight-bold py-3 mr-4">Form 137</h6>
                                        <input type="file" name="form_137">
                                        <input type="hidden" name="id" value="{{ $student->id }}">
                                        <div>
                                            <button type="submit" name="submit"
                                                class="btn btn-primary btn-block">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        @if ($hasFileGoodMoral == true)
                            <h5><span class="text-dark text-black font-weight-bold">Good Moral Certification:</span>
                                Submitted</h5>
                        @else
                            <form action="{{ route('enrollees.store.requirements') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file d-flex justify-content center align-items-center mb-3">
                                    <h5 span class="text-dark text-black text-center font-weight-bold py-3 mr-4">
                                        Good Moral Certification</h5>
                                    <input type="file" name="good_moral">
                                    <input type="hidden" name="id" value="{{ $student->id }}">
                                    <div>
                                        <button type="submit" name="submit"
                                            class="btn btn-primary btn-block">Upload</button>
                                    </div>
                                </div>
                            </form>
                        @endif

                    </div>
                    <div class="form-row mb-2">
                        @if ($hasFilePhoto == true)
                            <h5><span class="text-dark text-black font-weight-bold">1x1 Photo:</span> Submitted</h5>
                        @else
                            <form action="{{ route('enrollees.store.requirements') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file d-flex justify-content center align-items-center mb-3">
                                    <h5 span class="text-dark text-black text-center font-weight-bold py-3 mr-4">
                                        1x1 Photo</h5>
                                    <input type="file" name="photo">
                                    <input type="hidden" name="id" value="{{ $student->id }}">
                                    <div>
                                        <button type="submit" name="submit"
                                            class="btn btn-primary btn-block">Upload</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                @endif


            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
