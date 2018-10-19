<?php

namespace Modules\Users\Policies;

use App\Entities\Project;
use App\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;


    public function __construct()
    {
        //
    }

    public function test_f()
    {
        return false;
        //return $user->id === $post->user_id;
    }

    public function test_t()
    {
        return true;
        //return $user->id === $post->user_id;
    }

    public function show(User $user)
    {

        dd($user);
        return false;
        //return $user->id === $post->user_id;
    }

    public function show2(User $user, Project $project)
    {
        return false;
        //return $user->id === $post->user_id;
    }



}
