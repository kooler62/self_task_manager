@extends('layouts.app')

@section('content')
    @if ($errors->has('error'))
        {{ $errors->first('error') }}
    @endif

<h1>{{$project->title}}</h1>
create task


@include('modules.users.task.create_task_form')


<h2>tasks:</h2>

    <style>
        td{border: 1px dotted bisque;}

    </style>
    <table style="width:100%">
        <tr style="border: 1px dotted grey">
            <th>backlog</th>
            <th>in_progress</th>
            <th>in_testing</th>in_testing
            <th>completed</th>
        </tr>


    @foreach($tasks as $task)
        <tr>
       @if($task->status == "completed")
           <td></td>
                <td></td>
                <td></td>
                <td> <p style="color: red; display: inline-block; border: 1px solid red">  {{$task->title}}</p></td>

         @elseif($task->status == "in_progress")
                <td></td> <td>  <p style="color: blue; display: inline-block;">  {{$task->title}}</p></td> <td></td> <td></td>

       @elseif($task->status == "backlog")
                <td> <p style="color: grey; display: inline-block;">  {{$task->title}}</p></td>
          <td>

          </td>  <td></td>  <td></td>
       @elseif($task->status == "in_testing")
                <td></td> <td></td> <td> <p style="color: green; display: inline-block;">  {{$task->title}}</p></td>  <td></td>

           @endif
        </tr>
    @endforeach

    </table>


@foreach($tasks as $task)
    @include('modules.users.task.edit_task_form')

    {!! Form::open(['method' => 'DELETE', 'route' => ['tasks.destroy', $task->id]]) !!}
    <button>Delete</button>
    {!! Form::close() !!}
    <br>
    @endforeach


@endsection

