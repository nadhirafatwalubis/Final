<div class="col-12">
    <div class="card card-primary" id="testimony-card">
        <div class="card-header sticky-top bg-white">
            <h4>Testimony Form</h4>
            <div class="card-header-action">
                <button type="submit"
                    onclick="$(this).addClass('btn-progress'); $.simpleCardProgress('#testimony-card')"
                    class="btn btn-icon btn-primary"><i class="fas fa-save"></i>
                    {{ ($testimony->id) ? 'Update Testimony' : 'Create Testimony' }}
                </button>

            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group text-center">
                        <label class="form-control-label" for="star">Star</label>
                        <input type="hidden" class="form-control @error('name') is-invalid @enderror" id="star"
                            name="star" value="{{ old('star',$testimony->star) }}">
                        @error('star')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-center">
                        <label class="form-control-label">Image</label>
                        <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                            <div class="fileinput-new thumbnail image-upload">
                                <img
                                    src="{{ $testimony->image_url ? $testimony->image_url : asset('images/no-image.png') }}">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail image-upload">
                            </div>
                            <div class="m-2">
                                <span class="btn btn-primary btn-file">
                                    <span class="fileinput-new">
                                        Select image
                                    </span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="image" id="image"
                                        accept="image/png, image/jpeg, image/gif">
                                </span>
                                <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                        @error('image')
                        <div class="text-danger">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label">Message</label>
                        <textarea class="form-control textarea-md @error('message') is-invalid @enderror" height="70"
                            id="message" name="message">{{ old('message', $testimony->message) }}</textarea>
                        @error('message')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name',$testimony->name) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="job">Job</label>
                        <input type="text" class="form-control @error('job') is-invalid @enderror" id="job" name="job"
                            value="{{ old('job',$testimony->job) }}">
                        @error('job')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@section('script')
<script>
    $("#star").rating({
        theme: 'krajee-fas',
        containerClass: 'is-star',
        hoverChangeCaption: false,
        size: "md"
    });

</script>
@endsection
