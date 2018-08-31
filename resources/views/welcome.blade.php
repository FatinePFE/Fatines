@extends('layouts.myapp')

@section('content')
    <!-- Page Content -->
    <div class="panel panel-default">

        <form action="/search" method="POST" role="search">
			{{ csrf_field() }}


                <div class="form-group {{ $errors->has('shop_id') ? 'has-error' : '' }}">
                    <label for="shop_id" class="col-md-2 control-label">Shop</label>
                    <div class="col-md-10">
                        <select class="form-control" id="shop_id" name="shop_id">
                                <option value="" style="display: none;">Select shop</option>
                            @foreach ($shops as $key => $shop)
                                <option value="{{ $shop->id }}" >
                                    {{ $shop->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>

		</form>
    </div>

    <!-- /.container -->

    <div class="container">
			@if(isset($details))

			<h2>Result</h2>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $offre)
					<tr>
						<td>{{$offre->name}}</td>
						<td>{{$offre->description}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
		</div>


@endsection
