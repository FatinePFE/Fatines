@extends('layouts.myapp')

@section('content')
    <!-- Page Content -->
    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Offres</h4>
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
                            <th>User</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>From City</th>
                            <th>To City</th>
                            <th>Shop</th>


                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($offres as $offre)
                        <tr>
                            <td>
                                    @if( optional($offre->user)->avatar )
                                    <img class="rounded-circle" width="30px" src="/storage/{{ optional($offre->user)->avatar }}" />
                                    @else
                                    <img class="rounded-circle" width="30px" src="/storage/uploads/avatar.png" />
                                    @endif

                                {{ optional($offre->user)->name }}

                            </td>

                            <td>{{ $offre->name }}</td>
                            <td>{{ $offre->price }}</td>
                            <td>{{ ($offre->status) ? 'Yes' : 'No' }}</td>
                            <td>{{ optional($offre->city)->name }}</td>
                            <td>{{ optional($offre->toCity)->name }}</td>
                            <td>{{ optional($offre->shop)->name }}</td>




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
    <!-- /.container -->



@endsection
