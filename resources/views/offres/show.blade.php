@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($offre->name) ? $offre->name : 'Offre' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('offres.offre.destroy', $offre->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('offres.offre.index') }}" class="btn btn-primary" title="Show All Offre">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('offres.offre.create') }}" class="btn btn-success" title="Create New Offre">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('offres.offre.edit', $offre->id ) }}" class="btn btn-primary" title="Edit Offre">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Offre" onclick="return confirm(&quot;Delete Offre??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $offre->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $offre->description }}</dd>
            <dt>Price</dt>
            <dd>{{ $offre->price }}</dd>
            <dt>Status</dt>
            <dd>{{ ($offre->status) ? 'Yes' : 'No' }}</dd>
            <dt>From City</dt>
            <dd>{{ optional($offre->city)->name }}</dd>
            <dt>To City</dt>
            <dd>{{ optional($offre->toCity)->name }}</dd>
            <dt>Shop</dt>
            <dd>{{ optional($offre->shop)->name }}</dd>
            <dt>User</dt>
            <dd>{{ optional($offre->user)->name }}</dd>

        </dl>

    </div>
</div>

@endsection
