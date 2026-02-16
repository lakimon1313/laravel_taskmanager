<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| WHAT IS A POLICY?
|--------------------------------------------------------------------------
|
| A Policy is a class that organizes authorization logic for a model.
| Instead of scattering "does this user own this task?" checks across
| your controller, you put them ALL here in one place.
|
| Each method answers one question:
|   "Can this $user perform this action on this $task?"
|   → return true  = yes, allow it
|   → return false = no, block with 403
|
| HOW LARAVEL FINDS THIS POLICY:
| Laravel auto-discovers policies by convention:
|   App\Models\Task  →  App\Policies\TaskPolicy
| So you don't need to register it anywhere.
|
| HOW TO USE IN A CONTROLLER:
|   $this->authorize('update', $task);
|   // If the policy returns false → automatic 403 response
|   // If true → code continues normally
|
*/

class TaskPolicy
{
    /**
     * Can this user view/edit/update this specific task?
     * The same rule applies: you must own the task.
     */
    public function view(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }

    public function update(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }

    public function delete(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }
}
