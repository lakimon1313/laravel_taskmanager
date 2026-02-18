{{--
|--------------------------------------------------------------------------
| ABOUT PAGE — Premium, Animated Design
|--------------------------------------------------------------------------
--}}
<x-landing-layout>
    <x-slot name="title">About — TaskMaster</x-slot>

    {{-- Hero Section with Gradient --}}
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50 via-white to-purple-50 -z-10"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 -z-10 animate-blob"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 -z-10 animate-blob animation-delay-2000"></div>

        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block mb-4 px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 text-sm font-semibold">About TaskMaster</div>
            <h1 class="text-5xl sm:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                We believe <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">productivity</span> should be simple
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                TaskMaster was born from frustration with bloated tools. We built something simpler.
            </p>
        </div>
    </section>

    {{-- Story Section --}}
    <section class="-mx-4 sm:-mx-6 lg:-mx-8 px-4 sm:px-6 lg:px-8 py-20 bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="max-w-4xl mx-auto grid md:grid-cols-2 gap-16 items-center">
            <div class="order-2 md:order-1">
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Our Story</h2>
                <p class="text-gray-700 text-lg mb-4 leading-relaxed">
                    In 2026, two developers got tired of juggling between bloated project tools just to track daily tasks. One weekend. One laptop. Pure frustration turned into code.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed">
                    What started as a weekend project exploded. Today, thousands of people use TaskMaster—from freelancers grinding through their lists to small teams coordinating chaos. All because we refused to add "just one more feature."
                </p>
            </div>
            <div class="order-1 md:order-2">
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl blur-xl opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                    <div class="relative bg-white rounded-2xl border border-gray-200 p-12 text-center shadow-xl">
                        <div class="text-6xl mb-6 animate-bounce" style="animation-delay: 0s">🚀</div>
                        <p class="text-sm text-gray-500 font-semibold uppercase tracking-widest mb-2">Founded</p>
                        <p class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-4">2026</p>
                        <div class="w-12 h-1 bg-gradient-to-r from-indigo-600 to-purple-600 mx-auto mb-4 rounded-full"></div>
                        <p class="text-2xl font-bold text-gray-900">1,200+</p>
                        <p class="text-gray-600 font-medium">Happy Users</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Values Section --}}
    <section class="py-24">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">What We Stand For</h2>
                <p class="text-xl text-gray-600">The principles that guide every decision</p>
            </div>

            <div class="grid sm:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => '✨', 'title' => 'Simplicity', 'color' => 'from-blue-600 to-cyan-600', 'desc' => 'No bloat, no confusion. One job, done right.'],
                    ['icon' => '🔒', 'title' => 'Privacy', 'color' => 'from-emerald-600 to-teal-600', 'desc' => 'Your data is sacred. Never shared, never sold.'],
                    ['icon' => '⚡', 'title' => 'Speed', 'color' => 'from-orange-600 to-red-600', 'desc' => 'Instant feedback. No spinners. No waiting.'],
                ] as $value)
                    <div class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-r {{ $value['color'] }} rounded-2xl blur-lg opacity-20 group-hover:opacity-40 transition-all duration-300 -z-10"></div>
                        <div class="bg-white rounded-2xl border border-gray-200 p-8 text-center hover:shadow-xl transition-all duration-300 transform group-hover:scale-105">
                            <div class="text-5xl mb-4 transform group-hover:scale-125 transition-transform duration-300">{{ $value['icon'] }}</div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">{{ $value['title'] }}</h3>
                            <p class="text-gray-600">{{ $value['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="-mx-4 sm:-mx-6 lg:-mx-8 px-4 sm:px-6 lg:px-8 py-24 bg-gradient-to-br from-slate-900 to-slate-800 text-white">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Meet the Team</h2>
                <p class="text-xl text-gray-300">The brilliant people behind TaskMaster</p>
            </div>

            <div class="grid sm:grid-cols-3 gap-8">
                @foreach([
                    ['emoji' => '👨‍💻', 'name' => 'Alex Johnson', 'role' => 'Founder & Backend', 'color' => 'bg-indigo-500'],
                    ['emoji' => '👩‍🎨', 'name' => 'Sarah Chen', 'role' => 'Design & Frontend', 'color' => 'bg-purple-500'],
                    ['emoji' => '🧑‍🔧', 'name' => 'Mike Davis', 'role' => 'DevOps & Infra', 'color' => 'bg-pink-500'],
                ] as $person)
                    <div class="group relative overflow-hidden rounded-2xl">
                        <div class="absolute inset-0 {{ $person['color'] }} opacity-0 group-hover:opacity-100 transition-opacity duration-300 -z-10"></div>
                        <div class="bg-slate-800 rounded-2xl border border-slate-700 p-8 text-center hover:bg-slate-700 transition-all duration-300 transform group-hover:scale-105">
                            <div class="text-6xl mb-4 transform group-hover:scale-125 transition-transform duration-300">{{ $person['emoji'] }}</div>
                            <h3 class="font-bold text-lg text-white">{{ $person['name'] }}</h3>
                            <p class="text-gray-400 font-medium mt-2">{{ $person['role'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-24 bg-gradient-to-br from-indigo-50 to-purple-50">
        <div class="max-w-5xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8">
                @foreach([
                    ['stat' => '2026', 'label' => 'Founded'],
                    ['stat' => '1.2K+', 'label' => 'Active Users'],
                    ['stat' => '3', 'label' => 'Team Members'],
                    ['stat' => '∞', 'label' => 'Passion'],
                ] as $item)
                    <div class="text-center group cursor-pointer">
                        <div class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-2 group-hover:scale-110 transition-transform duration-300">
                            {{ $item['stat'] }}
                        </div>
                        <p class="text-gray-600 font-semibold">{{ $item['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Ready to get organized?</h2>
            <p class="text-xl text-gray-600 mb-10">Join thousands of people who simplified their workflow.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}"
                   class="group relative inline-flex items-center justify-center px-8 py-4 font-semibold text-white transition-all duration-300 rounded-xl overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 transition-all duration-300 group-hover:scale-110"></div>
                    <span class="relative flex items-center gap-2">
                        Get Started Free
                        <span class="group-hover:translate-x-1 transition-transform duration-300">→</span>
                    </span>
                </a>
                <a href="{{ route('features') }}"
                   class="inline-flex items-center justify-center px-8 py-4 font-semibold text-indigo-600 border-2 border-indigo-600 rounded-xl hover:bg-indigo-50 transition-colors duration-300">
                    Learn More
                </a>
            </div>
        </div>
    </section>

</x-landing-layout>

<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}
</style>
