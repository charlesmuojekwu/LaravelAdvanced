<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class SubsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    ### ADDED POLICY FOR GATES

    public function subs_only(User $user)     /// logic written inside to authenticatate are know as closure 
    {
        return $user->sub
            ? Response::allow()
            : Response::deny('You are Not subscribed');

        // if ($user->subs == 1) {
        //     return true;
        // }else{
        //     return false;
        // }
    }
}
