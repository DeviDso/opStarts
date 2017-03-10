@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Group invitations</div>
                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-bordered text-center">
                            <tr>
                                <td>#</td>
                                <td>Group name</td>
                                <td>Members</td>
                                <td>Action</td>
                            </tr>
                            @foreach($invitations as $index => $invite)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>
                                        <a href="{{ route('userGroup', $invite->id) }}">
                                            {{ $invite->name }}
                                        </a>
                                    </td>
                                    <td>{{ \opStarts\UserGroups::getMembersCount($invite->id) }}</td>
                                    <td>
                                        <form method="post" action="{{ route('acceptGroupInvitation') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="group_id" value="{{ $invite->id }}">
                                            <button type="submit" class="btn btn-success">
                                                Accept
                                            </button>
                                        </form>
                                        <form method="post" action="{{ route('rejectGroupInvitation') }}">
                                            <input type="hidden" name="group_id" value="{{ $invite->id }}">
                                            <button type="submit" class="btn btn-danger">
                                                Reject
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
