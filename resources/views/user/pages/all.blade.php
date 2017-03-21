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
            box-shadow: 1px 4px 4px 0px #8e130c;
            background: #8e130c;
            color: white!important;
            margin-top: 45px;
            font-size: 32px;
        }
        .page a:hover{
            background: rgba(142, 19, 12, 0.87);
            color: white;
            text-decoration: none;
        }
    </style>
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
                            <select name="city" id="city" onchange="openCity()" style="font-size: 12px;">
                                    <option value="all">All</option>
                                @foreach(\opStarts\Categories::getCities($category->id) as $oneCity)
                                    @if(isset($city))
                                        <option value="{{ $oneCity->slug }}"{{ ($city->slug == $oneCity->slug) ? 'selected' : '' }}>{{ $oneCity->name }}</option>
                                    @else
                                        <option value="{{ $oneCity->slug }}">{{ $oneCity->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-9" id="list_of_pages">
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
                                    <ul style="list-style-type: none; width: 100%; float: left">
                                        @foreach(\opStarts\Categories::getSkills($category->id, (isset($city->id)) ? $city->id : NULL) as $skill)
                                            @if(Request::route()->getName() == 'categoryCity')
                                                <li style="display: inline; width:  24%">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="{{ route('categoryCitySkill', [$category->slug, $city->slug, \opStarts\Skills::getSkill($skill)->slug]) }}">
                                                        {{ \opStarts\Skills::getSkill($skill)->name }}
                                                    </a>
                                                </li>
                                            @elseif(Request::route()->getName() == 'category')
                                                <li style="display: inline; width:  24%; float: left;">
                                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="{{ route('categorySkill', [$category->slug, \opStarts\Skills::getSkill($skill)->slug]) }}">
                                                        {{ \opStarts\Skills::getSkill($skill)->name }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
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
                            @foreach($pages as $page)
                                <div class="page col-md-12 no-padding">
                                    <div class="col-md-3">
                                        <img src="{{ url($page->logo) }}" width="175" style="padding: 25px!important;">
                                    </div>
                                    <div class="col-md-6">
                                        <div id="owner_bottom">

                                        </div>
                                        <h2>{{ substr($page->name, 0, 18) }}</h2>
                                        <h5 style="color: #8e130c; font-weight: 800;">{{ \opStarts\Categories::name($page->category_id) }}</h5>
                                        <p style="font-style: italic;     line-height: 14px; color: rgba(128, 128, 128, 0.84)">{{ substr($page->description, 0, 120) }}...</p>
                                        <i class="fa fa-map-marker" aria-hidden="true" style="color: #8e130c"></i> {{ \opStarts\Cities::getName($page->city) . ', ' . $page->country }}
                                        <br>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <img src="{{ url(\opStarts\User::getProfilePicture($page->user_id)) }}" height="25" style="border-radius: 5px">
                                        <b>{{ \opStarts\User::getFullName($page->user_id) }}</b>
                                        <small style="color: #258c32; font-weight: 600;">Verified user</small>
                                        <a href="{{ route('viewPage', [\opStarts\Categories::getSlug($category->id), \opStarts\Cities::getSlug($page->city), $page->slug, $page->id]) }}">Visit</a>
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