<?php

namespace App\Entities;

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
        $data['created_at'] = now();
       // $data['user_id'] = Auth::user()->id;
        DB::table($this->table)->insert($data);
    }



    public function edit($id, $data)
    {
        DB::table($this->table)->where('id', '=', $id)
            ->update($data);
    }
}
