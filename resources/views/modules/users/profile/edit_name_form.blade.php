{!! Form::open(['method' => 'PUT','route' => ['profile.update_name', Auth::user()->id]]) !!}

{{ Form::label('name', 'name') }}

{{ Form::text('name', Auth::user()->name, [ "class" => "form-control", "placeholder" => "name"]) }}

@if ($errors->has('name'))
    {{ $errors->first('name') }}
@endif

{{ Form::submit('Change') }}

{!! Form::close() !!}