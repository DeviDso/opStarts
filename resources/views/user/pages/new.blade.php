@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row min-height-760">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4 class="text-center">Create your page</h4>

                        <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('postPage') }}" id="create_page_form">
                            {{ csrf_field() }}

                            <div id="rest">
                                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                    <label for="category" class="col-md-4 control-label">Category</label>

                                    <div class="col-md-6">
                                        <select id="category" name="category">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('category') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label" id="page_name_type">Name</label>

                                    <div class="col-md-6">
                                        <input type="text" name="name" id="name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="actionButton">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function company(){
            var input = document.getElementById('page_type_company').checked = true;
            var companyImage = document.getElementById('create_company_page');
            var privateImage = document.getElementById('create_private_page');

            var pageNameType = document.getElementById('page_name_type');
            pageNameType.innerHTML = 'Company name';

            companyImage.style.filter = 'grayscale(0)';
            privateImage.style.filter = 'grayscale(100%)';

            $('#rest').show();
            $('#company').show();
        }

        function individual(){
            var input = document.getElementById('page_type_individual').checked = true;
            var companyImage = document.getElementById('create_company_page');
            var privateImage = document.getElementById('create_private_page');

            var pageNameType = document.getElementById('page_name_type');
            pageNameType.innerHTML = 'Page name';

            companyImage.style.filter = 'grayscale(100%)';
            privateImage.style.filter = 'grayscale(0)';

            $('#rest').show();
            $('#company').hide();
        }
    </script>
@endsection