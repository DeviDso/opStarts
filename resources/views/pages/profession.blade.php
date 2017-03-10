@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $profession->name }}</div>
                    <div class="panel-body text-center">
                        @foreach($services as $service)
                            <a href="{{ URL::route('professionService', [$profession->slug, $service->slug]) }}">
                                {{ $service->name }}
                            </a>|
                        @endforeach
                        <hr>
                        @include('pages.partials.listPage')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
