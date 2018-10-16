{!! Form::open(['method' => 'PUT', 'files' => true, 'route' => ['profile.update_avatar', Auth::user()->id]]) !!}

{{ Form::label('avatar', 'avatar') }}

{{ Form::file('avatar') }}

@if ($errors->has('avatar'))
    {{ $errors->first('avatar') }}
@endif

{{ Form::submit('Upload') }}

{!! Form::close() !!}