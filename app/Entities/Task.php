<?php

namespace App\Entities;

use DB;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    public function show_project_tasks($id){
        return $this::all()->where('project_id', $id);
    }

    public function create($data)
    {
        $User = Auth::user();
        $user_points = $User->points;
        $task_price = DB::table('prices')->where('title', 'create_task')->first()->amount;
        if($user_points < $task_price){
            return back()->withErrors(['error' => ['not enough points']]);
        }
        User::find($User->id)->decrement('points', $task_price );

        $data['created_at'] = now();
        DB::table($this->table)->insert($data);
    }

    public function edit($id, $data)
    {
       DB::table($this->table)->where('id', $id)
            ->update($data);
    }
}
