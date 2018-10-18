<?php

namespace App\Services;

use App\Entities\Project;

class ProjectService
{
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function create($data){
        $this->project->title   = $data['title'];
        $this->project->user_id = auth()->id();
        return $this->project->save();
    }

    public function update($id, $data){
        $project = Project::find($id);
        $project->title = $data['title'];
         return $project->save();
    }
}