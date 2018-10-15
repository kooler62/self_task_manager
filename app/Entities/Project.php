<?php

namespace App\Entities;

use DB;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';

    public function show_users_project($id){
       return $this::all()->where('user_id', $id);
    }

    public function create($data)
    {
        $data['created_at'] = now();
        $data['user_id'] = Auth::user()->id;
        DB::table($this->table)->insert($data);
    }

    public function edit($id, $data)
    {
        DB::table($this->table)->where('id', '=', $id)
            ->update($data);
    }

}
