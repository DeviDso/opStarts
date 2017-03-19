<div class="container">
    <div class="row">
        <div class="col-md-12" id="single_page_view_top">
            <div id="main_info">
                <div id="logo">
                    <img src="{{ url('') }}/{{ $page->logo }}" alt="{{ $page->name }}" height="125">

                </div>
            </div>
        </div>
        <div class="col-md-12" id="single_page_view_content">
            <div class="col-md-4" id="information">
                <div id="contact_details">
                    <h1>{{ $page->name }}</h1>
                    <div class="nice_line"></div>
                    <p>{{ $page->email }}</p>
                    <p>+45 {{ $page->phone_number }}</p>
                    @if(($page->cvr_number) != '')
                        <p>CVR: {{ $page->cvr_number }}</p>
                    @endif
                    {{--<hr>--}}
                    {{--<img src="{{ url(\opStarts\User::find($page->user_id)->profile_picture) }}" height="35">--}}
                    {{--<b>{{ \opStarts\User::find($page->user_id)->name . ' ' . \opStarts\User::user($page->user_id)->name  }}</b>--}}
                </div>
                <hr>
                <div id="web_links">
                    @if(strlen($page->website) > 0)
                        <span id="website">
                                <a href="{{ $page->website }}">{{ $page->website }}</a>
                            </span>
                    @endif
                    <h4>Follow us on:</h4>
                    <div id="social">
                        @if(strlen($page->facebook) > 0)
                            <a href="#"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                        @endif
                        @if(strlen($page->google) > 0)
                            <a href="#"><i class="fa fa-google-plus-square fa-3x" aria-hidden="true"></i></a>
                        @endif
                        @if(strlen($page->linkedin) >0)
                            <a href="#"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
                        @endif
                    </div>
                        <hr>
                        <b>
                            <span>{{ $page->street }}, {{ $page->street_number }}</span>
                            <br>
                            <span>{{ $page->post_code }}, {{ \opStarts\Cities::getName($page->city) }}</span>
                            <br>
                            <span style="color: #8e130c">{{ $page->country }}</span>
                        </b>
                </div>
                <hr>
                <div id="map"></div>
            </div>
            <div class="col-md-8" id="description">
                <h2>About</h2>
                <p>
                    {!! $page->description !!}
                </p>
                <hr>
                <h2>Our services</h2>
                <ul style="list-style: none; width: 100%; float: left;">
                    @foreach($page->skills()->get() as $skill)
                        <li style="font-weight: 800; text-decoration: underline; width: 33%; float: left; display: inline;">{{ $skill->name }}</li>
                    @endforeach
                </ul>
                <div class="col-md-12">
                    <hr>
                </div>
                <h2>Gallery</h2>
                <div id="lightgallery" class="margin-bottom">
                    @foreach($gallery_items as $item)
                        <a href="{{ url($item->url) }}">
                            <img src="{{ url($item->url) }}" class="gallery_item"/>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
