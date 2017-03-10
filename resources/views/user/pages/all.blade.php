@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default min-height-760">
                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-md-3" id="pages_filter">
                            <h3>City</h3>
                            <br>
                            <select name="city" id="city" onchange="openCity()">
                                    <option value="all">All</option>
                                @foreach(\opStarts\Categories::getCities($category->id) as $oneCity)
                                    @if(isset($city))
                                        <option value="{{ $oneCity->slug }}"{{ ($city->slug == $oneCity->slug) ? 'selected' : '' }}>{{ $oneCity->name }}</option>
                                    @else
                                        <option value="{{ $oneCity->slug }}">{{ $oneCity->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <hr>
                            <div id="all_pages_services">
                                @if(isset($skill))
                                    <h3>{{ $skill->name }}</h3>
                                    <hr>
                                    <h4>Suggested services</h4>
                                    @foreach(\opStarts\Skills::getSuggestedSkill($skill->id) as $service)
                                        <table>
                                            <tr>
                                                <td>
                                                    @if(Request::route()->getName() == 'categoryCitySkill')
                                                        <a href="{{ route('categoryCitySkill', [$category->slug, $city->slug, $service->slug]) }}">
                                                            {{ $service->name }}
                                                        </a>
                                                    @elseif(Request::route()->getName() == 'categorySkill')
                                                        <a href="{{ route('categorySkill', [$category->slug, $service->slug]) }}">
                                                            {{ $service->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    @endforeach
                                @else
                                    <h3>Services</h3>
                                    <br>
                                    <table>
                                        @foreach(\opStarts\Categories::getSkills($category->id, (isset($city->id)) ? $city->id : NULL) as $skill)
                                            <tr>
                                                <td>
                                                    @if(Request::route()->getName() == 'categoryCity')
                                                        <a href="{{ route('categoryCitySkill', [$category->slug, $city->slug, \opStarts\Skills::getSkill($skill)->slug]) }}">
                                                            {{ \opStarts\Skills::getSkill($skill)->name }}
                                                        </a>
                                                    @elseif(Request::route()->getName() == 'category')
                                                        <a href="{{ route('categorySkill', [$category->slug, \opStarts\Skills::getSkill($skill)->slug]) }}">
                                                            {{ \opStarts\Skills::getSkill($skill)->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-9" id="list_of_pages">
                            <div class="page_mobile">
                                @foreach($pages as $page)
                                    <div class="col-xs-12 mobile-card">
                                        <div class="col-xs-6 mobile-card-top">
                                            <img src="{{ url($page->logo) }}" width="100%">
                                        </div>
                                        <div class="col-xs-6 mobile-card-middle">
                                            <h2>{{ $page->name }}</h2>
                                            <h4>{{ \opStarts\Cities::getName($page->city) }}</h4>
                                            <p>
                                                {{ (strlen(strip_tags($page->description)) > 149) ? substr(strip_tags($page->description), 0, 150) . '...' : strip_tags($page->description)}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="page">
                                @foreach($pages as $page)
                                    <a href="{{ route('viewPage', [\opStarts\Categories::getSlug($category->id), \opStarts\Cities::getSlug($page->city), $page->slug, $page->id]) }}">
                                    <div class="single-page-card">
                                        <div class="photo">
                                            <img src="{{ url($page->logo) }}" height="100%">
                                        </div>
                                        <div class="description">
                                            <h1>{{ $page->name }}</h1>
                                            <h2>{{ \opStarts\Categories::name($page->category_id) }}</h2>
                                            <p class="summary">
                                                {{ (strlen(strip_tags($page->description)) > 149) ? substr(strip_tags($page->description), 0, 150) . '...' : strip_tags($page->description)}}
                                            </p>
                                            <span class="contacts">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i> {{ \opStarts\Cities::getName($page->city) }}
                                            {{--<i class="fa fa-envelope" aria-hidden="true"></i> {{ $page->email }} | <i class="fa fa-phone-square" aria-hidden="true"></i> {{ $page->phone_number }}--}}
                                            </span>
                                        </div>
                                    </div>
                                        </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('js/ias.js') }}"></script>
    <script>
        function openCity(){
            var selectOption = document.getElementById("city").value;
            var currentRouteName = '{{ Request::route()->getName() }}';

            switch(currentRouteName){
                case 'categoryCity':
                    if(selectOption != 'all')
                    {
                        window.open("{{ url('') }}/{{ $category->slug }}/" +selectOption, "_self");
                    }
                    else
                    {
                        window.open("{{ url('') }}/{{ $category->slug }}", "_self");
                    }
                    break;
                case 'category':
                    if(selectOption != 'all')
                    {
                        window.open("{{ url('') }}/{{ $category->slug }}/" +selectOption, "_self");
                    }
                    else
                    {
                        window.open("{{ url('') }}/{{ $category->slug }}", "_self");
                    }
                    break;
                case 'categorySkill':
                    var skill = '{{ Request::route()->getParameter('skill') }}';
                    window.open("{{ url('') }}/{{ $category->slug }}/" +selectOption + "/" +skill, "_self");
                    break;
                case 'categoryCitySkill':
                    if(selectOption != 'all')
                    {
                        var skill = '{{ Request::route()->getParameter('skill') }}';
                        window.open("{{ url('') }}/{{ $category->slug }}/" +selectOption+ "/" +skill, "_self");
                    }
                    else
                    {
                        var skill = '{{ Request::route()->getParameter('skill') }}';
                        window.open("{{ url('') }}/{{ $category->slug }}/service/" +skill, "_self");
                    }
                    break;
            }
        }
    </script>
@endsection