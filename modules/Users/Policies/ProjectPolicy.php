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
        return true;
        //return false;
        //return $user->id == $project->user_id;
    }
}
