<?php

namespace App\Providers;

use App\Http\Sections\Users;
use App\Entities\Project;
use App\Entities\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\Users\Policies\UserPolicy;
use Modules\Users\Policies\ProjectPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Project::class => ProjectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('own-project', function ($user, $project)
        {
            return $user->id == $project->user_id;
        });
    }
}
