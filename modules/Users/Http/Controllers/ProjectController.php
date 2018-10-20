<?php

namespace Modules\Users\Http\Controllers;

use App\Entities\Project;
use App\Entities\User;
use Auth;
use App\Services\ProjectService;
//use Illuminate\Routing\Controller;
use Nwidart\Modules\Routing\Controller;
use App\Repositories\ProjectsRepository;
use Modules\Users\Http\Requests\StoreProjectRequest;
use Modules\Users\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function __construct(ProjectsRepository $projectsRepo, ProjectService $projectService)
    {
        $this->projectsRepo = $projectsRepo;
        $this->projectService = $projectService;
    }

    public function index()
    {
        $projects = $this->projectsRepo->users_projects();
        return view('users::project.index', compact('projects') );
    }

    public function create()
    {
        return view('users::project.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $this->projectService->create($request);
        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        $user = User::find(2);
        dd( $this->authorize($user, $project));

        # return view('users::project.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('users::project.edit', compact('project'));
        /*
        if (Gate::allows('own-project', $project)) {
            return view('users::project.edit', compact('project'));
        }
        return abort('404');*/
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $user = User::find(2);
        dd($request->authorize($user, 'update', $request));
        $this->projectService->update($id, $request);
        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {/*
        if (Gate::allows('own-project', $project))
        {
            Project::destroy($project->id);
            return redirect()->route('projects.index');
        }
        return abort('404');*/
    }
}
