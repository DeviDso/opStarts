@if(Auth::check())
    <div id="main_menu">
        <div class="col-md-12">
            <i class="fa fa-times" aria-hidden="true" id="close_menu"></i>
        </div>
        <div id="user_area">
            <div id="photo">
                <img src="{{ url('') . '/' . Auth::user()->profile_picture }}" id="profile_picture">
                <h4>
                    {{ Auth::user()->name }}
                </h4>
            </div>
            <div class="border-line"></div>
            <ul>
                <a href="{{ route('newPage') }}">
                    <li>
                        <i class="fa fa-space-shuttle" aria-hidden="true"></i> Create Page
                    </li>
                </a>
                <a href="{{ route('myPages') }}">
                    <li>
                        <i class="fa fa-suitcase" aria-hidden="true"></i> My Pages
                    </li>
                </a>
            </ul>
            <div class="border-line"></div>
            <ul>
                <a href="{{ route('profile') }}">
                    <li>
                        <i class="fa fa-user" aria-hidden="true"></i> <span>Profile</span>
                    </li>
                </a>
                <li><i class="fa fa-cogs" aria-hidden="true"></i> Settings</li>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    <li>
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                    </li>
                </a>
            </ul>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endif

{{--<li id="menu_groups">--}}
    {{--<i class="fa fa-users" aria-hidden="true"></i> Groups--}}
    {{--<ul class="sub_menu" id="sub_menu_groups">--}}
        {{--<li><a href="{{ url('') }}">Create Service</a></li>--}}
        {{--<li><a href="{{ url('') }}">List of Services</a></li>--}}
    {{--</ul>--}}
{{--</li>--}}