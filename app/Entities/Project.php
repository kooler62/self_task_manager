<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
