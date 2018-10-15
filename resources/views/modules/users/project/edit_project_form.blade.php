{!! Form::open(['method' => 'PUT','route' => ['projects.update', $project->id]]) !!}

{{ Form::label('title', 'title') }}
{{ Form::text('title', $project->title, [ "class" => "form-control", "placeholder" => "title"]) }}

@if ($errors->has('title'))
    {{ $errors->first('title') }}
@endif





{{ Form::submit('Update') }}

{!! Form::close() !!}