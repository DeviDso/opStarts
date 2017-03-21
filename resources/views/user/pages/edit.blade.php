@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ url('eac/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" href="{{ url('eac/easy-autocomplete.themes.min.css') }}">
    <link rel="stylesheet" href="{{ url('uploader/fine-uploader-gallery.css') }}">
    <style>
        .dz-message{
            display: block!important;
        }
        .dropzone .dz-preview .dz-image
        {
            width: 75px;
            height: 75px;
        }
        .dz-filename{
            display: none;
        }
        .dz-size{
            display: none;
        }
        .dropzone .dz-preview.dz-image-preview{
            background: none;
        }
        #papa{
            background: rgba(0, 0, 0, 0.3);
            color: #8e130c;
            border: none;
            font-size: 16px;
        }
        #papa:hover{
            background: rgba(0, 0, 0, 0.2);
        }
        #change-cover{
            border: solid 1px #333333;
            padding: 5px;
            background: #333333;
            margin-top: 5px;
            float: left;
            color: white;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            cursor: pointer
        }
        #change-cover:hover{
            color: rgb(162, 162, 162);
        }
        #skills{
            width: 100%;
            float: left;
        }
        #logo-image{
            position: relative;
            display: block;
            width: 100%;
            height: 100%;
            z-index: 999;
            color: white;
            cursor: pointer;
        }
        #logo-image:hover{
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            -ms-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
            background: #8e130c;

        }
        #logo-image:after{
            position: absolute;
            top: 0;
            left: 35%;
            content: "Change logo";
        }
        img:hover,
        #logo-image:hover img {
            opacity: 0.3;
        }
        .skillz{
            display: block;
            width: 100%;
            background: none;
            border-bottom: dotted 1px #333333;
            font-size: 18px;
            text-align: center;
            letter-spacing: 2px;
            margin-top: 5px;
        }
        .skillz:hover:after{
            content: 'x';
            float: right;
        }
        .skillz:hover{
            background: #8e130c;
            color: white;
            cursor: pointer;
        }

        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }
        #disabled_location{
            display: none;
        }

        @-webkit-keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }
        a {
            color: #282828;
        }
        a:hover{
            color: #8e130c;
            text-decoration: none;
        }
        a::selection{
            color: red;
        }
        .tablinks .active a
        {
            color: #8e130c;
        }
    </style>

@endsection

@section('content')
    <div class="row no-margin" id="my_page_cover">
        <span id="change-cover">
            Change cover image
        </span>
    </div>
    <div class="container">
        <div class="row no-margin">
            <div class="col-md-12">
                <div class="panel panel-default no-padding min-height-760">
                    <div class="panel-body no-padding" id="my_page_settings" style="padding-top: 45px">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <label for="papa">Gallery images</label>
                                <div class="dropzone" id="papa">
                                    <form action="" class="dz-clickable">
                                        <div class="dz-message">Drop files here or click to upload.
                                            <br> <span class="note">(There can be <strong>more</strong> then one file at once!)</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('updatePage', [$page->id]) }}" enctype="multipart/form-data">
                            <input type="file" name="cover" id="cover" style="display: none">
                            <div class="col-md-9">
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="col-md-9">
                                            <label for="name">Page name</label>
                                            <input id="name" type="text" class="form-control" name="name" value="{{ $page->name }}" required autocomplete="off">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('cvr_number') ? ' has-error' : '' }}">
                                        <div class="col-md-9">
                                            <label for="cvr_number">CVR Number</label>
                                            <input id="cvr_number" type="text" class="form-control" name="cvr_number" value="{{ $page->cvr_number }}" autocomplete="off">
                                            @if ($errors->has('cvr_number'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('cvr_number') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                        <div class="col-md-9">
                                            <label for="phone_number">Phone number</label>
                                            <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $page->phone_number }}" autocomplete="off">
                                            @if ($errors->has('phone_number'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="col-md-9">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ $page->email }}" required autocomplete="off">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <div class="col-md-9">
                                            <label for="address">Address</label>
                                            <input id="autocomplete" type="text" class="form-control" name="address" value="{{ $page->address }}" required placeholder="Enter your address" onFocus="geolocate()">
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
                                        <input name="city" class="field" id="locality" value="{{ \opStarts\Cities::getName($page->city) }}" required>
                                        <input name="a_a_l" class="field" id="administrative_area_level_1">
                                        <input name="post_code" class="field" id="postal_code" value="{{ $page->post_code }}">
                                        <input name="country" class="field" id="country" value="{{ $page->country }}">
                                        <input name="lat" class="field" id="lat" value="{{ $page->map_lat }}">
                                        <input name="long" class="field" id="long" value="{{ $page->map_long }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                        <div class="col-md-9">
                                            <label for="website">Website</label>
                                            <input id="website" type="text" class="form-control" name="website" value="{{ $page->website }}" autocomplete="off">
                                            @if ($errors->has('website'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                                        <div class="col-md-9">
                                            <label for="facebook">Facebook</label>
                                            <input id="facebook" type="text" class="form-control" name="facebook" value="{{ $page->facebook }}" autocomplete="off">
                                            @if ($errors->has('facebook'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('facebook') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('google') ? ' has-error' : '' }}">
                                        <div class="col-md-9">
                                            <label for="google">Google</label>
                                            <input id="google" type="text" class="form-control" name="google" value="{{ $page->google }}" autocomplete="off">
                                            @if ($errors->has('google'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('google') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }} padding-bottom">
                                        <div class="col-md-9">
                                            <label for="linkedin">Linked in</label>
                                            <input id="linkedin" type="text" class="form-control" name="linkedin" value="{{ $page->linkedin }}" autocomplete="off">
                                            @if ($errors->has('linkedin'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('linkedin') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control" name="description" style="min-height: 120px; font-size: 19px">{{ $page->description }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} padding-bottom">
                                    <div class="col-md-12">
                                        <label for="skills_list">Your services:</label>
                                        <div id="skills_list">
                                            @foreach($skills as $skill)
                                                <span class="skillz" onclick="remove(this)" id="{{ $skill->id }}">{{ $skill->name }}</span>
                                                <input type="hidden" name="skills[]" value="{{ $skill->id }}" id="hidden-{{ $skill->id }}">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('skills') ? ' has-error' : '' }}">
                                    <div class="col-md-12">
                                        <label for="description">Services</label>
                                        <input id="skills" type="text" class="form-control" onkeydown="addSkill(this)" autocomplete="off">
                                        @if ($errors->has('skills'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('skills') }}</strong>
                                            </span>
                                        @endif
                                        <br>
                                        <label for="skills_list">Can't find your service?</label>
                                    </div>
                                </div>
                                <div class="form-group padding-bottom">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div id="skills_list">
                                                <div class="col-md-12" id="new_skills"></div>
                                                <div id="add_new_service">
                                                    + Add new service
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-bottom: 25px; margin-top: 45px">
                                {{ csrf_field() }}

                                <div class="col-md-3 col-md-offset-2">
                                    <button type="submit" class="actionButton" style="width: 100%" id="submit_button">
                                        Save
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    @if($page->status)
                                        <a href="{{ route('changePageStatus', $page->id) }}">
                                            <button type="button" class="actionButton" style="width: 100%">
                                                Make inactive
                                            </button>
                                        </a>
                                    @else
                                        <a href="{{ route('changePageStatus', $page->id) }}">
                                            <button type="button" class="actionButton" style="width: 100%">
                                                Publish
                                            </button>
                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="actionButton" style="width: 100%">
                                        DELETE
                                    </button>
                                </div>
                            </div>
                            <div id="gallery_items_container">
                                <input type="hidden" name="gallery[]">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('js/dropzone.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function(){
            $('#submit_button').click(function(){
                var city = $('#locality');
                var description = $('#description');
                var name = $('name');
                if(city.value != '')
                {
                    toastr["error"]("City address is missing!", "Error");

                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": true,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
                if(description.value != '')
                {
                    toastr["error"]("Please describe your activity", "Error");

                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": true,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
                if(name.value != '')
                {
                    toastr["error"]("Page name is missing!", "Error");

                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": true,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            });
            var myDropzone = new Dropzone("div#papa", {
                url: "/pages/update/gallery/add/new/item",
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                success: function(file, response){
                    var container = document.getElementById('gallery_items_container');
                    container.innerHTML = '<input type="hidden" name="gallery[]" value="' +response+ '">';
                    console.log(response);
                }
//            init: function() {
//                this.on("addedfile", function(file) {
//                    console.log(file);
//                });
//            },
//            complete: function(data)
//            {
//                console.log(data);
//            }
            });
            myDropzone.on('sending', function(file, xhr, formData){
                formData.append('pageId', '{{ Route::current()->getParameter('id') }}');
            });
            Dropzone.options.myDropzone = {
                success: function(file, response){
                    alert(response);
                }
            };
        });
    </script>
    <script src="{{ url('eac/jquery.easy-autocomplete.min.js') }}"></script>
    <script src="{{ url('tinymce/tinymce.min.js') }}"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-czJmy1SCXZHwsGGMHMdqzDHGsumsk9k&libraries=places&callback=initAutocomplete" async defer></script>
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                    {types: ['geocode'], componentRestrictions:{country: 'dk'}});

            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            var place = autocomplete.getPlace();

            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();

            var latPlace = document.getElementById('lat');
            latPlace.value = lat;

            var longPlace = document.getElementById('long');
            longPlace.value = lng;

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }

        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
    </script>
    <script>
        $(document).ready(function(){

            $('#logo-image').click(function(){
                $('#logo').click();
            });

            $('#change-cover').click(function(){
                $('#cover').click();
            });

            $('#add_new_service').click(function(){
                var newSkills = document.getElementById('new_skills');
                $('#new_skills').append('<input type="text" name="newSkills[]" style="margin-top: 5px" placeholder="Your service name?">');
            });
            var general = document.getElementById('general');
            var branding = document.getElementById('branding');
            var services = document.getElementById('services');

            var cover = document.getElementById('my_page_cover');
            var coverURL = '<?php echo url('') ."/" . $page->cover; ?>';

            cover.style.background = 'url("' + coverURL +'") no-repeat';
            cover.style.backgroundSize = 'cover';

            var url = '<?php echo url(''); ?>';
            var options = {
                url: url + "/opStarts/export/data/skills",

                getValue: "name",

                list: {
                    onSelectItemEvent: function() {
                        var index = $("#skills").getSelectedItemData().id;
                    },
                    onClickEvent: function() {
                        var box = document.getElementById('skills_list');
                        var skills = $('#skills');
                        var skillName = skills.getSelectedItemData().name;
                        var skillID = skills.getSelectedItemData().id;

                        var skillsLength = $("#skills_list > span").length;

                        var checker = $("#skills").getSelectedItemData().id;

                        if(skillsLength < 5)
                        {
                            box.innerHTML += '<span class="skillz" onclick="remove(this)" id="' + skillID + '">' + skillName + '</span>';
                            box.innerHTML += '<input type="hidden" name="skills[]" value="' + skillID + '" id="hidden-'+skillID+'">';
                        }
                        else
                        {
                            alert("Maximum 20 skills!");
                        }
                        skills.value = '';
                    },
                    onHideListEvent: function(){
                        var skills = document.getElementById('skills');
                        skills.value = '';

                        var divLength = $("#skills_list > span").length;
                    },
                    match: {
                        enabled: true
                    }
                },

                theme: "plate-dark"
            };
            $("#skills").easyAutocomplete(options);
        });
        function addSkill(req)
        {
            var input = $('#' + req.id);
            var text = input.val();
            var length = text.length;
            var skills = document.getElementById('skills');

            if(text.charAt(length-1) == ",")
            {
                var toMove = text.replace(",", "");
                var box = document.getElementById('skills_list');

                box.innerHTML += '<span class="skill" onclick="remove(this)">' + toMove + '</span>';
                box.innerHTML += '<input type="hidden" name="skills[]" value="' + toMove + '">';

                skills.value = '';
            }
        }

        function remove(element)
        {
            var skill = document.getElementById('hidden-'+element.id);
            element.remove();
            skill.remove();
        }
    </script>
@endsection

