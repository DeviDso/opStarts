<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ url('font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/resp.css') }}">
    <link rel="stylesheet" href="{{ url('css/dropzone.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    @yield('styles')
</head>
<body>
@include('partials.menu')
@include('partials.top-bar')

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

@include('breadcrumbs')

@yield('content')

<footer>
    <div class="container">
        <div class="col-md-4 footer_links">
            <h3>OpStarts</h3>
            <ul>
                <a href="#">
                    <li>About us</li>
                </a>
                <a href="#">
                    <li>OpStarts blog</li>
                </a>
                <a href="#">
                    <li>Terms of Service</li>
                </a>
                <a href="#">
                    <li>Privacy policy</li>
                </a>
                <a href="#">
                    <li>Trust and Safety</li>
                </a>
            </ul>
        </div>
        <div class="col-md-4 footer_links">
            <h3>Contact us</h3>
            <ul>
                <a href="#">
                    <li>Contact form</li>
                </a>
                <a href="#">
                    <li>Find us</li>
                </a>
            </ul>
        </div>
        <div class="col-md-4 footer_links">
            <h3>Browse</h3>
            <ul>
                <a href="#">
                    <li>Service pages</li>
                </a>
                <a href="#">
                    <li>People groups</li>
                </a>
                <a href="#">
                    <li>Jobs</li>
                </a>
            </ul>
        </div>
    </div>
    <div class="border-line"></div>
    <div class="container text-center" id="follow_us">
        <h3>Follow us</h3>
        <a href="#"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
    </div>
</footer>

<script src="{{ url('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@yield('scripts')

</body>
</html>
