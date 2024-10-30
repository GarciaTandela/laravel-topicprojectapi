<?php

namespace App\Policies;

use App\User;
use App\Topic;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    //Policy que verifica se o topic a ser actualizada pertence a pessoa que o quer actualizar
    public function update(User $user, Topic $topic)
    {
        return $user->ownsTopic($topic);
    }

    public function destroy(User $user, Topic $topic)
    {
        return $user->ownsTopic($topic);
    }
}
