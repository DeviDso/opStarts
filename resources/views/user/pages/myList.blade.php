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
            border: solid 2px #8e130c;
            color: black;
            font-size: 16px;
            margin-top: 3px;
            -webkit-transition: all 0.3S;
            -moz-transition: all 0.3S;
            -ms-transition: all 0.3S;
            -o-transition: all 0.3S;
            transition: all 0.3S;
        }
        .page a:hover{
            background: rgba(142, 19, 12, 0.87);
            color: white;
            text-decoration: none;
            -webkit-transition: all 0.3S;
            -moz-transition: all 0.3S;
            -ms-transition: all 0.3S;
            -o-transition: all 0.3S;
            transition: all 0.3S;
        }
        .delete-link{
            background: #8e130c;
            color: white!important;
        }
        .active{
            color: green;
            font-size: 18px;
        }
        h2{
            color: #8e130c;
        }
        .activate-page {
            background: #28d028;
            color: white!important;
            border-color: #28d028!important;
            -webkit-transition: all 0.3S;
            -moz-transition: all 0.3S;
            -ms-transition: all 0.3S;
            -o-transition: all 0.3S;
            transition: all 0.3S;
        }
        .activate-page:hover{
            background: white!important;
            color: #28d028!important;
            -webkit-transition: all 0.3S;
            -moz-transition: all 0.3S;
            -ms-transition: all 0.3S;
            -o-transition: all 0.3S;
            transition: all 0.3S;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-md-3" id="pages_choice">
                            <div class="col-md-12">
                                <label style="background: #8e130c; padding: 7px; color: white">Information</label>
                                <p style="box-shadow: 0px -2px 2px 2px #8e130c;padding: 10px;">
                                    <b>Page statistics</b>
                                    <br>
                                    -
                                    <br>
                                    <b>Views this month: </b> 217
                                    <br>
                                    <b>Views last month: </b> 249
                                    <br>
                                    <b>Total views: </b> 2477
                                    <br><br>
                                    <b>Total reviews: </b> 21
                                    <br>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-9">
                            @if(count($pages) == 0)
                                <h2>There are no pages created!</h2>
                            @endif
                            @foreach($pages as $page)
                                <div class="page col-md-12 no-padding">
                                    <div class="col-md-3 no-padding">
                                        <img src="{{ url($page->logo) }}" width="100%">
                                    </div>
                                    <div class="col-md-6">
                                        <h2>{{ $page->name }}</h2>
                                        <h5>{{ \opStarts\Categories::name($page->category_id) }}</h5>

                                        <b>Email</b>: {{ $page->email }}
                                        <br>
                                        <b>Phone</b>: {{ $page->phone_number }}
                                        <br>
                                        <b>Address</b>: {{ $page->address }}
                                    </div>
                                    <div class="col-md-3 text-center">
                                        @if($page->status)
                                            <span class="active">Active</span>
                                        @else
                                            <span class="inactive">Inactive</span>
                                            <a href="{{ route('changePageStatus', $page->id) }}" class="activate-page">
                                                Publish
                                            </a>
                                        @endif
                                        <br>
                                        <a href="{{ route('myPage', $page->id) }}">Edit</a>
                                        <br>
                                        <a class="delete-link" href="{{ route('myPage', $page->id) }}">Delete</a>
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
    <script>
        $(document).ready(function(){
            console.log({{ session('toast') }});
            if('{{ session('toast') }}')
            {
                toastr["error"]("You must fill all fields to activate page!", "Error");

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
            }
        });
    </script>
@endsection