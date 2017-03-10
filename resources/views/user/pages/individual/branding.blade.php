<div id="branding_info" class="tabcontent">
    <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
        <label for="logo" class="col-md-3 control-label">Logo</label>
        <div class="col-md-6">
            <input type="file" name="logo" id="logo" class="no-border">
            <br>
            <img src="{{ url($page->logo) }}" alt="{{ $page->company_name }}" height="120">
            @if ($errors->has('logo'))
                <span class="help-block">
                    <strong>{{ $errors->first('logo') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
        <label for="cover" class="col-md-3 control-label">Cover image</label>
        <div class="col-md-9">
            <input type="file" name="cover" id="cover" class="no-border">
            <br>
            <img src="{{ url($page->cover) }}" alt="{{ $page->company_name }}" width="100%">
            @if ($errors->has('cover'))
                <span class="help-block">
                    <strong>{{ $errors->first('cover') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
        <label for="website" class="col-md-3 control-label">Website</label>
        <div class="col-md-9">
            <input id="website" type="text" class="form-control" name="website" value="{{ $page->website }}">
            @if ($errors->has('website'))
                <span class="help-block">
                    <strong>{{ $errors->first('website') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
        <label for="facebook" class="col-md-3 control-label">facebook</label>
        <div class="col-md-9">
            <input id="facebook" type="text" class="form-control" name="facebook" value="{{ $page->facebook }}">
            @if ($errors->has('facebook'))
                <span class="help-block">
                    <strong>{{ $errors->first('facebook') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('google') ? ' has-error' : '' }}">
        <label for="google" class="col-md-3 control-label">Google</label>
        <div class="col-md-9">
            <input id="google" type="text" class="form-control" name="google" value="{{ $page->google }}">
            @if ($errors->has('google'))
                <span class="help-block">
                    <strong>{{ $errors->first('google') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
        <label for="linkedin" class="col-md-3 control-label">Linked in</label>
        <div class="col-md-9">
            <input id="linkedin" type="text" class="form-control" name="linkedin" value="{{ $page->linkedin }}">
            @if ($errors->has('linkedin'))
                <span class="help-block">
                    <strong>{{ $errors->first('linkedin') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>