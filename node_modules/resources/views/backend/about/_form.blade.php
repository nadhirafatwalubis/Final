<div class="col-12">
    <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data" id="about-form">
        @csrf
        <div class="card card-primary" id="about-card">
            <div class="card-header sticky-top bg-white">
                <h4>About</h4>
                <div class="card-header-action">
                    <button type="submit"
                        onclick="$(this).addClass('btn-progress'); $.simpleCardProgress('#about-card')"
                        class="btn btn-icon btn-primary"><i class="fas fa-save"></i> Update</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label class="form-control-label" for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" autofocus value="{{ old('title', $about->title) }}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label"> Description</label>
                            <textarea class=" form-control @error('desc') is-invalid @enderror" id="desc"
                                name="desc">{!! old('desc', $about->desc) !!}</textarea>
                            @error('desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <div class="form-group">
                            <label class="form-control-label">Image Header</label>
                            <input type="hidden" name="oldImageHeader" value="{{ $about->image_header_url }}">
                            <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                                <div class="fileinput-new thumbnail image-upload">
                                    <img
                                        src="{{ $about->image_header_url ? $about->image_header_url : asset('images/no-image.png') }}">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail image-upload">
                                </div>
                                <div class="m-2">
                                    <span class="btn btn-primary btn-file">
                                        <span class="fileinput-new">
                                            Select image
                                        </span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="image_header" id="image"
                                            accept="image/png, image/jpeg, image/gif">
                                    </span>
                                    <a href="#" class="btn btn-primary fileinput-exists"
                                        data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                            @error('image')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="form-control-label">Image</label>
                            <input type="hidden" name="oldImage" value="{{ $about->image }}">
                            <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                                <div class="fileinput-new thumbnail image-upload">
                                    <img src="{{ $about->image_url }}">
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
                                    <a href="#" class="btn btn-primary fileinput-exists"
                                        data-dismiss="fileinput">Remove</a>
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
    </form>
    <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="contact" value="true">
        <div class="card card-info" id="contact-card">
            <div class="card-header sticky-top bg-white">
                <h4>Contact & Social Media</h4>
                <div class="card-header-action">
                    <button type="submit"
                        onclick="$(this).addClass('btn-progress'); $.simpleCardProgress('#contact-card')"
                        class="btn btn-icon btn-info"><i class="fas fa-save"></i> Update</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                name="address" autofocus value="{{ old('address', $about->address) }}">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="address_url">Address URL
                                <small>(Gmaps)</small>
                            </label>
                            <input type="text" class="form-control @error('address_url') is-invalid @enderror"
                                id="address_url" name="address_url" autofocus
                                value="{{ old('address_url', $about->address_url) }}">
                            @error('address_url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="phone">Phone Number</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                name="phone" autofocus value="{{ old('phone', $about->phone) }}">
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="wa">Whatsapp Number</label>
                            <input type="text" class="form-control @error('wa') is-invalid @enderror" id="wa" name="wa"
                                autofocus value="{{ old('wa', $about->wa) }}">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" autofocus value="{{ old('email', $about->email) }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="video">Video</label>
                            <input type="text" class="form-control @error('video') is-invalid @enderror" id="video"
                                name="video" autofocus value="{{ old('video', $about->video) }}">
                            @error('video')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="fb">Facebook URL</label>
                            <input type="text" class="form-control @error('fb') is-invalid @enderror" id="fb" name="fb"
                                autofocus value="{{ old('fb', $about->fb) }}">
                            @error('fb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="ig">Instagram URL</label>
                            <input type="text" class="form-control @error('ig') is-invalid @enderror" id="ig" name="ig"
                                autofocus value="{{ old('ig', $about->ig) }}">
                            @error('ig')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="yt">Youtube URL</label>
                            <input type="text" class="form-control @error('yt') is-invalid @enderror" id="yt" name="yt"
                                autofocus value="{{ old('yt', $about->yt) }}">
                            @error('yt')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-control-label" for="tw">Twitter URL</label>
                            <input type="text" class="form-control @error('tw') is-invalid @enderror" id="tw" name="tw"
                                autofocus value="{{ old('tw', $about->tw) }}">
                            @error('tw')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@section('script')
<script src="{{ asset('backend/lib/tinymce/tinymce.min.js') }}"></script>
<script>
    $.myTinyMce('#desc',430);
</script>
@endsection