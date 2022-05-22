<div class="col-12">
    <div class="card card-primary" id="gallery-card">
        <div class="card-header sticky-top bg-white">
            <h4>Gallery Form</h4>
            <div class="card-header-action">
                <button type="submit" onclick="$(this).addClass('btn-progress'); $.simpleCardProgress('#gallery-card')"
                    class="btn btn-icon btn-primary"><i class="fas fa-save"></i>
                    {{ $gallery->id ? 'Update Gallery' : 'Create Gallery' }}
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label" for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title', $gallery->title) }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label" for="slug">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" value="{{ old('slug', $gallery->slug) }}">
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group text-center">
                        <label class="form-control-label">Image Cover</label>
                        <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                            <div class="fileinput-new thumbnail image-upload">
                                <img
                                    src="{{ $gallery->cover_url ? $gallery->cover_url : asset('images/no-image.png') }}">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail image-upload">
                            </div>
                            <div class="m-2">
                                <span class="btn btn-primary btn-file">
                                    <span class="fileinput-new">
                                        Select image
                                    </span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="cover" id="image"
                                        accept="image/png, image/jpeg, image/gif">
                                </span>
                                <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                        @error('cover')
                        <div class="text-danger">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-8 text-center">
                    <div class="form-group">
                        <label class="form-control-label">Gallery</label>
                        <div class="dropzone dz-clickable" id="mydropzone">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script>
    Dropzone.autoDiscover = false;

        var uploadedDocumentMap = {}

        var myDropzone = new Dropzone("div#mydropzone", {
            url: '{{ route('gallery.storeMedia') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="images[]" value="' + response
                    .name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function(file,response) {
                file.previewElement.remove()
                
                var name = ''

                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }

                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                    type: 'POST',
                    url: '{{ route("gallery.deleteMedia") }}',
                    data: {filename: name},
                });
                        
                $('form').find('input[name="images[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($gallery) && $gallery->images)
                    var files =
                    {!! json_encode($gallery->images) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file);
                    this.options.thumbnail.call(this, file, file.original_url);
                    file.previewElement.classList.add('dz-complete');
                    $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">');
                    }
                @endif
            }
        });
</script>
<script src="{{ asset('backend/lib/tinymce/tinymce.min.js') }}"></script>
<script>
    $('#price').mask('000.000.000.000.000', {
            reverse: true
        });

        $('#title').change(function(e) {
            $.get("{{ route('gallery.checkSlug') }}", {
                    'slug': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                }
            );
        });
</script>
@endsection