<div class="col-12">
    <div class="card" id="testimony-card">
        <div class="card-header sticky-top bg-white">
            <h4>Testimony Background</h4>
            <div class="card-header-action">
                <button class="btn btn-icon btn-primary"
                    onclick="$(this).addClass('btn-progress'); $.simpleCardProgress('#testimony-card')"><i
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
                                <img src="{{ config('settings.bg_testimony_url')}}">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail image-upload">
                            </div>
                            <div class="m-2">
                                <span class="btn btn-primary btn-file">
                                    <span class="fileinput-new">
                                        Select image
                                    </span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="bg_testimony" accept="image/png, image/jpeg, image/gif">
                                </span>
                                <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                        @error('bg_testimony')
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