{!! Form::open(['route' => 'tasks.store']) !!}

{{ Form::label('title', 'title') }}

{{ Form::text('title', null, [ "class" => "form-control", "placeholder" => "title"]) }}

@if ($errors->has('title'))
    {{ $errors->first('title') }}
@endif

{!! Form::hidden('project_id', Request::segment(2)) !!}

{{ Form::label('description', 'description') }}

{{ Form::text('description', null, [ "class" => "form-control", "placeholder" => "description"]) }}
{{ Form::label('status', 'status') }}
{{ Form::select('status', [
    'backlog' => 'backlog',
    'in_progress' => 'in_progress',
    'in_testing' => 'in_testing',
    'completed' =>'completed'
  ], [ "class" => "form-control", "placeholder" => "status"]) }}

@if ($errors->has('status'))
    {{ $errors->first('status') }}
@endif

@if ($errors->has('description'))
    {{ $errors->first('description') }}
@endif

{{ Form::submit('Create') }}

{!! Form::close() !!}