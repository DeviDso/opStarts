<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if(isset($meta))
        @include('meta.modified')
    @else
        @include('meta.simple')
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('') }}/font-awesome.min.css">
    @yield('styles')
    <style>
        #map {
            height: 250px;
            display: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'opStarts') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                @if(!Auth::guest() && Auth::user()->status == 1)
                    <li><a href="{{ URL::route('home') }}">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Groups <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('newGroup') }}">Create</a></li>
                            @foreach(Auth::user()->groups()->get() as $group)
                                <li><a href="{{ route('userGroup', $group->id) }}">{{ $group->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Pages <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('newGroup') }}">Create</a></li>
                            @foreach(Auth::user()->groups()->get() as $group)
                                <li><a href="{{ route('userGroup', $group->id) }}">{{ $group->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @if(Auth::user()->admin == 1)
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Admin <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ URL::route('adminCategories') }}">Categories</a></li>
                                <li><a href="{{ URL::route('adminProfessions') }}">Professions</a></li>
                                <li><a href="{{ URL::route('adminServices') }}">Services</a></li>
                            </ul>
                        </li>
                    @endif
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ URL::route('profile') }}">Profile</a></li>
                            <li><a href="{{ URL::route('myList') }}">Pages</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="col-md-12">
    @if(Auth::check())
        @if(\Request::get('invitation'))
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                    <a href="{{ route('groupInvitations') }}">
                        <div class="alert alert-info text-center" role="alert">
                            You have invitation to group!
                        </div>
                    </a>
                </div>
            </div>
        @endif
    @endif
</div>
@yield('content')
        <!-- Scripts -->
<script src="/js/app.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@if(Route::current()->getName() == 'page')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3esnqZlPdKGwKB_0IKZyRdUYVJfSPhns&callback=initMap" async defer></script>
    <script>
        var map;
        var geoInfo = "<?php echo url('opStarts/export/data/pageGeo') . '/' . $page->id ?>";
        $.getJSON( geoInfo, function( data ) {
            this.lat = data[0]['map_lat'];
            this.long = data[0]['map_long'];
        });

        function initMap() {
            var geoInfo = "<?php echo url('opStarts/export/data/pageGeo') . '/' . $page->id ?>";
            $.getJSON( geoInfo, function( data ) {
                var lat = data[0]['map_lat'];
                var long = data[0]['map_long'];

                var myLatLng = {lat: +lat, lng: +long};

                var map = new google.maps.Map(document.getElementById('map2'), {
                    zoom: 15,
                    center: myLatLng
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'Hello World!'
                });
            });

        }
    </script>
@endif


@if(Route::current()->getName() == 'myPage')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3esnqZlPdKGwKB_0IKZyRdUYVJfSPhns&libraries=places&callback=initialize" async defer></script>
    <script src="{{ URL::asset('js/cPageMap.js') }}"></script>
@endif
@yield('scripts')
</body>
</html>
