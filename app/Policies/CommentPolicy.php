<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Comment;
class CommentPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id;
    }
}
