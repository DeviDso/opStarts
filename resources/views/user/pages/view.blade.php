@extends('layouts.app')

@section('styles')
    <style>
        #map{
            width: 100%;
            height: 250px;
        }
        #lightgallery{
            margin-top: 35px;
        }
        .gallery_item{
            height: 120px;
            margin-top: 3px;
        }
    </style>
    <link type="text/css" rel="stylesheet" href="{{ url('') }}/gall/css/lightGallery.css" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="single_page_view_top">
                <div id="main_info">
                    <div id="logo">
                        <form action="{{ route('bybis2') }}" id="form" method="post">
                            {{ csrf_field() }}
                            <input type="file" id="upload" value="Choose a file" style="display: none;">
                            <div id="upload-demo">

                            </div>
                            <input type="hidden" id="imagebase64" name="imagebase64">
                            <a href="#" class="upload-result">Update</a> |
                            <span id="choose_new">Browse</span>
                        </form>
                        <img src="{{ url('') }}/{{ $page->logo }}" alt="{{ $page->name }}" height="125">

                    </div>
                </div>
            </div>
            <style>
                .fa-pencil-square-o{
                    font-size: 12px!important;
                }
                h1:hover:after{
                    display: block;
                    position: absolute;
                    content: '[Edit]';
                    font-size: 12px;
                    right: 25px;
                    top: 25px;
                    cursor: pointer;
                }
            </style>
            <div class="col-md-12" id="single_page_view_content">
                <div class="col-md-4" id="information">
                    <div id="contact_details">

                        <div class="info_element" style="margin-top: 25px;">
                            <h1>{{ $page->name }}</h1>
                            <div class="hidden">
                            <span>
                                <input id="name_text" value="{{ $page->name }}" style="width: 55%">
                                <button onclick="updateInfo(this)" data-link="name">Update</button>
                            </span>
                            </div>
                        </div>

                        <div class="nice_line"></div>
                        <div class="info_element">
                            <p>{{ $page->email }}</p>
                            <div class="hidden">
                                <span>
                                    <input id="email_text" value="{{ $page->email }}" style="width: 55%">
                                    <button onclick="updateInfo(this)" data-link="email">Update</button>
                                </span>
                            </div>
                        </div>
                        <div class="info_element">
                            <p>{{ $page->phone_number }}</p>
                            <div class="hidden">
                                <span>
                                    <input id="phone_text" value="{{ $page->phone_number }}" style="width: 55%">
                                    <button onclick="updateInfo(this)" data-link="phone">Update</button>
                                </span>
                            </div>
                        </div>
                        <div class="info_element">
                            <p>{{ $page->website }}</p>
                            <div class="hidden">
                                <span>
                                    <input id="website_text" value="{{ $page->website }}" style="width: 55%">
                                    <button onclick="updateInfo(this)" data-link="website">Update</button>
                                </span>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div id="web_links">
                        @if(strlen($page->facebook) > 0 || strlen($page->google) > 0 || strlen($page->linkedin) >0)
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
                        @endif
                        <h4>Find us:</h4>
                        <b>
                            @if(!isset($page->street))
                                <span>{{ $page->street }}, {{ $page->street_number }}</span>
                                <br>
                            @endif
                            <span> {{ \opStarts\Cities::getName($page->city) }}, {{ $page->post_code }}</span>
                            <br>
                            <span style="color: #8e130c">{{ $page->country }}</span>
                        </b>
                    </div>
                    <hr>
                    <div id="map"></div>
                </div>
                <div class="col-md-8" id="description" style="font-size: 16px">
                    <h2>About</h2>
                    <form id="update_description">
                        {{ csrf_field() }}
                        <div id="description_show">
                            {!! $page->description !!}
                        </div>
                        <button onclick="ble(this)" type="button">Edit</button>
                        <div id="description_input" class="hidden">
                            <textarea id="description_value" class="form-control" name="description" style="min-height: 120px; font-size: 19px">{{ $page->description }}</textarea>
                            <button type="submit">Save</button>
                        </div>
                    </form>
                    @if(count($page->skills()->get()) > 0)
                        <hr>
                        <h2>Our services</h2>
                        <ul style="list-style: none; width: 100%; float: left;">
                            @foreach($page->skills()->get() as $skill)
                                <li style="font-weight: 800; text-decoration: underline; width: 33%; float: left; display: inline;">{{ $skill->name }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if(count($gallery_items) > 0)
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <h2>Gallery</h2>
                        <div class="col-md-12">
                            <div class="dropzone" id="papa">
                                <form action="" class="dz-clickable">
                                    <div class="dz-message">Drop files here or click to upload.
                                        <br> <span class="note">(There can be <strong>more</strong> then one file at once!)</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="lightgallery" class="margin-bottom">
                            @foreach($gallery_items as $item)
                                <a href="{{ url($item->url) }}">
                                    <img src="{{ url($item->url) }}" class="gallery_item"/>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ url('js/dropzone.js') }}"></script>
    <script src="{{ url('tinymce/tinymce.min.js') }}"></script>
    <script>
        Dropzone.autoDiscover = false;
        function ble(el)
        {
            el.style.display = 'none';
            $('#description_show').hide();
            $('#description_input').removeClass('hidden');
        }
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                var form = $('#update_description');
                form.submit(function(e){
                e.preventDefault();
                console.log(form.serialize());

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '{{ route('updatePageDescription', $page->id) }}',
                    data: form.serialize(),
                    success: function(res){
                        console.log('success');
                        toastr["success"](res.message);

                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        },
                        $('#description_show').show();
                        $('#description_input').addClass('hidden');
                    },
                    error: function(err){
                        console.log('error');
                    }
                })
            });
            $('.info_element').click(function(){
                var block = $('.info_element');
                block.siblings().each(function(){
                        console.log($(this).className);
                    $(this).hasClass('updating');
                    $(this).children().first().show();
                    $(this).find('div').addClass('hidden');
                });
                $(this).addClass('updating');
                $(this).children().first().hide();
                $(this).children().first().next().removeClass('hidden');
            })

            var myDropzone = new Dropzone("div#papa", {
                url: "/pages/update/gallery/add/new/item",
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                success: function(file, response){
                    var container = document.getElementById('gallery_items_container');
                    container.innerHTML = '<input type="hidden" name="gallery[]" value="' +response+ '">';
                    console.log(response);
                }
            });
            myDropzone.on('sending', function(file, xhr, formData){
                formData.append('pageId', '{{ Route::current()->getParameter('id') }}');
            });
            Dropzone.options.myDropzone = {
                success: function(file, response){
                    alert(response);
                }
            };
        });
        tinymce.init({
            selector: 'textarea',
            height: 175,
            min_height: 175,
            statusbar: false,
            toolbar: false,
            menubar: false,
            oninit : "setPlainText",
            plugins : "paste",
            content_css: [
                '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    </script>
    <script>
        function updateInfo(element)
        {
            var name = element.getAttribute('data-link');
            var temp = '#' + name +'_text';
            console.log(temp);
            var value = $(temp).val();
            console.log(value);
            var url = '{{ route('updatePageZZ', $page->id) }}' + '/' + name;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: url,
                data: { value: value},
                success: function(res){
                    console.log(res);
                    var status = res.status.toString();
                    var text = res.message.toString();

                    (status == 'success') ? toastr["success"](text) : toastr["error"](res.message.value);

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    var temp = $('.updating');
                    $(this).removeClass('updating');
                    temp.children().first().text(value);
                    temp.children().first().show();
                    temp.children().first().next().addClass('hidden');
                },
                error: function(err){
                    console.log('err');
                    console.log(err.message);
                },
                dataType: 'json'
            })
        }


        function updateEmail() {
            var text = document.getElementById('mm').value;

            var atpos = text.indexOf("@");
            var dotpos = text.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=text.length) {
                var text = document.getElementById('mm').value;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '{{ route('updatePageDescription', $page->id) }}',
                    data: { email: text},
                    success: function(res){
                        console.log(res);
                        toastr["success"]("City address is missing!", "Error");

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-bottom-right",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    },
                    fail: function(err){
                        console.log(err);
                    },
                    dataType: 'string'
                });
            }

        }
    </script>
    @if($page->layout == 0)
        @include('user.pages.pageView.layout.1-scripts')
    @endif
    @if($page->layout == 1)
        @include('user.pages.pageView.layout.2-scripts')
    @endif
    @if($page->layout == 2)
        @include('user.pages.pageView.layout.3-scripts')
    @endif
@endsection