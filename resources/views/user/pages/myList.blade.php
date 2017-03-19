@extends('layouts.app')

@section('content')
    <style>
        .page{
            box-shadow: 0 3px 7px -3px rgba(0, 0, 0, 0.3);
            margin-top: 15px;
        }
        .page:hover{
            box-shadow: 0 3px 7px -3px #8e130c;
        }
        .page a{
            text-transform: uppercase;
            width: 75%;
            display: block;
            margin: auto;
            border: solid 2px #8e130c;
            color: black;
            font-size: 16px;
            margin-top: 3px;
        }
        .page a:hover{
            background: rgba(142, 19, 12, 0.87);
            color: white;
            text-decoration: none;
        }
        .delete-link{
            background: #8e130c;
            color: white!important;
        }
        .active{
            color: green;
            font-size: 18px;
        }
        h2{
            color: #8e130c;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-md-3" id="pages_choice">
                            <div class="col-md-12 text-center">
                                <a href="{{ route('newPage') }}" class="page_opt">
                                    <i class="fa fa-rocket fa-5x" aria-hidden="true"></i> <h4>Create new page</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            @if(count($pages) == 0)
                                <h2>There are no pages created!</h2>
                            @endif
                            @foreach($pages as $page)
                                <div class="page col-md-12 no-padding">
                                    <div class="col-md-3 no-padding">
                                        <img src="{{ url($page->logo) }}" width="100%">
                                    </div>
                                    <div class="col-md-6">
                                        <h2>{{ $page->name }}</h2>
                                        <h5>{{ \opStarts\Categories::name($page->category_id) }}</h5>

                                        <b>Email</b>: {{ $page->email }}
                                        <br>
                                        <b>Phone</b>: {{ $page->phone_number }}
                                        <br>
                                        <b>Address</b>: {{ $page->address }}
                                    </div>
                                    <div class="col-md-3 text-center">
                                        @if($page->status)
                                            <span class="active">Active</span>
                                        @else
                                            <span class="inactive">Inactive</span>
                                            <a href="{{ route('changePageStatus', $page->id) }}">
                                                Publish
                                            </a>
                                        @endif
                                        <br>
                                        <a href="{{ route('myPage', $page->id) }}">Edit</a>
                                        <br>
                                        <a class="delete-link" href="{{ route('myPage', $page->id) }}">Delete</a>
                                    </div>
                                </div>
                                {{--<div class="page-card">--}}
                                    {{--<div class="photo">--}}
                                        {{--<img src="{{ url('') }}/{{ $page->logo }}" height="100%">--}}
                                    {{--</div>--}}
                                    {{--<ul class="details">--}}
                                        {{--<li class="date">Created: {{ substr($page->created_at, 0, 10) }}</li>--}}
                                        {{--<li class="tags">--}}
                                            {{--<ul>--}}
                                                {{--@if($page->skills()->count() == 0)--}}
                                                    {{--<li><a href="{{ route('editCompanyPage', $page->id) }}">Add skills</a></li>--}}
                                                {{--@endif--}}
                                                {{--@foreach($page->skills()->get() as $index => $skill)--}}
                                                    {{--@if($index != 10)--}}
                                                        {{--<li><a href="#">{{ $skill->name }}</a></li>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--<div class="description">--}}
                                        {{--<h1>{{ $page->company_name }}</h1>--}}
                                        {{--<h2>{{ \opStarts\Categories::name($page->category_id) }}</h2>--}}
                                        {{--@if($page->status)--}}
                                            {{--<span class="active">Active</span>--}}
                                        {{--@else--}}
                                            {{--<span class="inactive">Inactive</span>--}}
                                            {{--<a href="{{ route('changePageStatus', $page->id) }}">--}}
                                                {{--Publish--}}
                                            {{--</a>--}}
                                        {{--@endif--}}
                                        {{--<p class="summary">--}}
                                            {{--Email: {{ $page->email }}--}}
                                            {{--<br>--}}
                                            {{--Phone: {{ $page->phone_number }}--}}
                                        {{--</p>--}}
                                            {{--<a href="{{ route('myPage', $page->id) }}">Edit</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
