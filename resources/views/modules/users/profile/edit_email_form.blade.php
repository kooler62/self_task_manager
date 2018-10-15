{!! Form::open(['method' => 'PUT','route' => ['profile.update_email', Auth::user()->id]]) !!}

{{ Form::label('email', 'email') }}

{{ Form::text('email', Auth::user()->email, [ "class" => "form-control", "placeholder" => "email"]) }}

@if ($errors->has('email'))
{{ $errors->first('email') }}
@endif

{{ Form::submit('Change') }}

{!! Form::close() !!}