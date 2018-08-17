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
                <h4 class="mt-5 mb-5">Deltypes</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('deltypes.deltype.create') }}" class="btn btn-success" title="Create New Deltype">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($deltypes) == 0)
            <div class="panel-body text-center">
                <h4>No Deltypes Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($deltypes as $deltype)
                        <tr>
                            <td>{{ $deltype->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('deltypes.deltype.destroy', $deltype->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('deltypes.deltype.show', $deltype->id ) }}" class="btn btn-info" title="Show Deltype">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('deltypes.deltype.edit', $deltype->id ) }}" class="btn btn-primary" title="Edit Deltype">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Deltype" onclick="return confirm(&quot;Delete Deltype?&quot;)">
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
            {!! $deltypes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection