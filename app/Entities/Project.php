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
       return $this::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(10);
    }

    public function create($data)
    {
        $User = Auth::user();
        $user_points = $User->points;
        $project_price = DB::table('prices')->where('title', 'create_project')->first()->amount;
        if($user_points < $project_price){
            return back()->withErrors(['error' => ['not enough points']]);
        }

        User::find($User->id)->decrement('points', $project_price );
        $data['created_at'] = now();
        $data['user_id'] = $User->id;
        DB::table($this->table)->insert($data);
    }

    public function edit($id, $data)
    {
        DB::table($this->table)->where('id', $id)
            ->update($data);
    }

}
