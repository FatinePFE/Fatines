@extends('layouts.app')

@section('content')


    <div class="panel panel-default">

        <div class="panel-heading clearfix">

                <div class="pull-left">
                    <h4 class="mt-5 mb-5">Home</h4>
                </div>

        </div>

        <div class="panel-body">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                <div class="container">


            </div>


        </div>
    </div>



@endsection
