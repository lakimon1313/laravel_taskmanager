<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- Left side: Logo + Links --}}
            <div class="flex items-center gap-8">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="text-indigo-600 font-bold text-lg hover:text-indigo-700 transition-colors duration-300">
                    ✅ TaskMaster
                </a>

                {{-- App Nav Links (only when logged in) --}}
                @auth
                    <div class="hidden sm:flex items-center gap-1">
                        <a href="{{ route('tasks.index') }}"
                           class="group relative px-3 py-2 text-sm font-medium transition-all duration-300
                               {{ request()->routeIs('tasks.index') ? 'text-indigo-600' : 'text-gray-600 hover:text-gray-900' }}">
                            📋 My Tasks
                            @if(request()->routeIs('tasks.index'))
                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-indigo-600 to-purple-600"></span>
                            @else
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-indigo-600 to-purple-600 group-hover:w-full transition-all duration-300"></span>
                            @endif
                        </a>
                        <a href="{{ route('tasks.create') }}"
                           class="group relative px-3 py-2 text-sm font-medium transition-all duration-300
                               {{ request()->routeIs('tasks.create') ? 'text-indigo-600' : 'text-gray-600 hover:text-gray-900' }}">
                            + New Task
                            @if(request()->routeIs('tasks.create'))
                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-indigo-600 to-purple-600"></span>
                            @else
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-indigo-600 to-purple-600 group-hover:w-full transition-all duration-300"></span>
                            @endif
                        </a>
                        <a href="{{ route('profile.edit') }}"
                           class="group relative px-3 py-2 text-sm font-medium transition-all duration-300
                               {{ request()->routeIs('profile.*') ? 'text-indigo-600' : 'text-gray-600 hover:text-gray-900' }}">
                            👤 Profile
                            @if(request()->routeIs('profile.*'))
                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-indigo-600 to-purple-600"></span>
                            @else
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-indigo-600 to-purple-600 group-hover:w-full transition-all duration-300"></span>
                            @endif
                        </a>
                    </div>
                @endauth

                {{-- Landing Page Links (visible to everyone, hidden on mobile) --}}
                <div class="hidden sm:flex items-center gap-1">
                    @foreach([
                        'features' => 'Features',
                        'pricing'  => 'Pricing',
                        'about'    => 'About',
                        'blog'     => 'Blog',
                        'faq'      => 'FAQ',
                        'contact'  => 'Contact',
                    ] as $routeName => $label)
                        <a href="{{ route($routeName) }}"
                           class="group relative px-3 py-2 text-sm font-medium transition-all duration-300
                               {{ request()->routeIs($routeName) ? 'text-indigo-600' : 'text-gray-600 hover:text-gray-900' }}">
                            {{ $label }}
                            @if(request()->routeIs($routeName))
                                <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-indigo-600 to-purple-600"></span>
                            @else
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-indigo-600 to-purple-600 group-hover:w-full transition-all duration-300"></span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Right side: Auth buttons --}}
            <div class="flex items-center gap-3">
                @auth
                    {{-- Logged in: show username + logout --}}
                    <span class="text-sm text-gray-600 font-medium">
                        {{ Auth::user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="text-sm text-gray-600 hover:text-red-600 transition-colors duration-300">
                            Logout
                        </button>
                    </form>
                @else
                    {{-- Guest: show login + get started --}}
                    <a href="{{ route('login') }}"
                       class="text-sm text-gray-600 hover:text-gray-900 transition-colors duration-300 font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="text-sm text-white bg-gradient-to-r from-indigo-600 to-purple-600 px-4 py-2 rounded-lg hover:shadow-lg transition-all duration-300 font-medium">
                        Get Started
                    </a>
                @endauth
            </div>

        </div>
    </div>
</nav>
