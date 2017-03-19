@extends('layouts.app')

@section('styles')
    <style>
        .skill{
            background: #eee;
            border-radius: 3px 0 0 3px;
            color: #999;
            display: inline-block;
            height: 26px;
            line-height: 26px;
            padding: 0 20px 0 23px;
            position: relative;
            margin: 0 10px 10px 0;
            text-decoration: none;
            -webkit-transition: color 0.2s;
            cursor: pointer;
            font: 15px/1.5 'PT Sans', serif;
        }
        .skill::before {
            background: #fff;
            border-radius: 10px;
            box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
            content: '';
            height: 6px;
            left: 10px;
            position: absolute;
            width: 6px;
            top: 10px;
        }
        .skill::after {
            background: #fff;
            border-bottom: 13px solid transparent;
            border-left: 10px solid #eee;
            border-top: 13px solid transparent;
            content: '';
            position: absolute;
            right: 0;
            top: 0;
        }

        .skill:hover {
            background-color: crimson;
            color: white;
        }

        .skill:hover::after {
            border-left-color: crimson;
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
        input.cropit-image-input {
            visibility: hidden;
        }
    </style>
    <link rel="stylesheet" href="{{ url('eac/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" href="{{ url('eac/easy-autocomplete.themes.min.css') }}">
    <link rel="stylesheet" href="{{ url('croppic/croppic.css') }}">
@endsection
@section('content')
<style>
    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    .inputfile + label {
        margin-top: 12px;
        font-size: 1em;
        font-weight: 400;
        color: white;
        background: #8e130c;
        display: inline-block;
        padding: 2px 5px 2px 5px;
        border: solid 1px #8e130c;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }

    .inputfile:focus + label,
    .inputfile + label:hover {
        background-color: white;
        color: black;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
    }
    .inputfile + label {
        cursor: pointer; /* "hand" cursor */
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body min-height-760">
                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('postProfile') }}" enctype="multipart/form-data">
                            <div class="col-md-3 text-center">
                                <div class="form-group{{ $errors->has('profile_picture') ? ' has-error' : '' }}">
                                    <div class="col-md-8">
                                        <label>Profile picture</label>
                                        <img src="{{ url($user->profile_picture) }}" alt="{{ $user->name }}" height="120">
                                        <input type="file" name="file" id="file" class="inputfile" >
                                        <label for="logo">Change</label>
                                        <br>
                                        @if ($errors->has('profile_picture'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('profile_picture') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                {{--<hr>--}}
                                {{--<a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'personal_skills')">--}}
                                    {{--<i class="fa fa-magic fa-5x" aria-hidden="true"></i>--}}
                                    {{--<h3>Skills</h3>--}}
                                {{--</a>--}}
                                {{--<hr>--}}
                                {{--<a href="javascript:void(0)" class="tablinks" onclick="openTab(event, 'personal_settings')">--}}
                                    {{--<i class="fa fa-cogs fa-5x" aria-hidden="true"></i>--}}
                                    {{--<h3>Settings</h3>--}}
                                {{--</a>--}}
                            </div>
                            <div class="col-md-9" id="my_page_settings">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                {{ csrf_field() }}


                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="col-md-8">
                                            <label for="name">Name</label>
                                            <input id="name" type="text" name="name" value="{{ $user->name }}" required>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                        <div class="col-md-8">
                                            <label for="name">Surname</label>
                                            <input id="surname" type="text" name="surname" value="{{ $user->surname }}">
                                            @if ($errors->has('surname'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('surname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                                        <div class="col-md-8">
                                            <label for="nationality">Nationality</label>
                                            <select id="nationality" name="nationality">
                                                @if(!empty($user->nationality))
                                                    <option value="{{ $user->nationality }}" selected="selected">{{ ucfirst($user->nationality) }}</option>
                                                @endif
                                                <option value="">-- select one --</option>
                                                <option value="afghan">Afghan</option>
                                                <option value="albanian">Albanian</option>
                                                <option value="algerian">Algerian</option>
                                                <option value="american">American</option>
                                                <option value="andorran">Andorran</option>
                                                <option value="angolan">Angolan</option>
                                                <option value="antiguans">Antiguans</option>
                                                <option value="argentinean">Argentinean</option>
                                                <option value="armenian">Armenian</option>
                                                <option value="australian">Australian</option>
                                                <option value="austrian">Austrian</option>
                                                <option value="azerbaijani">Azerbaijani</option>
                                                <option value="bahamian">Bahamian</option>
                                                <option value="bahraini">Bahraini</option>
                                                <option value="bangladeshi">Bangladeshi</option>
                                                <option value="barbadian">Barbadian</option>
                                                <option value="barbudans">Barbudans</option>
                                                <option value="batswana">Batswana</option>
                                                <option value="belarusian">Belarusian</option>
                                                <option value="belgian">Belgian</option>
                                                <option value="belizean">Belizean</option>
                                                <option value="beninese">Beninese</option>
                                                <option value="bhutanese">Bhutanese</option>
                                                <option value="bolivian">Bolivian</option>
                                                <option value="bosnian">Bosnian</option>
                                                <option value="brazilian">Brazilian</option>
                                                <option value="british">British</option>
                                                <option value="bruneian">Bruneian</option>
                                                <option value="bulgarian">Bulgarian</option>
                                                <option value="burkinabe">Burkinabe</option>
                                                <option value="burmese">Burmese</option>
                                                <option value="burundian">Burundian</option>
                                                <option value="cambodian">Cambodian</option>
                                                <option value="cameroonian">Cameroonian</option>
                                                <option value="canadian">Canadian</option>
                                                <option value="cape verdean">Cape Verdean</option>
                                                <option value="central african">Central African</option>
                                                <option value="chadian">Chadian</option>
                                                <option value="chilean">Chilean</option>
                                                <option value="chinese">Chinese</option>
                                                <option value="colombian">Colombian</option>
                                                <option value="comoran">Comoran</option>
                                                <option value="congolese">Congolese</option>
                                                <option value="costa rican">Costa Rican</option>
                                                <option value="croatian">Croatian</option>
                                                <option value="cuban">Cuban</option>
                                                <option value="cypriot">Cypriot</option>
                                                <option value="czech">Czech</option>
                                                <option value="danish">Danish</option>
                                                <option value="djibouti">Djibouti</option>
                                                <option value="dominican">Dominican</option>
                                                <option value="dutch">Dutch</option>
                                                <option value="east timorese">East Timorese</option>
                                                <option value="ecuadorean">Ecuadorean</option>
                                                <option value="egyptian">Egyptian</option>
                                                <option value="emirian">Emirian</option>
                                                <option value="equatorial guinean">Equatorial Guinean</option>
                                                <option value="eritrean">Eritrean</option>
                                                <option value="estonian">Estonian</option>
                                                <option value="ethiopian">Ethiopian</option>
                                                <option value="fijian">Fijian</option>
                                                <option value="filipino">Filipino</option>
                                                <option value="finnish">Finnish</option>
                                                <option value="french">French</option>
                                                <option value="gabonese">Gabonese</option>
                                                <option value="gambian">Gambian</option>
                                                <option value="georgian">Georgian</option>
                                                <option value="german">German</option>
                                                <option value="ghanaian">Ghanaian</option>
                                                <option value="greek">Greek</option>
                                                <option value="grenadian">Grenadian</option>
                                                <option value="guatemalan">Guatemalan</option>
                                                <option value="guinea-bissauan">Guinea-Bissauan</option>
                                                <option value="guinean">Guinean</option>
                                                <option value="guyanese">Guyanese</option>
                                                <option value="haitian">Haitian</option>
                                                <option value="herzegovinian">Herzegovinian</option>
                                                <option value="honduran">Honduran</option>
                                                <option value="hungarian">Hungarian</option>
                                                <option value="icelander">Icelander</option>
                                                <option value="indian">Indian</option>
                                                <option value="indonesian">Indonesian</option>
                                                <option value="iranian">Iranian</option>
                                                <option value="iraqi">Iraqi</option>
                                                <option value="irish">Irish</option>
                                                <option value="israeli">Israeli</option>
                                                <option value="italian">Italian</option>
                                                <option value="ivorian">Ivorian</option>
                                                <option value="jamaican">Jamaican</option>
                                                <option value="japanese">Japanese</option>
                                                <option value="jordanian">Jordanian</option>
                                                <option value="kazakhstani">Kazakhstani</option>
                                                <option value="kenyan">Kenyan</option>
                                                <option value="kittian and nevisian">Kittian and Nevisian</option>
                                                <option value="kuwaiti">Kuwaiti</option>
                                                <option value="kyrgyz">Kyrgyz</option>
                                                <option value="laotian">Laotian</option>
                                                <option value="latvian">Latvian</option>
                                                <option value="lebanese">Lebanese</option>
                                                <option value="liberian">Liberian</option>
                                                <option value="libyan">Libyan</option>
                                                <option value="liechtensteiner">Liechtensteiner</option>
                                                <option value="lithuanian">Lithuanian</option>
                                                <option value="luxembourger">Luxembourger</option>
                                                <option value="macedonian">Macedonian</option>
                                                <option value="malagasy">Malagasy</option>
                                                <option value="malawian">Malawian</option>
                                                <option value="malaysian">Malaysian</option>
                                                <option value="maldivan">Maldivan</option>
                                                <option value="malian">Malian</option>
                                                <option value="maltese">Maltese</option>
                                                <option value="marshallese">Marshallese</option>
                                                <option value="mauritanian">Mauritanian</option>
                                                <option value="mauritian">Mauritian</option>
                                                <option value="mexican">Mexican</option>
                                                <option value="micronesian">Micronesian</option>
                                                <option value="moldovan">Moldovan</option>
                                                <option value="monacan">Monacan</option>
                                                <option value="mongolian">Mongolian</option>
                                                <option value="moroccan">Moroccan</option>
                                                <option value="mosotho">Mosotho</option>
                                                <option value="motswana">Motswana</option>
                                                <option value="mozambican">Mozambican</option>
                                                <option value="namibian">Namibian</option>
                                                <option value="nauruan">Nauruan</option>
                                                <option value="nepalese">Nepalese</option>
                                                <option value="new zealander">New Zealander</option>
                                                <option value="ni-vanuatu">Ni-Vanuatu</option>
                                                <option value="nicaraguan">Nicaraguan</option>
                                                <option value="nigerien">Nigerien</option>
                                                <option value="north korean">North Korean</option>
                                                <option value="northern irish">Northern Irish</option>
                                                <option value="norwegian">Norwegian</option>
                                                <option value="omani">Omani</option>
                                                <option value="pakistani">Pakistani</option>
                                                <option value="palauan">Palauan</option>
                                                <option value="panamanian">Panamanian</option>
                                                <option value="papua new guinean">Papua New Guinean</option>
                                                <option value="paraguayan">Paraguayan</option>
                                                <option value="peruvian">Peruvian</option>
                                                <option value="polish">Polish</option>
                                                <option value="portuguese">Portuguese</option>
                                                <option value="qatari">Qatari</option>
                                                <option value="romanian">Romanian</option>
                                                <option value="russian">Russian</option>
                                                <option value="rwandan">Rwandan</option>
                                                <option value="saint lucian">Saint Lucian</option>
                                                <option value="salvadoran">Salvadoran</option>
                                                <option value="samoan">Samoan</option>
                                                <option value="san marinese">San Marinese</option>
                                                <option value="sao tomean">Sao Tomean</option>
                                                <option value="saudi">Saudi</option>
                                                <option value="scottish">Scottish</option>
                                                <option value="senegalese">Senegalese</option>
                                                <option value="serbian">Serbian</option>
                                                <option value="seychellois">Seychellois</option>
                                                <option value="sierra leonean">Sierra Leonean</option>
                                                <option value="singaporean">Singaporean</option>
                                                <option value="slovakian">Slovakian</option>
                                                <option value="slovenian">Slovenian</option>
                                                <option value="solomon islander">Solomon Islander</option>
                                                <option value="somali">Somali</option>
                                                <option value="south african">South African</option>
                                                <option value="south korean">South Korean</option>
                                                <option value="spanish">Spanish</option>
                                                <option value="sri lankan">Sri Lankan</option>
                                                <option value="sudanese">Sudanese</option>
                                                <option value="surinamer">Surinamer</option>
                                                <option value="swazi">Swazi</option>
                                                <option value="swedish">Swedish</option>
                                                <option value="swiss">Swiss</option>
                                                <option value="syrian">Syrian</option>
                                                <option value="taiwanese">Taiwanese</option>
                                                <option value="tajik">Tajik</option>
                                                <option value="tanzanian">Tanzanian</option>
                                                <option value="thai">Thai</option>
                                                <option value="togolese">Togolese</option>
                                                <option value="tongan">Tongan</option>
                                                <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                                <option value="tunisian">Tunisian</option>
                                                <option value="turkish">Turkish</option>
                                                <option value="tuvaluan">Tuvaluan</option>
                                                <option value="ugandan">Ugandan</option>
                                                <option value="ukrainian">Ukrainian</option>
                                                <option value="uruguayan">Uruguayan</option>
                                                <option value="uzbekistani">Uzbekistani</option>
                                                <option value="venezuelan">Venezuelan</option>
                                                <option value="vietnamese">Vietnamese</option>
                                                <option value="welsh">Welsh</option>
                                                <option value="yemenite">Yemenite</option>
                                                <option value="zambian">Zambian</option>
                                                <option value="zimbabwean">Zimbabwean</option>
                                            </select>
                                            @if ($errors->has('nationality'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('nationality') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                        <div class="col-md-8">
                                            <label for="gender">Gender</label>
                                            Man <input id="man" type="radio" name="gender" value="man" {{ ($user->gender == 'man') ? 'checked="checked"' : ''}}>
                                            Woman <input id="woman" type="radio" name="gender" value="woman" {{ ($user->gender == 'woman') ? 'checked="checked"' : '' }}>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <div class="col-md-8">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description">{{ $user->description }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    {{--<div id="image-cropper">--}}
                                        {{--<div class="cropit-preview"></div>--}}

                                        {{--<input type="range" class="cropit-image-zoom-input" />--}}

                                        {{--<!-- The actual file input will be hidden -->--}}
                                        {{--<input type="file" class="cropit-image-input" />--}}
                                        {{--<!-- And clicking on this button will open up select file dialog -->--}}
                                        {{--<div class="select-image-btn">Select new image</div>--}}
                                    {{--</div>--}}




                                <div id="personal_skills" class="tabcontent">
                                    <div class="form-group{{ $errors->has('current_status') ? ' has-error' : '' }}">
                                        <label for="current_status" class="col-md-3 control-label">Current status</label>

                                        <div class="col-md-8">
                                            <select id="current_status" name="current_status">
                                                @foreach($current_status as $cs)
                                                    <option value="{{ $cs->id }}" {{ ($user->current_status == $cs->id) ? 'selected="selected"' : '' }}>{{ $cs->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('current_status'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('current_status') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="description" class="col-md-3 control-label">Skills search</label>
                                        <div class="col-md-8">
                                            <input id="skills" type="text" style="width: 250px" onkeydown="addSkill(this)" autocomplete="off">
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="skills_list" class="col-md-3 control-label">
                                            <small>Your skills:</small>
                                        </label>
                                        <div class="col-md-8">
                                            <div id="skills_list">
                                                @foreach($skills as $skill)
                                                    <span class="skill" onclick="remove(this)" id="{{ $skill->id }}">{{ $skill->name }}</span>
                                                    <input type="hidden" name="skills[]" value="{{ $skill->id }}" id="hidden-{{ $skill->id }}">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group padding-bottom">
                                        <label for="skills_list" class="col-md-3 control-label">
                                            Can't find your service?
                                        </label>
                                        <div class="col-md-9">
                                            <div id="skills_list">
                                                <div class="col-md-12" id="new_skills"></div>
                                                <div id="add_new_service">
                                                    + Add new service
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="personal_settings" class="tabcontent">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-3 control-label">Email</label>
                                        <div class="col-md-8">
                                            <input id="email" type="email" name="email" value="{{ $user->email }}" disabled>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                        <label for="phone_number" class="col-md-3 control-label">Phone number</label>
                                        <div class="col-md-8">
                                            <input id="phone_number" type="text" name="phone_number" value="{{ $user->phone_number }}" disabled>
                                            @if(Auth::user()->status == 0)
                                                <small>
                                                    <a href="{{ URL::route('confirmation') }}">
                                                        Confirm number
                                                    </a>
                                                </small>
                                            @endif
                                            @if ($errors->has('phone_number'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="actionButton">
                                            Update
                                        </button>
                                    </div>
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
    <script src="{{ url('') }}/eac/jquery.easy-autocomplete.min.js"></script>
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
        $(document).ready(function(){

            $('#add_new_service').click(function(){
                var newSkills = document.getElementById('new_skills');
                $('#new_skills').append('<input type="text" name="newSkills[]" style="margin-top: 5px" placeholder="Your service name?">');
            });

            document.getElementById("defaultOpen").click();
            var url = '<?php echo url(''); ?>';
            var options = {
                url: url + "/opStarts/export/data/skills",

                getValue: "name",

                list: {
                    onSelectItemEvent: function() {
                        var index = $("#skills").getSelectedItemData().id;

                        console.log(index);
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
                        console.log(divLength);
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
    <script src="{{ url('croppic/croppic.js') }}"></script>
    <script>
        var cont = $('#photo_container');
        var croppedOptions = {
            uploadUrl: 'upload',
            cropUrl: 'crop',
            cropData:{
                'width' : cont.width(),
                'height': cont.height()
            }
        };
        var cropperBox = new Croppic('photo_container', croppedOptions);
    </script>
    <script>
        $(document).ready(function(){
            $('#image-cropper').cropit();

// When user clicks select image button,
// open select file dialog programmatically
            $('.select-image-btn').click(function() {
                $('.cropit-image-input').click();
            });

// Handle rotation
            $('.rotate-cw-btn').click(function() {
                $('#image-cropper').cropit('rotateCW');
            });
            $('.rotate-ccw-btn').click(function() {
                $('#image-cropper').cropit('rotateCCW');
            });
        });
    </script>
@endsection
