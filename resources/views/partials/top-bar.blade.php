<?php
    $categories = \opStarts\Categories::all();
?>
<div id="top_bar">
    <div class="container">
        <a href="{{ url('') }}">
            <img src="{{ url('') }}/logo.png" alt="OpStarts.dk" height="30">
        </a>
        @if(!Request::is('login') && !Request::is('register'))
                <ul id="top_menu" class="mnMen">
                    <li id="providers_top_menu">
                        Service categories <i class="fa fa-caret-down" aria-hidden="true"></i>
                        <ul id="providers_sub_menu">
                            @foreach($categories as $cat)
                                <a href="{{ route('category', $cat->slug)}}">
                                    <li> {{ $cat->name }}</li>
                                </a>
                            @endforeach
                        </ul>
                    </li>
                    {{--<li>Groups</li>--}}
                    {{--<li>Jobs</li>--}}
                </ul>
                {{--<span id="search_field">--}}
                    {{--<i class="fa fa-search" aria-hidden="true"></i><input type="text" id="search" placeholder="Search">--}}
                {{--</span>--}}
                <div id="user_options">
                    @if(Auth::check())
                        {{ Auth::user()->name }} <i class="fa fa-caret-down" aria-hidden="true"></i> <img id="user_image" src="{{ url(''). '/' . Auth::user()->profile_picture }}">
                    @endif
                </div>
                <div id="auth_options">
                    @if(!Auth::check())
                        <span id="login" class="auth">
                            <a href="{{ url('login') }}">
                                <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                            </a>
                        </span>
                        <span id="register" class="auth">
                            <a href="{{ url('register') }}">
                                <i class="fa fa-user-plus" aria-hidden="true"></i> Register
                            </a>
                        </span>
                    @endif
                </div>
        @endif
        @if(Request::is('login'))
            <div id="auth_options">
                Don't have an account?
                <span id="register" class="auth">
                    <a href="{{ url('register') }}">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> Register
                    </a>
                </span>
            </div>
        @endif
        @if(Request::is('register'))
            <div id="auth_options">
                Already have an account?
                <span id="register" class="auth">
                    <a href="{{ url('login') }}">
                        <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                    </a>
                </span>
            </div>
        @endif
    </div>
</div>
@if(Auth::check())
    <div id="under_top_bar">
        <div class="container">
            <ul>
                <li class="menuActive"><a href="{{ url('') }}">Home</a></li>
                <li><a href="{{ route('myPages') }}">My Pages</a></li>
                {{--<li><a href="#">My Groups</a></li>--}}
            </ul>
            <div id="add_service">
                <a href="{{ route('newPage') }}">
                    <button class="serviceButton">Create Page</button>
                </a>
            </div>
        </div>
    </div>
@endif