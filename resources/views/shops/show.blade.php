@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($shop->name) ? $shop->name : 'Shop' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('shops.shop.destroy', $shop->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('shops.shop.index') }}" class="btn btn-primary" title="Show All Shop">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('shops.shop.create') }}" class="btn btn-success" title="Create New Shop">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('shops.shop.edit', $shop->id ) }}" class="btn btn-primary" title="Edit Shop">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Shop" onclick="return confirm(&quot;Delete Shop??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $shop->name }}</dd>
            <dt>Category</dt>
            <dd>{{ optional($shop->category)->name }}</dd>

        </dl>

    </div>
</div>

@endsection