<?php

namespace Modules\Users\Policies;

use App\Entities\Project;
use App\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Project $project)
    {
      //  dd(55);
        return false;
        //return false;
        //return $user->id == $project->user_id;
    }
    public function update(User $user, Project $project)
    {
       // dd(55);
        return false;
        //return false;
        //return $user->id == $project->user_id;
    }
}
