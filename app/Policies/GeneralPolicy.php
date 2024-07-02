<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GeneralPolicy
{
    /**
     * Create a new policy instance.
     */
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
         // logika pengecekan usertype admin
         return $user->usertype == 'admin'; // hanya untuk usertype admin
        }
}
