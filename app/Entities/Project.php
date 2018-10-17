<?php

namespace App\Entities;

use DB;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
