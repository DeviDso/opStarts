@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $page->company_name }} - CVR: {{ $page->cvr_number }}</div>
                    <div class="panel-body text-center">
                        <img src="{{ url($page->logo) }}" alt="{{ $page->company_name }}" width="100%">
                        <p>
                            {{ $page->description }}
                        </p>
                        <h4>{{ $page->phone_number }} <br> {{ $page->email }} <br> <a href="{{ $page->website }}">{{ $page->company_name }}</a></h4>
                        <hr>
                        <h4>Services:</h4>
                        @foreach($services as $service)
                            <a href="{{ URL::route('professionService', [ $profession->slug, $service->slug]) }}">
                                {{ $service->name }}
                            </a>|
                        @endforeach
                        <hr>
                        <div id="map2" style="width: 100%; height: 180px;"></div>
                        <hr>
                        <div class="col-md-6">
                            <h4>Address</h4>
                            {{ $page->street . ' ' . $page->number }}<br>
                            {{ $page->post_code . ' ' . $page->city }}<br>
                            {{ $page->country }}
                        </div>
                        <div class="col-md-6">
                            <h4>Socials</h4>
                            <a href="{{ $page->google }}">
                                <i class="fa fa-google-plus fa-3x" aria-hidden="true"></i>
                            </a>
                            <a href="{{ $page->linkedin }}">
                                <i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i>
                            </a>
                            <a href="{{ $page->facebook }}">
                                <i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <h3>Portfolio</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
