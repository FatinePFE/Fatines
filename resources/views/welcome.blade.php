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
                            @if(isset($details))
                                <option value="" style="display: none;" disabled selected>Select shop</option>
                            @else
                                <option value="" style="display: none;" >Select shop</option>
                            @endif

                            @foreach ($shops as $key => $shop)
                                @if(isset($details))
                                    <option value="{{ $shop->id }}" {{ $shop_id == $shop->id ? 'selected' : '' }}>
                                @else
                                    <option value="{{ $shop->id }}" >
                                @endif
                                    {{ $shop->name }}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
                    <label for="city_id" class="col-md-2 control-label">City</label>
                    <div class="col-md-10">
                        <select class="form-control" id="city_id" name="city_id">


                            @if(isset($details))
                                <option value="" style="display: none;" disabled selected>Select City</option>
                            @else
                                <option value="" style="display: none;">Select City</option>
                            @endif

                            @foreach ($cities as $key => $city)
                                @if(isset($details))
                                    <option value="{{ $city->id }}" {{ $city_id == $city->id ? 'selected' : '' }}>
                                @else
                                    <option value="{{ $city->id }}" >
                                @endif
                                    {{ $city->name }}
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
                        <th>Shopper</th>
						<th>Name</th>
						<th>Description</th>
                        <th>City</th>
					</tr>
				</thead>
				<tbody>
					@foreach($details as $offre)
					<tr>
                        <td>{{ optional($offre->user)->name }}</td>
						<td>{{$offre->name}}</td>
						<td>{{$offre->description}}</td>
                        <td>{{ optional($offre->city)->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
		</div>


@endsection
