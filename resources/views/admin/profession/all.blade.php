@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ URL::route('addProfession') }}">
                            <button class="btn btn-primary">
                                Add new profession
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
                        @foreach($professions as $index => $profession)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    <a href="{{ URL::route('adminProfession', [$profession->id]) }}">
                                        {{$profession->name}} / {{ $profession->name_dk }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ URL::route('deleteProfession', [$profession->id]) }}" onclick="return confirm('Are you sure?')">
                                        <button class="btn btn-danger">
                                            Delete
                                        </button>
                                    </a>
                                    <a href="{{ URL::route('adminProfessionService', [$profession->id]) }}">
                                        <button class="btn btn-success">
                                            Services
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
