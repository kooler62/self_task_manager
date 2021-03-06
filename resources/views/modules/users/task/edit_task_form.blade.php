{!! Form::open(['method' => 'PUT','route' => ['tasks.update', $task->id]]) !!}

{{ Form::label('title', 'title') }}
{{ Form::text('title', $task->title, [ "class" => "form-control", "placeholder" => "title"]) }}
@if ($errors->has('title'))
    {{ $errors->first('title') }}
@endif

<br>

{{ Form::label('description', 'description') }}
{{ Form::text('description', $task->description, [ "class" => "form-control", "placeholder" => "description"]) }}
@if ($errors->has('description'))
    {{ $errors->first('description') }}
@endif

<br>

{{$task->status}}
{{ Form::label('status', 'status') }}
{{ Form::select('status', [
    'backlog' => 'backlog',
    'in_progress' => 'in_progress',
    'in_testing' => 'in_testing',
    'completed' =>'completed'
  ], $task->status, [ "class" => "form-control", "placeholder" => "status"])
}}

@if ($errors->has('status'))
    {{ $errors->first('status') }}
@endif

<br>

{{ Form::label('position', 'position') }}
{{ Form::number('position', $task->position, [ "class" => "form-control", "placeholder" => "position"]) }}

@if ($errors->has('position'))
    {{ $errors->first('position') }}
@endif

<br>

{{ Form::submit('Update') }}

{!! Form::close() !!}
{!! Form::open(['method' => 'DELETE', 'route' => ['tasks.destroy', $task->id]]) !!}
<button>Delete</button>
{!! Form::close() !!}