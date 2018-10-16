<?php

namespace Modules\Users\Http\Controllers;

use Auth;
use App\Entities\Task;
use App\Entities\Project;
use Illuminate\Routing\Controller;
use Modules\Users\Http\Requests\StoreTaskRequest;
use Modules\Users\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index(Task $Task)
    {
        return view('users::task.index',
            [
                'projects' => $Task->show_project_tasks(Auth::user()->id),
            ]
        );
    }

    public function create()
    {
        return view('users::task.create');
    }

    public function store(StoreTaskRequest $request, Task $Task)
    {
        $Task->create($request->except('_token'));
        return redirect()->route('projects.show',
            [
                'id' => $request->project_id,
            ]
        );
    }

    public function show($id)
    {
        return view('users::project.show',
            [
                'project' => Project::find($id),
                'tasks' => Task::where('project_id', $id)
            ]);
    }

    public function edit($id)
    {
        return view('users::project.edit',[
            'project' => Project::find($id),
        ]);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $Task = new Task();
        $data = $request->except(['_token', '_method']);
        $Task->edit($id, $data);
        return back();
    }

    public function destroy($id)
    {
        Task::destroy($id);
        return back();
    }
}
