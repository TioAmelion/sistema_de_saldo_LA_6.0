<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Noticia;
use App\User;

class NoticiaPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function updatePost(User $user, Noticia $noticia){

        return $user->id == $noticia->user_id;
    }
}
