<div id="general_info" class="tabcontent">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-3 control-label">Company name</label>
        <div class="col-md-9">
            <input id="name" type="text" class="form-control" name="company_name" value="{{ $page->name }}" required autocomplete="off">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('cvr_number') ? ' has-error' : '' }}">
        <label for="cvr_number" class="col-md-3 control-label">CVR</label>
        <div class="col-md-9">
            <input id="cvr_number" type="text" class="form-control" name="cvr_number" value="{{ $page->cvr_number }}" autocomplete="off">
            @if ($errors->has('cvr_number'))
                <span class="help-block">
                    <strong>{{ $errors->first('cvr_number') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
        <label for="phone_number" class="col-md-3 control-label">Phone number</label>

        <div class="col-md-9">
            <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $page->phone_number }}" autocomplete="off">

            @if ($errors->has('phone_number'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-3 control-label">Email</label>
        <div class="col-md-9">
            <input id="email" type="email" class="form-control" name="email" value="{{ $page->email }}" autocomplete="off">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-md-3 control-label">Address</label>
        <div class="col-md-9">
            <input id="autocomplete" type="text" class="form-control" name="address" value="{{ $page->address }}" placeholder="Enter your address" onFocus="geolocate()">
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div id="disabled_location">
        <input name="street_number" class="field" id="street_number" value="{{ $page->number }}">
        <input name="street" class="field" id="route" value="{{ $page->street }}">
        <input name="city" class="field" id="locality" value="{{ \opStarts\Cities::getName($page->city) }}">
        <input name="a_a_l" class="field" id="administrative_area_level_1">
        <input name="post_code" class="field" id="postal_code" value="{{ $page->post_code }}">
        <input name="country" class="field" id="country" value="{{ $page->country }}">
        <input name="lat" class="field" id="lat" value="{{ $page->map_lat }}">
        <input name="long" class="field" id="long" value="{{ $page->map_long }}">
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="email" class="col-md-3 control-label">Description</label>
        <div class="col-md-9">
            <textarea id="description" class="form-control" name="description" style="min-height: 200px">{{ $page->description }}</textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    {{--<div class="form-group{{ $errors->has('work_experience') ? ' has-error' : '' }} padding-bottom">--}}
        {{--<label for="work_experience" class="col-md-3 control-label">Work experience (years)</label>--}}
        {{--<div class="col-md-9">--}}
            {{--<select class="form-control" id="work_experience" name="work_experience">--}}
                {{--@if($page->work_experience != NULL)--}}
                    {{--<option value="{{ $page->work_experience }}">{{ $page->work_experience }}</option>--}}
                {{--@endif--}}
                {{--@for($i = 1; $i <= 50; $i++)--}}
                    {{--<option value="{{$i}}">{{$i}}</option>--}}
                {{--@endfor--}}
            {{--</select>--}}
            {{--@if ($errors->has('work_experience'))--}}
                {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('work_experience') }}</strong>--}}
                {{--</span>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
</div>