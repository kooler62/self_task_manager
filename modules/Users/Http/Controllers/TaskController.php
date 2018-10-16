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
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Task $Task)
    {
        return view('users::task.index',
            [
                'projects' => $Task->show_project_tasks(Auth::user()->id),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('users::task.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, Task $Task)
    {
         $request->validate([
            'title' => 'required|min:3|max:255',
             'description' => '',
             'user_id' => 'integer'
        ]);

        $Task->create($request->except('_token'));
        return redirect()->route('projects.show',[
            'id' => $request->project_id,
        ]);
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


        $Task = new Task();
        $data = $request->except(['_token', '_method']);
        $Task->edit($id, $data);

        return back();


    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {

        // проверка на проект или на юзера
        Task::destroy($id);
        //редирект на
        return back();
        //return redirect()->route('projects.index');
    }
}
