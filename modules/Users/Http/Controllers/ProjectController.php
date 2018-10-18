<?php

namespace Modules\Users\Http\Controllers;

use App\Entities\Project;
use App\Services\ProjectService;
use Illuminate\Routing\Controller;
use App\Repositories\ProjectsRepository;
use Modules\Users\Http\Requests\StoreProjectRequest;
use Modules\Users\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function __construct(ProjectsRepository $projects, ProjectService $project)
    {
        $this->projects = $projects;
        $this->project = $project;
    }

    public function index()
    {
        $projects = $this->projects->users_projects();
        return view('users::project.index', compact('projects') );
    }

    public function create()
    {
        return view('users::project.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $this->project->create($request);
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
        $this->project->update($id, $request);
        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        Project::destroy($id);
        return redirect()->route('projects.index');
    }
}
