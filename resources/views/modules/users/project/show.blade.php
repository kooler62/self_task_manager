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
            <th>in_testing</th>
            <th>completed</th>
        </tr>


    @foreach($tasks as $task)
        <tr>
            @if($task->status == "backlog")
                <td>@include('modules.users.task.edit_task_form')</td>
                <td></td>
                <td></td>
                <td></td>
            @elseif($task->status == "in_progress")
                <td></td>
                <td>@include('modules.users.task.edit_task_form')</td>
                <td></td>
                <td></td>
            @elseif($task->status == "in_testing")
                <td></td>
                <td></td>
                <td>@include('modules.users.task.edit_task_form')</td>
                <td></td>
            @elseif($task->status == "completed")
                <td></td>
                <td></td>
                <td></td>
                <td>@include('modules.users.task.edit_task_form')</td>
           @endif
        </tr>
    @endforeach

    </table>

@endsection

