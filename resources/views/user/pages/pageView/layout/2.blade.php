<div class="row no-margin">
    <div id="single_page_view_top_1"></div>
    <div class="container margin-top-175">
        <div class="col-md-12 padding-bottom margin-bottom" id="single_page_view_content_1">
            <div id="top">
                <div class="col-md-2">
                    <img src="{{ url('') }}/{{ $page->logo }}" alt="{{ $page->name }}" style="padding: 7px" height="175">
                </div>
                <div class="col-md-5 col-md-offset-1" id="about">
                    <h1>{{ $page->name }}</h1>
                    <h2> - {{ \opStarts\Categories::name($page->category_id) }}</h2>
                    <div class="nice_line"></div>
                    <h3>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <br>
                        {{ $page->street }} {{ $page->number }},
                        <br>
                        {{ \opStarts\Cities::getName($page->city) }}, {{ $page->post_code }}
                        <br>
                        {{ $page->country }}
                    </h3>
                </div>
                <div class="col-md-4" id="contact">
                    <h4>{{ $page->email }} <i class="fa fa-envelope" aria-hidden="true"></i></h4>
                    <h4>{{ $page->phone_number }} <i class="fa fa-phone-square" aria-hidden="true"></i></h4>
                    <h4>CVR: {{ $page->cvr_number }} <i class="fa fa-university" aria-hidden="true"></i></h4>
                    <h4><a href="{{ $page->website }}">{{ $page->website }}</a> <i class="fa fa-globe" aria-hidden="true"></i></h4>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
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
                    <a href="{{ url('') }}/portfolio/1.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-1.jpg" class="gallery_item"/>
                    </a>
                    <a href="{{ url('') }}/portfolio/2.jpg">
                        <img src="{{ url('') }}/portfolio/thumb-2.jpg" class="gallery_item"/>
                    </a>
                </div>
                <hr>
                <div class="col-md-3">
                    <h3>About us</h3>
                </div>
                <div class="col-md-9" style="margin-top: 45px">
                    {!! $page->description !!}
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
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
                <div class="col-md-3">
                    <h3>Find us</h3>
                </div>
                <div class="col-md-9">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>