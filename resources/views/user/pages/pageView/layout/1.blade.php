<div class="container">
    <div class="row">
        <div class="col-md-12" id="single_page_view_top">
            <div id="main_info">
                <div id="logo">
                    <div class="col-md-5">
                        <img src="{{ url('') }}/{{ $page->logo }}" alt="{{ $page->name }}" height="125">
                    </div>
                    <div class="col-md-7">
{{--                        <h1>{{ $page->company_name }}</h1>--}}
                        <h2>{{ \opStarts\Categories::name($page->category_id) }}</h2>
                        <div class="col-md-12">
                            <div class="nice_line"></div>
                        </div>
                        <h3> {{ $page->email }}</h3>
                        <h3>{{ $page->phone_number }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" id="single_page_view_content">
            <div class="col-md-4" id="information">
                <div id="contact_details">
                    <h1>{{ $page->name }}</h1>
                    <div class="nice_line"></div>
                    <p>{{ $page->email }}</p>
                    <p>{{ $page->phone_number }}</p>
                    @if(count($page->cvr_number) > 0)
                        <p>CVR: {{ $page->cvr_number }}</p>
                    @endif
                    <hr>
                    <span>{{ $page->street }}, {{ $page->street_number }}</span>
                    <br>
                    <span>{{ $page->city }}, {{ $page->post_code }}</span>
                    <br>
                    <span>{{ $page->country }}</span>
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
                    <span class="col-md-12" style="margin-top: 15px; margin-bottom: 25px;">
                        @foreach($page->skills()->get() as $skill)
                            <div class="skill">{{ $skill->name }}</div>
                        @endforeach
                    </span>
                <div class="col-md-12">
                    <hr>
                </div>
                <h2>Gallery</h2>
                <div id="lightgallery" class="margin-bottom">
                    <a href="{{ url('') }}/portfolio/1.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-1.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/2.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-2.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/1.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-1.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/2.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-2.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/1.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-1.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/2.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-2.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/1.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-1.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/2.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-2.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/1.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-1.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/2.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-2.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/1.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-1.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/2.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-2.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/1.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-1.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/2.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-2.jpg" class="gallery_item"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>