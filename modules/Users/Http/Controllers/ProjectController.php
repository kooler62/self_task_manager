<?php

namespace Modules\Users\Http\Controllers;

use Auth;
use App\Entities\User;
use App\Entities\Project;
use Illuminate\Routing\Controller;
use Modules\Users\Http\Requests\StoreProjectRequest;
use Modules\Users\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function index(User $User)
    {
        $projects = $User::find(Auth::user()->id)->projects;
        return view('users::project.index', compact('projects') );
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

    public function show(Project $project)
    {
        return view('users::project.show', compact('project'));
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
