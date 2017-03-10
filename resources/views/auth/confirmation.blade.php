@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 min-height-760">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/confirmation') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('confirm') ? ' has-error' : '' }}">
                                <label for="confirm" class="col-md-4 control-label">Confirmation code:</label>

                                <div class="col-md-6">
                                    <input id="confirm" type="text" class="form-control" name="confirm" value="{{ old('confirm') }}" placeholder="Your received code" autofocus>

                                    @if ($errors->has('confirm'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('confirm') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="actionButton">
                                        Activate account
                                    </button>
                                </div>
                            </div>
                        </form>
                            <form action="{{ url('/resend-confirmation') }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="actionButton">
                                    Resend code
                                </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
