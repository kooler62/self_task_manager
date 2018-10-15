
<h1>Projects</h1>
create project:
@include('modules.users.project.create_project_form')

@foreach($projects as $project)
    <a href="{{route('projects.show', [ 'id' => $project->id ])}}">{{$project->title}}</a>
    <a href="{{route('projects.edit', [ 'id' => $project->id ])}}">edit</a>
      {!! Form::open(['method' => 'DELETE', 'route' => ['projects.destroy', $project->id]]) !!}
        <button>Delete</button>
      {!! Form::close() !!} </td>
@endforeach

