@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $service->name }}</div>
                    <div class="panel-body text-center">
                        @include('pages.partials.listPage')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
