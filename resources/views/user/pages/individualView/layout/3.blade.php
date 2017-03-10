<div class="row no-margin">
    <div id="single_page_view_top_2"></div>
    <div class="container">
        <div class="col-md-12" id="single_page_view_head">
            <div class="col-md-4">
                <h4>{{ $page->email }}</h4>
                <h4>{{ $page->phone_number }}</h4>
            </div>
            <div class="col-md-4" style="text-align: center;">
                <img src="{{ url('') }}/{{ $page->logo }}" alt="{{ $page->name }}">
            </div>
            <div class="col-md-4" style="text-align: right;">
                <h1>{{ $page->name }}</h1>
                <h2>{{ \opStarts\Categories::name($page->category_id) }}</h2>
                <h3>{{ \opStarts\Cities::getName($page->city) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-12" id="single_page_view_content_2">
        <div class="container">
            <div class="col-md-12" style="margin-top: 45px;">
                <div class="col-md-3">
                    <h3>About me</h3>
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
                    <h3>My Services</h3>
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
            <div class="col-md-12" style="margin-top: 45px;">
                <div class="col-md-3">
                    <h3>Find me</h3>
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