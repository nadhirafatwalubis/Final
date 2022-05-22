@extends('backend.layouts.app')
@section('title', 'Web Setting - '.config('settings.site_name'))
@section('breadcrumb')
<div class="nb">
    <div class="nb-header">
        <h1>Web Setting</h1>
        <div class="nb-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Web Setting</div>
        </div>
    </div>
</div>
@endsection
@section('content')
<section class="section">
    @include('backend.layouts._notif')
    <div class="section-body">
        <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data" id="setting-form">
            @csrf
            <input name="website" type="hidden" value="true">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary" id="website-card">
                        <div class="card-header sticky-top bg-white">
                            <h4>Welcome Form</h4>
                            <div class="card-header-action">
                                <button class="btn btn-icon btn-primary"
                                    onclick="$(this).addClass('btn-progress'); $.simpleCardProgress('#website-card')"><i
                                        class="fas fa-save"></i> Update</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="site_name">Site Name</label>
                                        <input type="text" class="form-control @error('site_name') is-invalid @enderror"
                                            id="site_name" name="site_name"
                                            value="{{ old('site_name', $website->findValue('site_name')) }}">
                                        @error('site_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="site_title">Site Title</label>
                                        <input type="text"
                                            class="form-control @error('site_title') is-invalid @enderror"
                                            id="site_title" name="site_title"
                                            value="{{ old('site_title', $website->findValue('site_title')) }}">
                                        @error('site_title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="site_desc">Site Desc</label>
                                        <input type="text" class="form-control @error('site_desc') is-invalid @enderror"
                                            id="site_desc" name="site_desc"
                                            value="{{ old('site_desc', $website->findValue('site_desc')) }}">
                                        @error('site_desc')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="g_verif">Google Verification</label>
                                        <input type="text" class="form-control @error('g_verif') is-invalid @enderror"
                                            id="g_verif" name="g_verif"
                                            value="{{ old('g_verif', $website->findValue('g_verif')) }}">
                                        @error('g_verif')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="g_tag">Google Tag</label>
                                        <textarea type="text" class="form-control @error('g_tag') is-invalid @enderror"
                                            id="g_tag"
                                            name="g_tag">{{ old('g_tag', $website->findValue('g_tag')) }}</textarea>
                                        @error('g_tag')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="script">Script</label>
                                        <input type="text" class="form-control @error('script') is-invalid @enderror"
                                            id="script" name="script"
                                            value="{{ old('script', $website->findValue('script')) }}">
                                        @error('script')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <div class="form-group">
                                        <label class="form-control-label">Site Logo</label>
                                        <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail image-upload">
                                                <img src="{{ config('settings.site_logo_url')}}">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail image-upload">
                                            </div>
                                            <div class="m-2">
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">
                                                        Select image
                                                    </span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="site_logo" id="site_logo"
                                                        accept="image/png, image/jpeg, image/gif">
                                                </span>
                                                <a href="#" class="btn btn-primary fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                        @error('site_logo')
                                        <div class="text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <div class="form-group">
                                        <label class="form-control-label">Favicon</label>
                                        <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail image-upload">
                                                <img src="{{ config('settings.favicon_url')}}">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail image-upload">
                                            </div>
                                            <div class="m-2">
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">
                                                        Select image
                                                    </span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="favicon" id="favicon"
                                                        accept="image/png, image/jpeg, image/gif">
                                                </span>
                                                <a href="#" class="btn btn-primary fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                        @error('favicon')
                                        <div class="text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <div class="form-group">
                                        <label class="form-control-label">Open Graph Image</label>
                                        <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail image-upload">
                                                <img src="{{ config('settings.og_image_url')}}">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail image-upload">
                                            </div>
                                            <div class="m-2">
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">
                                                        Select image
                                                    </span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="og_image" id="og_image"
                                                        accept="image/png, image/jpeg, image/gif">
                                                </span>
                                                <a href="#" class="btn btn-primary fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                        @error('og_image')
                                        <div class="text-danger">
                                            <small>{{ $message }}</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 text-center">
                                    <div class="form-group">
                                        <label class="form-control-label">Footer Background</label>
                                        <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail image-upload">
                                                <img src="{{ config('settings.bg_footer_url')}}">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail image-upload">
                                            </div>
                                            <div class="m-2">
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">
                                                        Select image
                                                    </span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="bg_footer" id="bg_footer"
                                                        accept="image/png, image/jpeg, image/gif">
                                                </span>
                                                <a href="#" class="btn btn-primary fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                        @error('bg_footer')
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
            </div>
        </form>
    </div>
</section>
@endsection
@section('script')
<script>
    $.myCodeMirror('g_tag');
    $.myCodeMirror('script');
</script>
@endsection