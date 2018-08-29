@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($user->name) ? $user->name : 'User' }}</h4>

            </div>
            <!--
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="Show All User">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('users.user.create') }}" class="btn btn-success" title="Create New User">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>

            -->
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
                </div>
            @endif


            <form method="POST" action="{{ route('users.user.update', $user->id) }}" id="edit_user_form" name="edit_user_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('users.form', [
                                        'user' => $user,
                                      ])


            <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                <label for="role" class="col-md-2 control-label">Role</label>
                <div class="col-md-10">
                    <select class="form-control" id="role_disp" name="role" disabled>
                            <option value="" style="display: none;" {{ old('role', optional($user)->role ?: '') == '' ? 'selected' : '' }} disabled selected>Select role</option>
                        @foreach (['USER' => 'USER',
            'ADMIN' => 'ADMIN'] as $key => $text)
                            <option value="{{ $key }}" {{ old('role', optional($user)->role) == $key ? 'selected' : '' }}>
                                {{ $text }}
                            </option>
                        @endforeach
                    </select>

                    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}

                    <input class="form-control" name="role" type="hidden" id="role" value="{{ Auth::user()->role }}">
                    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
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
