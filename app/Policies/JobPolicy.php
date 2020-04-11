<?php

namespace App\Policies;

use App\ForumUser;
use App\Job;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create jobs.
     *
     * @param  \App\ForumUser  $user
     * @return mixed
     */
    public function create(ForumUser $user)
    {
        //
    }

    /**
     * Determine whether the user can update the job.
     *
     * @param  \App\ForumUser  $user
     * @param  \App\Job  $job
     * @return mixed
     */
    public function update(ForumUser $user, Job $job)
    {
        //
    }

    /**
     * Determine whether the user can delete the job.
     *
     * @param  \App\ForumUser  $user
     * @param  \App\Job  $job
     * @return mixed
     */
    public function delete(ForumUser $user, Job $job)
    {
        //
    }
}
