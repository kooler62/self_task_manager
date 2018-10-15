{!! Form::open(['route' => 'projects.store']) !!}

{{ Form::label('title', 'title') }}

{{ Form::text('title', null, [ "class" => "form-control", "placeholder" => "title"]) }}

@if ($errors->has('title'))
    {{ $errors->first('title') }}
@endif


{{ Form::submit('Create') }}

{!! Form::close() !!}