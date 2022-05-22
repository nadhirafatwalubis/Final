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
                <div class="col-12 text-center">
                    <div class="form-group">
                        <label class="form-control-label">Image</label>
                        <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                            <div class="fileinput-new thumbnail image-upload">
                                <img
                                    src="{{ config('settings.bg_header_other') == '' ? asset('images/no-image.png') : asset('/images/' . config('settings.bg_header_other')) }}">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail image-upload">
                            </div>
                            <div class="m-2">
                                <span class="btn btn-primary btn-file">
                                    <span class="fileinput-new">
                                        Select image
                                    </span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="bg_header_other" accept="image/png, image/jpeg, image/gif">
                                </span>
                                <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                        @error('bg_header_other')
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