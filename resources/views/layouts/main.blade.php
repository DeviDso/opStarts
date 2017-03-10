<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ url('') }}/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('') }}/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="{{ url('') }}/font-awesome.min.css">
        <link rel="stylesheet" href="{{ url('') }}/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

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

        @yield('content')

        <script src="{{ url('') }}/js/jquery-3.1.1.min.js"></script>
        <script src="{{ url('') }}/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ url('') }}/js/main.js"></script>
        @yield('scripts')
    </body>
</html>
