<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- Left side: Logo + Links --}}
            <div class="flex items-center gap-8">

                {{-- Logo --}}
                <a href="{{ route('tasks.index') }}" class="text-indigo-600 font-bold text-lg">
                    ✅ TaskMaster
                </a>

                {{-- Nav links (only when logged in) --}}
                @auth
                    <div class="flex items-center gap-1">
                        <a href="{{ route('tasks.index') }}"
                           class="px-3 py-2 rounded-md text-sm font-medium transition
                               {{ request()->routeIs('tasks') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50' }}">
                            📋 My Tasks
                        </a>
                        <a href="{{ route('tasks.create') }}"
                           class="px-3 py-2 rounded-md text-sm font-medium transition
                               {{ request()->routeIs('tasks.create') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50' }}">
                            + New Task
                        </a>

                        <a href="{{ route('profile.edit') }}"
                           class="px-3 py-2 rounded-md text-sm font-medium transition
                               {{ request()->routeIs('profile.*') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50' }}">
                            👤 Profile
                        </a>
                    </div>
                @endauth

                <a href="{{ route('queue-mail') }}"
                   class="px-3 py-2 rounded-md text-sm font-medium transition
                               {{ request()->routeIs('queue-mail') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-500 hover:text-gray-800 hover:bg-gray-50' }}">
                    Send Email
                </a>
            </div>

            {{-- Right side: Auth buttons --}}
            <div class="flex items-center gap-3">

                @auth
                    {{-- Logged in: show username + logout --}}
                    <span class="text-sm text-gray-500">
                        {{ Auth::user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-sm text-gray-500 hover:text-red-500 transition">
                            Logout
                        </button>
                    </form>
                @else
                    {{-- Guest: show login + register --}}
                    <a href="{{ route('login') }}"
                       class="text-sm text-gray-500 hover:text-gray-800 transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-indigo-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Register
                    </a>
                @endauth

            </div>

        </div>
    </div>
</nav>
