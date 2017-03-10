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
                        <div class="col-md-3">
                            <h3>City</h3>
                            <table>
                                <tr>
                                    @foreach(\opStarts\Categories::getCities($category->id) as $city)
                                        <td><input type="checkbox" name="{{ $city->id }}"></td>
                                        <td>{{ $city->name }}</td>
                                    @endforeach
                                </tr>
                            </table>
                            <hr>
                            <h3>Services</h3>
                            <table>
                                @foreach(\opStarts\Categories::getSkills($category->id) as $skill)
                                    <tr>
                                        <td><input type="checkbox" name="{{ $skill }}"></td>
                                        <td>{{ \opStarts\Skills::getSkill($skill)->name }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="col-md-9" id="list_of_pages">
                            <div class="page">
                                @foreach($pages as $page)
                                    <a href="{{ route('viewPage', [\opStarts\Categories::getSlug($category->id), \opStarts\Cities::getSlug($page->city), $page->slug, $page->id]) }}">
                                        <div class="single-page-card">
                                            <div class="photo">
                                                <img src="{{ url('') }}/{{ $page->logo }}" height="100%">
                                            </div>
                                            <div class="description">
                                                @if($page->individual)
                                                    <h1>{{ $page->name }}</h1>
                                                @else
                                                    <h1>{{ $page->company_name }}</h1>
                                                @endif
                                                <h2>{{ \opStarts\Categories::name($page->category_id) }}</h2>
                                                <p class="summary">
                                                    {{ (strlen(strip_tags($page->description)) > 149) ? substr(strip_tags($page->description), 0, 150) . '...' : strip_tags($page->description)}}
                                                </p>
                                            <span class="contacts">
                                            <i class="fa fa-envelope" aria-hidden="true"></i> {{ $page->email }} | <i class="fa fa-phone-square" aria-hidden="true"></i> {{ $page->phone_number }}
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
        $(document).ready(function(){
            var ias = jQuery.ias({
                container:  '#list_of_pages',
                item:       '.page',
                pagination: '#pagination',
                next:       '.next'
            });
            ias.extension(new IASSpinnerExtension());
        });
    </script>
@endsection