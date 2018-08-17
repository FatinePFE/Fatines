
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($offre)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($offre)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">Price</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="text" id="price" value="{{ old('price', optional($offre)->price) }}" minlength="1" placeholder="Enter price here...">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
    <label for="city_id" class="col-md-2 control-label">From City</label>
    <div class="col-md-10">
        <select class="form-control" id="city_id" name="city_id">
        	    <option value="" style="display: none;" {{ old('city_id', optional($offre)->city_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select city</option>
        	@foreach ($cities as $key => $city)
			    <option value="{{ $key }}" {{ old('city_id', optional($offre)->city_id) == $key ? 'selected' : '' }}>
			    	{{ $city }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city_id_to') ? 'has-error' : '' }}">
    <label for="city_id_to" class="col-md-2 control-label">To City</label>
    <div class="col-md-10">
        <select class="form-control" id="city_id_to" name="city_id_to">
        	    <option value="" style="display: none;" {{ old('city_id_to', optional($offre)->city_id_to ?: '') == '' ? 'selected' : '' }} disabled selected>Select city</option>
        	@foreach ($cities as $key => $city)
			    <option value="{{ $key }}" {{ old('city_id_to', optional($offre)->city_id_to) == $key ? 'selected' : '' }}>
			    	{{ $city }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('city_id_to', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('shop_id') ? 'has-error' : '' }}">
    <label for="shop_id" class="col-md-2 control-label">Shop</label>
    <div class="col-md-10">
        <select class="form-control" id="shop_id" name="shop_id">
        	    <option value="" style="display: none;" {{ old('shop_id', optional($offre)->shop_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select shop</option>
        	@foreach ($shops as $key => $shop)
			    <option value="{{ $key }}" {{ old('shop_id', optional($offre)->shop_id) == $key ? 'selected' : '' }}>
			    	{{ $shop }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('shop_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <!-- <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($offre)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($offre)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
    </div>
        -->
        <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ Auth::user()->id }}">
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="status_1">
            	<input id="status_1" class="" name="status" type="checkbox" value="1" {{ old('status', optional($offre)->status) == '1' ? 'checked' : '' }}>
                Disactive
            </label>
        </div>

        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>



</div>

