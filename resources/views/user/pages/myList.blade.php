@extends('layouts.app')

@section('content')
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
                                <hr>
                                <i class="fa fa-list-alt fa-5x opt_active" aria-hidden="true"></i> <h4>My pages</h4>
                                {{--<hr>--}}
                                {{--<i class="fa fa-bar-chart fa-5x" aria-hidden="true"></i> <h4>Page statistics</h4>--}}
                                {{--<hr>--}}
                                {{--<i class="fa fa-globe fa-5x" aria-hidden="true"></i> <h4>Discover</h4>--}}
                            </div>
                        </div>
                        <div class="col-md-9">
                            @if(count($pages) == 0)
                                <h2>There are no pages created!</h2>
                            @endif
                            @foreach($pages as $page)
                                <div class="page-card">
                                    <div class="photo">
                                        <img src="{{ url('') }}/{{ $page->logo }}" height="100%">
                                    </div>
                                    <ul class="details">
                                        <li class="date">Created: {{ substr($page->created_at, 0, 10) }}</li>
                                        <li class="tags">
                                            <ul>
                                                @if($page->skills()->count() == 0)
                                                    <li><a href="{{ route('editCompanyPage', $page->id) }}">Add skills</a></li>
                                                @endif
                                                @foreach($page->skills()->get() as $index => $skill)
                                                    @if($index != 10)
                                                        <li><a href="#">{{ $skill->name }}</a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="description">
                                        <h1>{{ $page->company_name }}</h1>
                                        <h2>{{ \opStarts\Categories::name($page->category_id) }}</h2>
                                        @if($page->status)
                                            <span class="active">Active</span>
                                        @else
                                            <span class="inactive">Inactive</span>
                                            <a href="{{ route('changePageStatus', $page->id) }}">
                                                Publish
                                            </a>
                                        @endif
                                        <p class="summary">
                                            Email: {{ $page->email }}
                                            <br>
                                            Phone: {{ $page->phone_number }}
                                        </p>
                                        @if($page->type == 0)
                                            <a href="{{ route('editIndividualPage', $page->id) }}">Edit</a>
                                        @else
                                            <a href="{{ route('editCompanyPage', $page->id) }}">Edit</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
