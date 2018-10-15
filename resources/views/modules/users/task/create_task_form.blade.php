{!! Form::open(['route' => 'tasks.store']) !!}

{{ Form::label('title', 'title') }}

{{ Form::text('title', null, [ "class" => "form-control", "placeholder" => "title"]) }}

@if ($errors->has('title'))
    {{ $errors->first('title') }}
@endif


{{ Form::label('description', 'description') }}

{{ Form::text('description', null, [ "class" => "form-control", "placeholder" => "description"]) }}

@if ($errors->has('description'))
    {{ $errors->first('description') }}
@endif





{{ Form::submit('Create') }}

{!! Form::close() !!}