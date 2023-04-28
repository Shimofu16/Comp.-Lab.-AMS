<div class="modal fade" id="edit{{ $subject->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit subject</h5>

            </div>
            <form action="{{ route('faculty.subject.update', ['id' => $subject->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="subject_code" class="form-label fw-bold text-black">Subject Code</label>
                            <input type="text" class="form-control @error('subject_code') is-invalid @enderror"
                                value="{{ $subject->subject_code }}" name="subject_code" id="subject_code"
                                placeholder="Subject Code">
                            @error('subject_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="subject_name" class="form-label fw-bold text-black">Subject Name</label>
                            <input type="text" class="form-control @error('subject_name') is-invalid @enderror"
                                value="{{ $subject->subject_name }}" name="subject_name" id="subject_name"
                                placeholder="Subject Name">
                            @error('subject_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="subject_description" class="form-label fw-bold text-black">Subject
                                Description</label>
                            <input type="textarea"
                                class="form-control @error('subject_description') is-invalid @enderror"
                                value="{{ old('subject_description') }}" name="subject_description"
                                id="subject_description" placeholder="Subject Description">
                            @error('subject_description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="units" class="form-label fw-bold text-black">Units</label>
                            <input type="text" class="form-control @error('units') is-invalid @enderror"
                                value="{{ old('units') }}" name="units" id="units" placeholder="Units">
                            @error('units')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
