@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Menu</h1>
            <div class="list-group">
            <a href="{{ route('offres.offre.create') }}" class="list-group-item">Create New Offre</a>
            <a href="{{ route('offres.offre.index') }}" class="list-group-item">My Offres 2</a>
            <a href="#" class="list-group-item">Menu 3</a>
        </div>

    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="container">


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
