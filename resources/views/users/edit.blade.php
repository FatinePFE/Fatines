

@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

                <div class="pull-left">
                    <h4 class="mt-5 mb-5">Profile</h4>
                </div>

        </div>


       <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    <span class="glyphicon glyphicon-ok"></span>
                    {!! session('success_message') !!}

                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            @endif



            <form method="POST" action="{{route('users.update', $user)}}">
                {{ csrf_field() }}
                {{ method_field('patch') }}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Name</label>
                    <div class="col-md-10">
                        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-md-2 control-label">Email</label>
                    <div class="col-md-10">
                        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($user)->email) }}" minlength="1" maxlength="255" placeholder="Enter email here..." disabled>
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone" class="col-md-2 control-label">Phone</label>
                    <div class="col-md-10">
                        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($user)->phone) }}" minlength="1" maxlength="255" placeholder="Enter phone here...">
                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>


                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password" class="col-md-2 control-label">Password</label>
                    <div class="col-md-10">
                        <input class="form-control" name="password" type="password" id="password"  value="{{ old('password', optional($user)->password) }}" minlength="1" maxlength="255" placeholder="Enter password here...">
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>



                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password" class="col-md-2 control-label">Password Confirmation</label>
                    <div class="col-md-10">
                        <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" value="{{ old('password', optional($user)->password) }}" minlength="1" maxlength="255" placeholder="Enter password here...">
                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>





                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>


        </div>
    </div>

@endsection
