@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Offres</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('offres.offre.create') }}" class="btn btn-success" title="Create New Offre">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($offres) == 0)
            <div class="panel-body text-center">
                <h4>No Offres Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>From City</th>
                            <th>To City</th>
                            <th>Shop</th>
                            <th>User</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($offres as $offre)
                        <tr>
                            <td>{{ $offre->name }}</td>
                            <td>{{ $offre->price }}</td>
                            <td>{{ ($offre->status) ? 'Yes' : 'No' }}</td>
                            <td>{{ optional($offre->city)->name }}</td>
                            <td>{{ optional($offre->toCity)->name }}</td>
                            <td>{{ optional($offre->shop)->name }}</td>
                            <td>{{ optional($offre->user)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('offres.offre.destroy', $offre->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('offres.offre.show', $offre->id ) }}" class="btn btn-info" title="Show Offre">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('offres.offre.edit', $offre->id ) }}" class="btn btn-primary" title="Edit Offre">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Offre" onclick="return confirm(&quot;Delete Offre?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $offres->render() !!}
        </div>

        @endif

    </div>
@endsection
