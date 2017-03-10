<div class="row no-margin">
    <div id="single_page_view_top_2"></div>
    <div class="container">
        <div class="col-md-12" id="single_page_view_2_head">
            <div class="col-md-3">
                <h4>{{ $page->email }}</h4>
                <h4>{{ $page->phone_number }}</h4>
                <h4>{{ $page->cvr_number }}</h4>
                {{--<h5><i class="fa fa-map-marker" aria-hidden="true"></i></h5>--}}
                <div class="nice_line"></div>
                <h5 style="margin-top: 25px;">{{ $page->street }} {{ $page->number }},</h5>
                <h5>{{ \opStarts\Cities::getName($page->city) }}, {{ $page->post_code }}</h5>
                <h5>{{ $page->country }}</h5>
            </div>
            <div class="col-md-offset-1 col-md-4" style="text-align: center;">
                <img src="{{ url('') }}/{{ $page->logo }}" alt="{{ $page->company_name }}" height="175">
            </div>
            <div class="col-md-3 col-md-offset-1" style="text-align: right;">
                <h1>{{ $page->company_name }}</h1>
                <div class="nice_line"></div>
                <h2>{{ \opStarts\Categories::name($page->category_id) }}</h2>
                <span>
                    <a href="{{ $page->website }}">{{ $page->website }}</a>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-12" id="single_page_view_content_2">
        <div class="container">
            <div class="col-md-12" style="margin-top: 45px;">
                <div class="col-md-3">
                    <h3>About us</h3>
                </div>
                <div class="col-md-9">
                    {!! $page->description !!}
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 15px;">
                <div class="col-md-3">
                    <h3>Services</h3>
                </div>
                <div class="col-md-9">
                    @foreach($page->skills()->get() as $skill)
                        <span class="skill">{{ $skill->name }}</span>
                    @endforeach
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3">
                    <h3>Follow us on</h3>
                </div>
                <div class="col-md-9" id="social">
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
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 45px;">
                <div class="col-md-3">
                    <h3>Find us</h3>
                </div>
                <div class="col-md-9">
                    <div id="map"></div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 15px;">
                <div class="col-md-3">
                    <h3>Gallery</h3>
                </div>
                <div class="col-md-9">
                    <div id="lightgallery" class="margin-bottom" style="text-align: center;">
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
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>