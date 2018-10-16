<?php

namespace Modules\Users\Http\Controllers;

use Auth;
use App\Entities\Task;
use App\Entities\Project;
use Illuminate\Routing\Controller;
use Modules\Users\Http\Requests\StoreProjectRequest;
use Modules\Users\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function index(Project $Project)
    {
        return view('users::project.index',
            [
                'projects' => $Project->show_users_project(Auth::user()->id),
            ]
        );
    }

    public function create()
    {
        return view('users::project.create');
    }

    public function store(StoreProjectRequest $request, Project $Project)
    {
        $Project->create($request->except('_token'));
        return redirect()->route('projects.index');
    }

    public function show($id)
    {
        return view('users::project.show',
            [
                'project' => Project::find($id),
                'tasks' => Task::all()->where('project_id', $id)->sortBy('position'),
            ]);
    }

    public function edit($id)
    {
        return view('users::project.edit',[
            'project' => Project::find($id),
        ]);
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $Project = new Project();
        $Project->edit($id, $request->except(['_token', '_method']));
        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        Project::destroy($id);
        return redirect()->route('projects.index');
    }
}
