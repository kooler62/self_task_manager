<?php

namespace Modules\Users\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Entities\Project;
use App\Entities\Task;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Project $Project)
    {
        return view('users::project.index',
            [
                'projects' => $Project->show_users_project(Auth::user()->id),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('users::project.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, Project $Project)
    {
         $request->validate([
            'title' => 'required|min:3|max:255',
        ]);

        $Project->create($request->except('_token'));
        return redirect()->route('projects.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        return view('users::project.show',
            [
                'project' => Project::find($id),
                'tasks' => Task::where('project_id', $id)
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('users::project.edit',[
            'project' => Project::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|min:3|max:255',
        ]);


        $Project = new Project();
        //$request['updated_at'] = Carbon::now();
        $data = $request->except(['_token', '_method']);
        $Project->edit($id, $data);


        return redirect()->route('projects.index');

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        Project::destroy($id);
        return redirect()->route('projects.index');
    }
}
