<div class="col-12">
    <div class="card card-primary" id="destination-card">
        <div class="card-header sticky-top bg-white">
            <h4>Destination Form</h4>
            <div class="card-header-action">
                <button type="submit"
                    onclick="$(this).addClass('btn-progress'); $.simpleCardProgress('#destination-card')"
                    class="btn btn-icon btn-primary"><i class="fas fa-save"></i>
                    {{ $destination->id ? 'Update Destination' : 'Create Destination' }}
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label" for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $destination->name) }}">
                        @error('name')
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
                            name="slug" value="{{ old('slug', $destination->slug) }}">
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label class="form-control-label" for="price">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" value="{{ old('price', $destination->price) }}">
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label class="form-control-label" for="capacity">Capacity</label>
                        <input type="text" class="form-control @error('capacity') is-invalid @enderror" id="capacity"
                            name="capacity" value="{{ old('capacity', $destination->capacity) }}">
                        @error('capacity')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label class="form-control-label" for="location">Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location"
                            name="location" value="{{ old('location', $destination->location) }}">
                        @error('location')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="form-group">
                        <label class="form-control-label"> Destination Galleries</label>
                        <div class="dropzone dz-clickable" id="mydropzone">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <label class="form-control-label"> Facility</label>
                        <textarea class="form-control @error('facility') is-invalid @enderror" id="facility"
                            name="facility">{!! old('facility', $destination->facility) !!}</textarea>
                        @error('facility')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group text-center">
                        <label class="form-control-label">Image Cover</label>
                        <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                            <div class="fileinput-new thumbnail image-upload">
                                <img
                                    src="{{ $destination->cover_url ? $destination->cover_url : asset('images/no-image.png') }}">
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
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-control-label">Description</label>
                        <textarea class="form-control tinyMce @error('desc') is-invalid @enderror" id="desc"
                            name="desc">{!! old('desc', $destination->desc) !!}</textarea>
                        @error('desc')
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
    Dropzone.autoDiscover = false;

        var uploadedDocumentMap = {}

        var myDropzone = new Dropzone("div#mydropzone", {
            url: '{{ route('destination.storeMedia') }}',
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
                    url: '{{ route("destination.deleteMedia") }}',
                    data: {filename: name},
                });
                        
                $('form').find('input[name="images[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($destination) && $destination->images)
                    var files =
                    {!! json_encode($destination->images) !!}
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

    $('#name').change(function(e) {
        $.get("{{ route('destination.checkSlug') }}", {
                'slug': $(this).val()
            },
            function(data) {
                $('#slug').val(data.slug);
            }
        );
    });

    $.myTinyMce('#facility');
    $.myTinyMce('#desc',300);
</script>
@endsection