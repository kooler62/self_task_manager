<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function projects()
    {
        return $this->hasMany('App\Entities\Project');
    }

    public function tasks()
    {
        return $this->hasMany('App\Entities\Task');
    }
}
