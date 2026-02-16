<x-guest-layout>
    {{-- Hero --}}
    <div class="text-center py-16 px-4">

        <h1 class="text-4xl font-bold text-gray-800 mb-4">
            ✅ TaskMaster
        </h1>
        <p class="text-gray-500 text-lg max-w-md mx-auto mb-8">
            The simplest way to manage your tasks, stay focused, and get things done.
        </p>
        <div class="flex items-center justify-center gap-3">
            <a href="{{ route('register') }}"
               class="bg-indigo-600 text-white px-6 py-2.5 rounded-lg font-medium hover:bg-indigo-700 transition">
                Get Started Free
            </a>
            <a href="{{ route('login') }}"
               class="border border-gray-200 text-gray-600 px-6 py-2.5 rounded-lg font-medium hover:border-indigo-400 hover:text-indigo-600 transition">
                Log In
            </a>
        </div>
    </div>

    {{-- Stats --}}
    <div class="flex items-center justify-center gap-12 py-10 border-t border-gray-100 w-full max-w-lg">
        <div class="text-center">
            <div class="text-2xl font-bold text-indigo-600">{{ number_format($stats['users']) }}+</div>
            <div class="text-sm text-gray-400 mt-1">Users</div>
        </div>
        <div class="text-center">
            <div class="text-2xl font-bold text-indigo-600">{{ number_format($stats['tasks']) }}+</div>
            <div class="text-sm text-gray-400 mt-1">Tasks Completed</div>
        </div>
        <div class="text-center">
            <div class="text-2xl font-bold text-indigo-600">{{ $stats['countries'] }}+</div>
            <div class="text-sm text-gray-400 mt-1">Countries</div>
        </div>
    </div>

    {{-- Features --}}
    <div class="grid grid-cols-3 gap-6 py-10 border-t border-gray-100 w-full max-w-lg">
        <div class="text-center">
            <div class="text-2xl mb-2">🎯</div>
            <div class="text-sm font-medium text-gray-700">Stay Focused</div>
            <div class="text-xs text-gray-400 mt-1">Prioritize what matters most</div>
        </div>
        <div class="text-center">
            <div class="text-2xl mb-2">📅</div>
            <div class="text-sm font-medium text-gray-700">Due Dates</div>
            <div class="text-xs text-gray-400 mt-1">Never miss a deadline</div>
        </div>
        <div class="text-center">
            <div class="text-2xl mb-2">🔒</div>
            <div class="text-sm font-medium text-gray-700">Private & Secure</div>
            <div class="text-xs text-gray-400 mt-1">Your tasks, only yours</div>
        </div>
    </div>

    {{-- Cache indicator (only visible in local dev) --}}
    @if(app()->isLocal())
        <div class="fixed bottom-4 right-4 bg-gray-800 text-white text-xs px-3 py-1.5 rounded-full">
            rendered at {{ now()->format('H:i:s') }}
        </div>
    @endif

</x-guest-layout>