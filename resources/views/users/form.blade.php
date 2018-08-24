
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($user)->email) }}" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Password</label>
    <div class="col-md-10">
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($user)->password) }}" placeholder="Enter password here...">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($user)->phone) }}" minlength="1" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
    <label for="avatar" class="col-md-2 control-label">Avatar</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="avatar" id="avatar" class="hidden">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" readonly>
        </div>

        @if (isset($user->avatar) && !empty($user->avatar))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_avatar" class="custom-delete-file" value="1" {{ old('custom_delete_avatar', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ basename($user->avatar) }}
                </span>
            </div>
        @endif
        {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
    <label for="city_id" class="col-md-2 control-label">City</label>
    <div class="col-md-10">
        <select class="form-control" id="city_id" name="city_id">
        	    <option value="" style="display: none;" {{ old('city_id', optional($user)->city_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select city</option>
        	@foreach ($cities as $key => $city)
			    <option value="{{ $key }}" {{ old('city_id', optional($user)->city_id) == $key ? 'selected' : '' }}>
			    	{{ $city }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('city_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>



