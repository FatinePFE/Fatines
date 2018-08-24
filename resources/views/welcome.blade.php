@extends('layouts.myapp')

@section('content')
    <!-- Page Content -->
    <div class="container">

    {!! Form::open(array('rout' => 'queries.search', 'class'=>'form navbar-form navbar-right searchform')) !!}
        {!! Form::text('search', null,
                            array('required',
                                    'class'=>'form-control',
                                    'placeholder'=>'Search for a tutorial...')) !!}
        {!! Form::submit('Search',
                                    array('class'=>'btn btn-default')) !!}
    {!! Form::close() !!}


    </div>
    <!-- /.container -->



@endsection
