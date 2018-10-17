<?php

namespace App\Entities;

use DB;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    public function project()
    {
        return $this->belongsTo('App\Entities\Project');
    }

    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
}
