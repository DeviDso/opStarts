@extends('layouts.app')

@section('styles')
    <style>
        #map{
            width: 100%;
            height: 250px;
        }
        #lightgallery{
            margin-top: 35px;
        }
        .gallery_item{
            height: 120px;
            margin-top: 3px;
        }
    </style>
    <link type="text/css" rel="stylesheet" href="{{ url('') }}/gall/css/lightGallery.css" />
@endsection

@section('content')
    @if($page->layout == 0)
        @include('user.pages.individualView.layout.1')
    @endif
    @if($page->layout == 1)
        @include('user.pages.individualView.layout.2')
    @endif
    @if($page->layout == 2)
        @include('user.pages.individualView.layout.3')
    @endif
@endsection

@section('scripts')
    @if($page->layout == 0)
        @include('user.pages.individualView.layout.1-scripts')
    @endif
    @if($page->layout == 1)
        @include('user.pages.individualView.layout.2-scripts')
    @endif
    @if($page->layout == 2)
        @include('user.pages.individualView.layout.3-scripts')
    @endif
@endsection