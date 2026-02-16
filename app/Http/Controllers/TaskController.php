<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'nullable|date',
        ]);

        Auth::user()->tasks()->create($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created!');
    }

    public function edit(Task $task)
    {
        abort_if($task->user_id !== Auth::id(), 403);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        abort_if($task->user_id !== Auth::id(), 403);

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:pending,in_progress,completed',
            'due_date'    => 'nullable|date',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated!');
    }

    public function destroy(Task $task)
    {
        abort_if($task->user_id !== Auth::id(), 403);

        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted.');
    }
}
