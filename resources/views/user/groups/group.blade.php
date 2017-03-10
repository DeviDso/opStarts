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
                    <div class="panel-heading">{{ $group->name }}</div>
                    <div class="panel-body text-center">
                        <h4>Description</h4>
                        <p>
                            {{ $group->description }}
                        </p>
                        <hr>
                        <h4>Skills</h4>
                        <p>
                            @foreach(\opStarts\UserGroups::groupSkills($group->id) as $skill)
                                <span class="skill">{{ $skill->name }}</span>
                            @endforeach
                        </p>
                        <hr>
                        <h4>Members</h4>
                        <p>
                            @foreach($group->users()->get() as $user)
                                <span class="member">{{ $user->name . ' ' . $user->surname }}</span>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
