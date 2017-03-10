@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $category->name }}</div>
                    <div class="panel-body text-center">
                        @foreach($professions as $prof)
                            <a href="{{ URL::route('profession', [$prof->slug]) }}">
                                {{ $prof->name }}
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
