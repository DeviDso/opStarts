@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Assign professions - {{ $profession->name . '/' . $profession->name_dk }}
                    </div>
                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-info">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('postProfessionService', [$profession->id]) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Professions</label>
                                <div class="col-md-6">
                                    @foreach($services as $service)
                                        <input type="checkbox" name="services[]" value="{{ $service->id }}" {{ (opStarts\Profession::hasService($profession->id, $service->id)) ? 'checked' : '' }}>{{ $service->name }}<br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
