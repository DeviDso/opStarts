@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ URL::route('addService') }}">
                            <button class="btn btn-primary">
                                Add new service
                            </button>
                        </a>
                    </div>
                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-info">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                        @foreach($services as $index => $service)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    <a href="{{ URL::route('adminService', [$service->id]) }}">
                                        {{$service->name}} / {{ $service->name_dk }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ URL::route('deleteService', [$service->id]) }}" onclick="return confirm('Are you sure?')">
                                        <button class="btn btn-danger">
                                            Delete
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
