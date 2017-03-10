@extends('layouts.app')

@section('content')
    @if(Auth::guest())
        <div class="row no-margin">
            <div id="welcome_image">
                <div class="container">
                    <div id="welcome_text">
                        <h1>Lorem Ipsum is simply dummy text ...</h1>
                        <h2>Lorem Ipsum is simply dummy text...</h2>
                        <h3>Lorem Ipsum is simply dummy text </h3>
                        <h4>Lorem Ipsum is simply dummy text </h4>
                    </div>
                </div>
            </div>
        </div>
    @endif
        <div class="row no-margin">
            <div id="welcome_services">
                <div class="container">
                    <h2>Find your local service provider</h2>
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ url($category->slug) }}">
                                    {!! $category->icon !!} {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @if(Auth::guest())
        {{--<div class="row no-margin">--}}
            {{--<div id="welcome_groups">--}}
                {{--<div class="container">--}}
                    {{--<h2>People groups for innovation</h2>--}}
                    {{--<ul>--}}
                        {{--<li>--}}
                            {{--<i class="fa fa-user-plus" aria-hidden="true"></i>--}}
                            {{--<br>--}}
                            {{--<h4>Looking for extra members</h4>--}}
                            {{--<hr>--}}
                            {{--<p>--}}
                                {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.--}}
                            {{--</p>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<i class="fa fa-suitcase" aria-hidden="true"></i>--}}
                            {{--<br>--}}
                            {{--<h4>Wants to be hired</h4>--}}
                            {{--<hr>--}}
                            {{--<p>--}}
                                {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.--}}
                            {{--</p>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<i class="fa fa-money" aria-hidden="true"></i>--}}
                            {{--<br>--}}
                            {{--<h4>Asking for funding</h4>--}}
                            {{--<hr>--}}
                            {{--<p>--}}
                                {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.--}}
                            {{--</p>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div class="text-center">--}}
                        {{--<p class="margin-top padding-sides">--}}
                            {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.--}}
                        {{--</p>--}}
                        {{--<button class="moreButton">--}}
                            {{--Create group--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row no-margin">
            <div id="welcome_create">
                <div class="container">
                    <b>Set up our own service page!</b>
                    <button id="create">Create page</button>
                </div>
            </div>
        </div>
    @endif
@endsection
