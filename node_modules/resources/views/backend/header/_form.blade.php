<div class="col-12">
    <div class="card" id="header-card">
        <div class="card-header sticky-top bg-white">
            <h4>Header Form</h4>
            <div class="card-header-action">
                <button class="btn btn-icon btn-primary"
                    onclick="$(this).addClass('btn-progress'); $.simpleCardProgress('#header-card')"><i
                        class="fas fa-save"></i> Update
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label" for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" autofocus value="{{ old('title', $header->title) }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label" for="video_url">Video Url</label>
                        <input type="text" class="form-control @error('video_url') is-invalid @enderror" id="video_url"
                            name="video_url" value="{{ old('video_url', $header->video_url) }}">
                        @error('video_url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <label class="form-control-label"> Caption</label>
                        <textarea class=" form-control tinyMce @error('caption') is-invalid @enderror" id="caption"
                            name="caption">{!! old('caption', $header->caption) !!}</textarea>
                        @error('caption')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="form-group">
                        <label class="form-control-label">Image</label>
                        <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                            <div class="fileinput-new thumbnail image-upload">
                                <img src="{{ $header->image_url ? $header->image_url : asset('images/no-image.png') }}">
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
            </div>
        </div>
    </div>
</div>
@section('script')
<script src="{{ asset('backend/lib/tinymce/tinymce.min.js') }}"></script>
<script>
    $.myTinyMce('#caption');
</script>
@endsection