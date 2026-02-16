<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">My Tasks</h2>
            <a href="{{ route('tasks.create') }}"
               class="bg-indigo-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                + New Task
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4">

            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Filters --}}
            <div class="flex flex-wrap items-center gap-3 mb-6">

                {{-- Status filters --}}
                <div class="flex items-center gap-2">
                    <span class="text-xs text-gray-400 font-medium uppercase tracking-wide me-1">Status</span>
                    <a href="{{ route('tasks.index', array_filter(['due' => $currentDue])) }}"
                       class="px-3 py-1 rounded-full text-xs font-medium transition border {{ !$currentStatus ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white border-gray-200 text-gray-500 hover:border-indigo-400 hover:text-indigo-600' }}">
                        All
                    </a>
                    @foreach([
                        'pending'     => 'Pending',
                        'in_progress' => 'In Progress',
                        'completed'   => 'Completed',
                    ] as $value => $label)
                        <a href="{{ route('tasks.index', array_filter(['status' => $value, 'due' => $currentDue])) }}"
                           class="px-3 py-1 rounded-full text-xs font-medium transition border {{ $currentStatus === $value ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white border-gray-200 text-gray-500 hover:border-indigo-400 hover:text-indigo-600' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>

                {{-- Divider --}}
                <div class="w-px h-5 bg-gray-200"></div>

                {{-- Due date filters --}}
                <div class="flex items-center gap-2">
                    <span class="text-xs text-gray-400 font-medium uppercase tracking-wide me-1">Due</span>
                    <a href="{{ route('tasks.index', array_filter(['status' => $currentStatus])) }}"
                       class="px-3 py-1 rounded-full text-xs font-medium transition border {{ !$currentDue ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white border-gray-200 text-gray-500 hover:border-indigo-400 hover:text-indigo-600' }}">
                        All
                    </a>
                    @foreach([
                        'today'   => 'Today',
                        'week'    => 'This Week',
                        'overdue' => 'Overdue',
                    ] as $value => $label)
                        <a href="{{ route('tasks.index', array_filter(['status' => $currentStatus, 'due' => $value])) }}"
                           class="px-3 py-1 rounded-full text-xs font-medium transition border {{ $currentDue === $value ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white border-gray-200 text-gray-500 hover:border-indigo-400 hover:text-indigo-600' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>

                {{-- Task count --}}
                <span class="ms-auto text-sm text-gray-400">
                    {{ $tasks->count() }} {{ Str::plural('task', $tasks->count()) }}
                </span>

            </div>

            @forelse($tasks as $task)
                <div
                        class="bg-white border border-gray-200 rounded-lg px-5 py-4 mb-3 flex items-center justify-between gap-4">

                    <div class="flex items-center gap-3 flex-1">
                        <span class="w-2.5 h-2.5 rounded-full flex-shrink-0
                            {{ $task->status === 'completed' ? 'bg-green-400' :
                              ($task->status === 'in_progress' ? 'bg-yellow-400' : 'bg-gray-300') }}">
                        </span>
                        <div>
                            <p class="font-medium {{ $task->status === 'completed' ? 'line-through text-gray-400' : '' }}">
                                {{ $task->title }}
                            </p>
                            @if($task->due_date)
                                <p class="text-xs mt-0.5 {{ $task->due_date->isPast() && $task->status !== 'completed' ? 'text-red-500' : 'text-gray-400' }}">
                                    Due {{ $task->due_date->format('M d, Y') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center gap-2 flex-shrink-0">
                        <span class="text-xs px-2 py-1 rounded-full font-medium
                            {{ $task->status === 'completed' ? 'bg-green-100 text-green-700' :
                              ($task->status === 'in_progress' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-600') }}">
                            {{ str_replace('_', ' ', $task->status) }}
                        </span>
                        <a href="{{ route('tasks.edit', $task) }}"
                           class="text-xs text-indigo-600 hover:underline">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                              onsubmit="return confirm('Delete this task?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-xs text-red-400 hover:underline">Delete</button>
                        </form>
                    </div>

                </div>
            @empty
                <div class="text-center py-16 text-gray-400">
                    <p class="text-4xl mb-3">📋</p>
                    <p class="font-medium">No tasks yet</p>
                    <a href="{{ route('tasks.create') }}"
                       class="text-indigo-500 text-sm hover:underline mt-1 inline-block">
                        Create your first task →
                    </a>
                </div>
            @endforelse

        </div>

        @if(app()->isLocal())
            <div class="fixed bottom-4 right-4 bg-gray-800 text-white text-xs px-3 py-1.5 rounded-full">
                rendered at {{ now()->format('H:i:s') }}
            </div>
        @endif
    </div>
</x-app-layout>
