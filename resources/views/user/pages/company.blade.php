@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ url('eac/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" href="{{ url('eac/easy-autocomplete.themes.min.css') }}">
    <link rel="stylesheet" href="{{ url('uploader/fine-uploader-gallery.css') }}">
    <style>
        #map{
            width: 100%;
            height: 168px;
            display: block;
        }
        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        .pac-container {
            font-family: Roboto;
        }

        #type-selector {
            color: #fff;
            background-color: #4d90fe;
            padding: 5px 11px 0px 11px;
        }

        #type-selector label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }
        #disabled_location{
            display: none;
        }
        .tabcontent {
            display: none;
            padding: 45px 12px;
            border-top: none;
        }
        .tabcontent {
            -webkit-animation: fadeEffect 1s;
            animation: fadeEffect 1s; /* Fading effect takes 1 second */
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

    </div>
    <div class="container">
        <div class="row no-margin">
            <div class="col-md-12">
                <div class="panel panel-default no-padding min-height-760">
                    <div class="panel-body no-padding" id="my_page_settings" style="padding-top: 45px">
                        {{--<div class="col-md-12" id="menu_options">--}}
                            {{--<div class="col-md-3 menu_option active" id="general_info">--}}
                                {{--General information--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3 menu_option" id="branding_info">--}}
                                {{--Branding--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3 menu_option" id="services_info">--}}
                                {{--Services--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3 menu_option">--}}
                                {{--Portfolio--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{URL::route('updatePage', [$page->id]) }}" enctype="multipart/form-data">
                            <div class="col-md-2 padding-bottom text-center">
                                <div id="info_general">
                                    <a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'general_info')" id="defaultOpen">
                                        <i class="fa fa-pencil-square-o fa-5x" aria-hidden="true"></i>
                                        <h3>General info</h3>
                                    </a>
                                </div>
                                <hr>
                                <div id="info_branding">
                                    <a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'branding_info')">
                                        <i class="fa fa-star fa-5x" aria-hidden="true"></i>
                                        <h3>Branding</h3>
                                    </a>
                                </div>
                                <hr>
                                <div id="info_services">
                                    <a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'services_info')">
                                        <i class="fa fa-tasks fa-5x" aria-hidden="true"></i>
                                        <h3>Services</h3>
                                    </a>
                                </div>
                                <hr>
                                <div id="info_portfolio">
                                    <a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'portfolio_info')">
                                        <i class="fa fa-picture-o fa-5x" aria-hidden="true"></i>
                                        <h3>Portfolio</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-10" style="padding-bottom: 25px;">
                                {{ csrf_field() }}

                                @include('user.pages.company.general')
                                @include('user.pages.company.branding')
                                @include('user.pages.company.services')
                                @include('user.pages.company.portfolio')

                                <div class="col-md-3 col-md-offset-2">
                                    <button type="submit" class="actionButton" style="width: 100%">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('eac/jquery.easy-autocomplete.min.js') }}"></script>
    <script src="{{ url('uploader/fine-uploader.js') }}"></script>

    <script type="text/template" id="qq-template-gallery">
        <div class="qq-uploader-selector qq-uploader qq-gallery" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="qq-upload-button-selector qq-upload-button">
                <div>Upload a file</div>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" role="region" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                    <div class="qq-progress-bar-container-selector qq-progress-bar-container">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <div class="qq-thumbnail-wrapper">
                        <img class="qq-thumbnail-selector" qq-max-size="120" qq-server-scale>
                    </div>
                    <button type="button" class="qq-upload-cancel-selector qq-upload-cancel">X</button>
                    <button type="button" class="qq-upload-retry-selector qq-upload-retry">
                        <span class="qq-btn qq-retry-icon" aria-label="Retry"></span>
                        Retry
                    </button>

                    <div class="qq-file-info">
                        <div class="qq-file-name">
                            <span class="qq-upload-file-selector qq-upload-file"></span>
                            <span class="qq-edit-filename-icon-selector qq-edit-filename-icon" aria-label="Edit filename"></span>
                        </div>
                        <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                        <span class="qq-upload-size-selector qq-upload-size"></span>
                        <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">
                            <span class="qq-btn qq-delete-icon" aria-label="Delete"></span>
                        </button>
                        <button type="button" class="qq-btn qq-upload-pause-selector qq-upload-pause">
                            <span class="qq-btn qq-pause-icon" aria-label="Pause"></span>
                        </button>
                        <button type="button" class="qq-btn qq-upload-continue-selector qq-upload-continue">
                            <span class="qq-btn qq-continue-icon" aria-label="Continue"></span>
                        </button>
                    </div>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>

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

    <script src="{{ url('') }}/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <script>
        $(document).ready(function(){

            $('#add_new_service').click(function(){
                var newSkills = document.getElementById('new_skills');
                $('#new_skills').append('<input type="text" name="newSkills[]" style="margin-top: 5px" placeholder="Your service name?">');
            });

            document.getElementById("defaultOpen").click();
            var general = document.getElementById('general');
            var branding = document.getElementById('branding');
            var services = document.getElementById('services');

            $('#general_info').click(function(){
                $(this).addClass('active');
                $('#branding_info').removeClass('active');
                $('#services_info').removeClass('active');
                $('#general').show();
                $('#branding').hide();
                $('#services').hide();
            });

            $('#branding_info').click(function(){
                $(this).addClass('active');
                $('#general_info').removeClass('active');
                $('#services_info').removeClass('active');
                $('#branding').show();
                $('#services').hide();
                $('#general').hide();
            });
            $('#services_info').click(function(){
                $(this).addClass('active');
                $('#general_info').removeClass('active');
                $('#branding_info').removeClass('active');
                $('#branding').hide();
                $('#services').show();
                $('#general').hide();
            });

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
                            box.innerHTML += '<span class="skill" onclick="remove(this)" id="' + skillID + '">' + skillName + '</span>';
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

