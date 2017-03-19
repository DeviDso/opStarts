<div id="branding_info" class="tabcontent">
    {{--<div class="form-group">--}}
        {{--<label for="logo" class="col-md-3 control-label">Page layout</label>--}}
        {{--<div class="col-md-9">--}}
            {{--<div class="col-md-4">--}}
                {{--<input type="radio" id="layout" name="layout">--}}
                {{--<h4>Layout 1</h4>--}}
                {{--<h5 data-toggle="modal" data-target="#layout_1" style="cursor: pointer; color: #8e130c">Preview</h5>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<input type="radio" id="layout" name="layout">--}}
                {{--<h4>Layout 2</h4>--}}
                {{--<h5 data-toggle="modal" data-target="#layout_2" style="cursor: pointer; color: #8e130c">Preview</h5>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<input type="radio" id="layout" name="layout">--}}
                {{--<h4>Layout 3</h4>--}}
                {{--<h5 data-toggle="modal" data-target="#layout_3" style="cursor: pointer; color: #8e130c">Preview</h5>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<hr>--}}

    <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
        <label for="logo" class="col-md-3 control-label">Logo</label>
        <div class="col-md-9">
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

    <hr>

    <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
        <label for="website" class="col-md-3 control-label">Website</label>
        <div class="col-md-9">
            <input id="website" type="text" class="form-control" name="website" value="{{ $page->website }}" autocomplete="off">
            @if ($errors->has('website'))
                <span class="help-block">
                    <strong>{{ $errors->first('website') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
        <label for="facebook" class="col-md-3 control-label">Facebook</label>
        <div class="col-md-9">
            <input id="facebook" type="text" class="form-control" name="facebook" value="{{ $page->facebook }}" autocomplete="off">
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
            <input id="google" type="text" class="form-control" name="google" value="{{ $page->google }}" autocomplete="off">
            @if ($errors->has('google'))
                <span class="help-block">
                    <strong>{{ $errors->first('google') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }} padding-bottom">
        <label for="linkedin" class="col-md-3 control-label">Linked in</label>
        <div class="col-md-9">
            <input id="linkedin" type="text" class="form-control" name="linkedin" value="{{ $page->linkedin }}" autocomplete="off">
            @if ($errors->has('linkedin'))
                <span class="help-block">
                    <strong>{{ $errors->first('linkedin') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="modal fade" id="layout_1" tabindex="-1" role="dialog" aria-labelledby="layout_1" style="margin-top: 120px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-md-12" style="background: #F0F1F3">
                <div class="col-md-10 col-md-offset-1" style="background: white; padding-bottom: 25px">
                    <div class="col-md-12" style="background: url('{{ url('') }}/{{ $page->cover }}'); background-size:cover; padding-top: 25px; padding-bottom: 25px">
                        <div class="col-md-8" style="background: rgba(240, 241, 243, 0.74); padding: 10px">
                            <div class="col-md-4">
                                <img src="{{ url('') }}/{{ $page->logo }}" style="width: 100%">
                            </div>
                            <div class="col-md-8" style="font-size: 10px">
                                {{ \opStarts\Categories::name($page->category_id) }}
                                <div class="nice_line"></div>
                                <div style="font-weight: 800;">
                                    {{ $page->email }}
                                    <br>
                                    {{ $page->phone_number }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4 text-center" style="font-size: 8px; margin-top: 7px;">
                            {{ $page->company_name }}
                            <div class="nice_line"></div>
                            <div style="font-size: 6px">
                                {{ $page->email }}
                                <br>
                                {{ $page->phone_number }}
                                <br>
                                CVR: {{ $page->cvr_number }}
                            </div>
                            <hr style="margin: 7px 7px!important;">
                            <div style="font-size: 4px">
                                {{ $page->street }} {{ $page->number }},<br>
                                {{ \opStarts\Cities::getName($page->city) }}, {{ $page->post_code }}<br>
                                {{ $page->country }}
                            </div>
                            <hr style="margin: 7px 7px!important;">
                            <img src="{{ url('map_e.PNG') }}" width="95%">
                        </div>
                        <div class="col-md-8" style="font-size: 9px!important; margin-top: 7px">
                            About
                            <br>
                            {{ strip_tags($page->description) }}
                            <hr style="margin: 7px 7px!important;">
                            Our services<br>
                            @foreach($page->skills()->get() as $skill)
                                <span style="background: #eee; padding: 1px; font-size: 8px; margin-right: 2px;">{{ $skill->name }}</span>
                            @endforeach
                            <hr style="margin: 7px 7px!important;">
                            Gallery
                            <br>
                            <img src="{{ url('nologo.png') }}" width="25%" style="margin-top: 2px">
                            <img src="{{ url('nologo.png') }}" width="25%" style="margin-top: 2px">
                            <img src="{{ url('nologo.png') }}" width="25%" style="margin-top: 2px">
                            <img src="{{ url('nologo.png') }}" width="25%" style="margin-top: 2px">
                            <img src="{{ url('nologo.png') }}" width="25%" style="margin-top: 2px">
                            <img src="{{ url('nologo.png') }}" width="25%" style="margin-top: 2px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="layout_2" tabindex="-1" role="dialog" aria-labelledby="layout_2" style="margin-top: 120px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-md-12" style="background: #F0F1F3;">
                <div class="col-md-12" style="background: url('{{ url($page->cover) }}'); height: 75px; position: absolute; -webkit-background-size: cover;background-size: cover;margin-left: -15px;">

                </div>
                <div class="col-md-12" style="margin-top: 45px">
                    <div class="col-md-10 col-md-offset-1" style="background: white; padding-top: 2px; padding-bottom: 20px">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <img src="{{ url($page->logo) }}" width="100%">
                            </div>
                            <div class="col-md-4">
                                <h1 style="font-size: 14px!important;">{{ $page->company_name }}</h1>
                                <h2 style="font-size: 11px!important;">{{ \opStarts\Categories::name($page->category_id) }}</h2>
                                <div class="nice_line"></div>
                                <p style="font-size: 4px!important;">
                                    {{ $page->street }} {{ $page->number }},<br>
                                    {{ \opStarts\Cities::getName($page->city) }}, {{ $page->post_code }}<br>
                                    {{ $page->country }}
                                </p>
                            </div>
                            <div class="col-md-4" style="text-align: right; font-size: 6px; margin-top: 45px;">
                                {{ $page->email }}<br>
                                {{ $page->phone_number }}<br>
                                CVR: {{ $page->cvr_number }}<br>
                                {{ $page->website }}
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <hr style="margin: 7px 7px!important;">
                            <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                            <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                            <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                            <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                            <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                            <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                        </div>
                        <div class="col-md-12">
                            <hr style="margin: 7px 7px!important;">
                            <div class="col-md-3" style="font-size: 12px">
                                About us
                            </div>
                            <div class="col-md-9" style="font-size: 10px">
                                {{ strip_tags($page->description) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="margin: 7px 7px!important;">
                            <div class="col-md-3" style="font-size: 12px">
                                Services
                            </div>
                            <div class="col-md-9">
                                @foreach($page->skills()->get() as $skill)
                                    <span style="background: #eee; padding: 1px; font-size: 8px; margin-right: 2px;">{{ $skill->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr style="margin: 7px 7px!important;">
                            <div class="col-md-3" style="font-size: 12px">
                                Find us
                            </div>
                            <div class="col-md-9">
                                <img src="{{ url('map2_e.PNG') }}" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="layout_3" tabindex="-1" role="dialog" aria-labelledby="layout_3" style="margin-top: 120px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-md-12" style="background: url('{{ url($page->cover) }}'); height: 155px; -webkit-background-size: cover;background-size: cover">
                <div class="col-md-10 col-md-offset-1" style="background:rgba(240, 241, 243, 0.74); padding: 12px 12px; margin-top: 25px">
                    <div class="col-md-4" style="font-size: 10px; margin-top: 30px">
                        {{ $page->email }}<br>
                        {{ $page->phone_number }}<br>
                        CVR: {{ $page->cvr_number }}<br>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <img src="{{ url($page->logo) }}" width="100%">
                    </div>
                    <div class="col-md-4 text-right">
                        <h1 style="font-size: 12px">{{ $page->company_name }}</h1>
                        <div class="nice_line"></div>
                        <h2 style="font-size: 8px">{{ \opStarts\Categories::name($page->category_id) }}</h2>
                        <h3 style="font-size: 8px">{{ $page->website }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="background: white">
                <div class="col-md-10 col-md-offset-1" style="margin-top: 12px; padding-bottom: 25px">
                    <div class="col-md-3" style="font-size: 12px">
                        About us
                    </div>
                    <div class="col-md-9" style="font-size: 10px">
                        {{ strip_tags($page->description) }}
                        <hr style="margin: 7px 7px!important;">
                    </div>
                    <div class="col-md-3" style="font-size: 12px">
                        Services
                    </div>
                    <div class="col-md-9">
                        @foreach($page->skills()->get() as $skill)
                            <span style="background: #eee; padding: 1px; font-size: 8px; margin-right: 2px;">{{ $skill->name }}</span>
                        @endforeach
                        <hr style="margin: 7px 7px!important;">
                    </div>
                    <div class="col-md-3" style="font-size: 12px">
                        Find us
                    </div>
                    <div class="col-md-9">
                        <img src="{{ url('map2_e.PNG') }}" width="100%">
                        <hr style="margin: 7px 7px!important;">
                    </div>
                    <div class="col-md-3" style="font-size: 12px">
                        Gallery
                    </div>
                    <div class="col-md-9">
                        <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                        <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                        <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                        <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                        <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                        <img src="{{ url('nologo.png') }}" width="20%" style="margin-top: 2px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>