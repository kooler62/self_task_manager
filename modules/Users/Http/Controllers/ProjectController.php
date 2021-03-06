<?php

namespace Modules\Users\Http\Controllers;

use App\Entities\Project;
use Illuminate\Support\Facades\Gate;
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
        if (Gate::allows('own-project', $project)) {
            return view('users::project.show', compact('project'));
        }
        return abort('404');
    }

    public function edit(Project $project)
    {
        if (Gate::allows('own-project', $project)) {
            return view('users::project.edit', compact('project'));
        }
        return abort('404');
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $this->project->update($id, $request);
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        if (Gate::allows('own-project', $project))
        {
            Project::destroy($project->id);
            return redirect()->route('projects.index');
        }
        return abort('404');
    }
}
