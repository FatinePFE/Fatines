@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($deltype->name) ? $deltype->name : 'Deltype' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('deltypes.deltype.destroy', $deltype->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('deltypes.deltype.index') }}" class="btn btn-primary" title="Show All Deltype">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('deltypes.deltype.create') }}" class="btn btn-success" title="Create New Deltype">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('deltypes.deltype.edit', $deltype->id ) }}" class="btn btn-primary" title="Edit Deltype">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Deltype" onclick="return confirm(&quot;Delete Deltype??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $deltype->name }}</dd>

        </dl>

    </div>
</div>

@endsection