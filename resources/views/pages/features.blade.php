{{--
|--------------------------------------------------------------------------
| FEATURES PAGE — Beautiful, Interactive Design
|--------------------------------------------------------------------------
--}}
<x-landing-layout>
    <x-slot name="title">Features — TaskMaster</x-slot>

    {{-- Hero Section --}}
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-indigo-50 -z-10"></div>
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block mb-4 px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">Features</div>
            <h1 class="text-5xl sm:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Everything you need, <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">nothing you don't</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                TaskMaster is built for people who want to manage tasks, not manage a tool.
            </p>
        </div>
    </section>

    {{-- Feature 1: Task Management --}}
    <section class="py-20">
        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-16 items-center">
            <div class="order-2 md:order-1">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Create & Track Tasks</h2>
                <p class="text-lg text-gray-700 mb-6">Add tasks in seconds with everything you need: title, description, status, and due dates.</p>
                <ul class="space-y-4">
                    @foreach(['Quick task creation in seconds', 'Three-tier status system (Pending • In Progress • Done)', 'Optional due dates with reminders', 'Rich descriptions and notes'] as $item)
                        <li class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="text-gray-700">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="order-1 md:order-2 relative">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-indigo-400 rounded-2xl blur-2xl opacity-20 -z-10"></div>
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl border border-blue-200 p-8 shadow-xl">
                    <div class="space-y-3">
                        @foreach([
                            ['status' => 'completed', 'title' => 'Design landing page', 'color' => 'bg-emerald-500'],
                            ['status' => 'in_progress', 'title' => 'Build API endpoints', 'color' => 'bg-amber-500'],
                            ['status' => 'pending', 'title' => 'Write documentation', 'color' => 'bg-gray-400'],
                        ] as $task)
                            <div class="group bg-white hover:bg-blue-50 rounded-lg border border-gray-200 px-4 py-3 flex items-center gap-3 transition-all duration-300 hover:shadow-md">
                                <span class="w-3 h-3 rounded-full {{ $task['color'] }}"></span>
                                <span class="text-sm {{ $task['status'] === 'completed' ? 'line-through text-gray-400' : 'text-gray-700 font-medium' }}">
                                    {{ $task['title'] }}
                                </span>
                                @if($task['status'] !== 'pending')
                                    <span class="ml-auto text-xs px-2 py-1 rounded-full {{ $task['status'] === 'completed' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                        {{ $task['status'] === 'completed' ? 'Done' : 'In Progress' }}
                                    </span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Feature 2: Filters --}}
    <section class="py-20 bg-gradient-to-br from-purple-50 to-pink-50">
        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-16 items-center">
            <div class="order-2 md:order-2 relative">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-pink-400 rounded-2xl blur-2xl opacity-20 -z-10"></div>
                <div class="bg-white rounded-2xl border border-gray-200 p-8 shadow-xl">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-4">Filter by Status</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach(['All', 'Pending', 'In Progress', 'Completed'] as $i => $filter)
                            <span class="px-4 py-2 rounded-full text-sm font-medium {{ $i === 0 ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white' : 'border border-gray-200 text-gray-600 hover:border-purple-300' }} transition-all duration-300 cursor-pointer">
                                {{ $filter }}
                            </span>
                        @endforeach
                    </div>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-4">Filter by Due Date</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['Today', 'This Week', 'Overdue'] as $i => $filter)
                            <span class="px-4 py-2 rounded-full text-sm font-medium {{ $i === 1 ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white' : 'border border-gray-200 text-gray-600 hover:border-purple-300' }} transition-all duration-300 cursor-pointer">
                                {{ $filter }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="order-1 md:order-1">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Smart Filtering</h2>
                <p class="text-lg text-gray-700 mb-6">See exactly what matters right now with powerful, instant filters.</p>
                <ul class="space-y-4">
                    @foreach(['Filter by status instantly', 'Filter by due date (Today, This Week, Overdue)', 'Combine multiple filters', 'No page reloads — instant results'] as $item)
                        <li class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="text-gray-700">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- Feature 3: Security --}}
    <section class="py-20">
        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Private by Default</h2>
                <p class="text-lg text-gray-700 mb-6">Your tasks are 100% yours. Complete privacy, zero exceptions.</p>
                <ul class="space-y-4">
                    @foreach(['Every user has a private workspace', 'Secure authentication & encrypted passwords', 'Authorization on every single action', 'No data sharing, no third parties'] as $item)
                        <li class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-gradient-to-br from-green-600 to-emerald-600 flex items-center justify-center mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="text-gray-700">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-emerald-400 rounded-2xl blur-2xl opacity-20 -z-10"></div>
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl border border-green-200 p-12 text-center shadow-xl">
                    <div class="text-7xl mb-6">🔒</div>
                    <p class="text-sm text-gray-600 font-semibold uppercase tracking-widest mb-3">Military-Grade Security</p>
                    <p class="text-2xl font-bold text-gray-900">Your Data, Your Rules</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Additional Features Grid --}}
    <section class="py-24 bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-4xl font-bold text-gray-900 text-center mb-16">And So Much More...</h2>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => '📱', 'title' => 'Mobile First', 'desc' => 'Perfect on any device, any screen'],
                    ['icon' => '⚡', 'title' => 'Lightning Fast', 'desc' => 'Optimized for speed and performance'],
                    ['icon' => '📧', 'title' => 'Smart Reminders', 'desc' => 'Never miss a deadline again'],
                    ['icon' => '🎨', 'title' => 'Clean Design', 'desc' => 'Beautiful and distraction-free'],
                    ['icon' => '🔄', 'title' => 'Real-time Sync', 'desc' => 'Changes sync instantly across devices'],
                    ['icon' => '📊', 'title' => 'Progress Tracking', 'desc' => 'See your productivity at a glance'],
                ] as $feature)
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-400 to-purple-400 rounded-xl blur-lg opacity-20 group-hover:opacity-40 transition-all duration-300 -z-10"></div>
                        <div class="bg-white rounded-xl border border-gray-200 p-6 text-center hover:shadow-lg transition-all duration-300 transform group-hover:scale-105">
                            <div class="text-4xl mb-3 transform group-hover:scale-125 transition-transform duration-300">{{ $feature['icon'] }}</div>
                            <h3 class="font-bold text-gray-900 mb-2">{{ $feature['title'] }}</h3>
                            <p class="text-sm text-gray-600">{{ $feature['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Ready to experience the difference?</h2>
            <p class="text-xl text-indigo-100 mb-10">Create your free account and add your first task in under a minute.</p>
            <a href="{{ route('register') }}"
               class="group relative inline-flex items-center justify-center px-8 py-4 font-semibold text-indigo-600 bg-white rounded-xl hover:shadow-2xl transition-all duration-300 overflow-hidden">
                <span class="relative flex items-center gap-2">
                    Get Started Free
                    <span class="group-hover:translate-x-1 transition-transform duration-300">→</span>
                </span>
            </a>
        </div>
    </section>

</x-landing-layout>
