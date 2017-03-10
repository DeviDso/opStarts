@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ url('') }}/eac/easy-autocomplete.min.css">
    <link rel="stylesheet" href="{{ url('') }}/eac/easy-autocomplete.themes.min.css">
    <style>
        .member{
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
        .member::after {
            background: #fff;
            border-bottom: 13px solid transparent;
            border-left: 10px solid #eee;
            border-top: 13px solid transparent;
            content: '';
            position: absolute;
            right: 0;
            top: 0;
        }

        .member:hover {
            background-color: crimson;
            color: white;
        }

        .member:hover::after {
            border-left-color: crimson;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Group</div>
                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('postGroup') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Group name</label>

                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" name="description" class="form-control"></textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('inviteMember') ? ' has-error' : '' }}">
                                <label for="inviteMember" class="col-md-4 control-label">Invite member</label>

                                <div class="col-md-6">
                                    <input type="text" name="inviteMember" id="inviteMember" class="form-control">
                                    <button type="button" onclick="add(this)">Invite</button>
                                    @if ($errors->has('inviteMember'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('inviteMember') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="skills_list" class="col-md-4 control-label">
                                    <small>Members:</small>
                                </label>

                                <div class="col-md-6">
                                    <div id="members_list">
                                        <input type="hidden" name="owner[]" value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
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
    <script src="{{ url('') }}/eac/jquery.easy-autocomplete.min.js"></script>
    <script>
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }

        function add() {
            var email = $('#inviteMember').val();
            var box = document.getElementById('members_list');

            if (validateEmail(email)) {
                box.innerHTML += '<span class="member" onclick="remove(this)" id="' + email + '">' + email + '</span>';
                box.innerHTML += '<input type="hidden" name="members[]" value="' + email + '" id="hidden-' + email + '">';
            }
            else {
                alert("It is not email!");
            }
        }
        $(document).ready(function(){

            var url = '<?php echo url(''); ?>';
            var options = {
                url: url + "/opStarts/export/data/members",

                getValue: "email",

                list: {
                    onClickEvent: function() {
                        var box = document.getElementById('members_list');
                        var skills = $('#inviteMember');
                        var fullName = skills.getSelectedItemData().name + ' ' + skills.getSelectedItemData().surname;
                        var email = skills.getSelectedItemData().email;
                        var id = skills.getSelectedItemData().id;

                        var skillsLength = $("#members_list > span").length;

                        if(skillsLength <= 10)
                        {
                            box.innerHTML += '<span class="member" onclick="remove(this)" id="open-' + email + '">' + fullName + '</span>';
                            box.innerHTML += '<input type="hidden" name="members[]" value="' + email + '" id="'+ email +'">';
                        }
                        else
                        {
                            alert("Maximum 10 members!");
                        }
                        skills.value = '';
                    },
                    onHideListEvent: function(){
//                        var inviteMember = document.getElementById('inviteMember');
//                        inviteMember.value = '';
                    },
                    match: {
                        enabled: true
                    }
                },

                theme: "plate-dark"
            };
            $("#inviteMember").easyAutocomplete(options);
        });

        function remove(element)
        {
            var temp = element.id;
            temp = temp.replace("open-", "");

            var skill = document.getElementById(temp);
            element.remove();
            skill.remove();
        }
    </script>
@endsection
