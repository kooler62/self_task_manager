<?php

namespace Modules\Users\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Entities\Project;
use App\Entities\Task;
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

    public function store(Request $request, Task $Task)
    {
         $request->validate(
             [
                'title' => 'required|min:3|max:255',
                'description' => '',
                'user_id' => 'integer'
             ]
         );

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

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|min:3|max:255',

            ]
        );

        $Task = new Task();
        $data = $request->except(['_token', '_method']);
        $Task->edit($id, $data);
        return back();
    }

    public function destroy($id)
    {
        // проверка на проект юзера или нет
        Task::destroy($id);
        return back();
    }
}
