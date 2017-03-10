<div class="container">
    <div class="row">
        <div class="col-md-12" id="single_page_view_top">
            <div id="main_info">
                <div id="logo">
                    <div class="col-md-6">
                        <img src="{{ url('') }}/{{ $page->logo }}" alt="{{ $page->name }}" height="125">
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $page->name }}</h1>
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
                <div id="map"></div>
                <div id="contact_details">
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> {{ $page->email }}</p>
                    <p><i class="fa fa-mobile" aria-hidden="true"></i> {{ $page->phone_number }}</p>
                </div>
                <hr>
                <div id="web_links">
                    @if(strlen($page->website) > 0)
                        <span id="website">
                                <a href="{{ $page->website }}">{{ $page->website }}</a>
                            </span>
                    @endif
                    <h4>Follow me on:</h4>
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
            </div>
            <div class="col-md-8" id="description">
                <h2>About</h2>
                <p>
                    {!! $page->description !!}
                </p>
                <hr>
                <h2>I can help you with...</h2>
                    <span class="col-md-12" style="margin-top: 15px; margin-bottom: 25px;">
                        @foreach($page->skills()->get() as $skill)
                            <div class="skill">{{ $skill->name }}</div>
                        @endforeach
                    </span>
                <hr>
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