@if(Request::route()->getName() != 'home' && Request::path() != 'login' && Request::path() != 'register' && Request::route()->getName() != 'myIndividualPage' && Request::route()->getName() != 'myCompanyPage' && Request::route()->getName() != 'profile' && Request::route()->getName() != 'myPage')
    @if(Auth::check())
        <div id="breadcrumbs" class="container" style="margin-top: 35px">
    @else
        <div id="breadcrumbs" class="container" style="margin-top: 65px">
    @endif
        @if(Request::route()->getName() == 'category')
            <a href="{{ route('home') }}">Home</a> <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <b>{{ $category->name }}</b>
        @elseif(Request::route()->getName() == 'categoryCity')
            <a href="{{ route('home') }}">Home</a> <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>  <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a> <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <b>{{ $city->name }}</b>
        @elseif(Request::route()->getName() == 'categorySkill')
            <a href="{{ route('home') }}">Home</a> <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a> <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <b>{{ $skill->name }}</b>
        @elseif(Request::route()->getName() == 'categoryCitySkill')
            <a href="{{ route('home') }}">Home</a> <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a> <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <a href="{{ route('categoryCity', [$category->slug, $city->slug]) }}">{{ $city->name }}</a> <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <b>{{ $skill->name }}</b>
        @elseif(Request::route()->getName() == 'viewPage')
            <a href="{{ route('home') }}">Home</a> <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a> <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <a href="{{ route('categoryCity', [$category->slug, $city->slug]) }}">{{ $city->name }}</a> <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span> <b>{{ $page->name }}</b>
        @endif
    </div>
@endif