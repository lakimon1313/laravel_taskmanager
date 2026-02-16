<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Auth::user()->tasks()->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('due')) {
            match($request->due) {
                'today'    => $query->whereDate('due_date', today()),
                'week'     => $query->whereBetween('due_date', [today(), today()->endOfWeek()]),
                'overdue'  => $query->where('due_date', '<', today())->where('status', '!=', 'completed'),
                default    => null
            };
        }

        $tasks = $query->get();
        $currentStatus = $request->status;
        $currentDue = $request->due;

        return view('tasks.index', compact('tasks', 'currentStatus', 'currentDue'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    //                  ↓ was Request, now StoreTaskRequest
    //                  ↓ validation happens BEFORE this method runs
    public function store(StoreTaskRequest $request)
    {
        Auth::user()->tasks()->create($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', 'Task created!');
    }

    public function edit(Task $task)
    {
        //         ↓ was: abort_if($task->user_id !== Auth::id(), 403)
        //         ↓ now: calls TaskPolicy@view → returns 403 if false
        $this->authorize('view', $task);

        return view('tasks.edit', compact('task'));
    }

    //                   ↓ UpdateTaskRequest handles validation
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);

        $task->update($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated!');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted.');
    }
}
