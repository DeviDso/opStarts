@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ URL::route('addCategory') }}">
                            <button class="btn btn-primary">
                                Add new category
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
                        @foreach($categories as $index => $category)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    <a href="{{ URL::route('adminCategory', [$category->id]) }}">
                                        {{$category->name}} / {{ $category->name_dk }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ URL::route('deleteCategory', [$category->id]) }}" onclick="return confirm('Are you sure?')">
                                        <button class="btn btn-danger">
                                            Delete
                                        </button>
                                    </a>
                                    <a href="{{ URL::route('adminCategoryProfession', [$category->id]) }}">
                                        <button class="btn btn-success">
                                            Professions
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
