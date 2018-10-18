<?php

namespace App\Repositories;

use App\Entities\Project;

class ProjectsRepository
{
    protected $project;

    function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function users_projects(){
        return $this->project->where('user_id', auth()->id())->orderBy('created_at', 'desc')
            ->get();

    }
}