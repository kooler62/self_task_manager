@extends('layouts.app')

@section('content')

    @if ($errors->has('error'))
        {{ $errors->first('error') }}
    @endif

    <h1>Projects</h1>

create project:
@include('modules.users.project.create_project_form')
    <br>
@foreach($projects as $project)
    <a href="{{route('projects.show', [ 'id' => $project->id ])}}">{{$project->title}}</a>
    <a href="{{route('projects.edit', [ 'id' => $project->id ])}}">edit</a>
      {!! Form::open(['method' => 'DELETE', 'route' => ['projects.destroy', $project->id]]) !!}
        <button>Delete</button>
      {!! Form::close() !!}
    <hr>
@endforeach



@endsection