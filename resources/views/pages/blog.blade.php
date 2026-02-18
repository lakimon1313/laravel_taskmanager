{{--
|--------------------------------------------------------------------------
| BLOG PAGE — Modern, Content-Focused Design
|--------------------------------------------------------------------------
--}}
<x-landing-layout>
    <x-slot name="title">Blog — TaskMaster</x-slot>

    {{-- Hero Section --}}
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-rose-50 via-white to-orange-50 -z-10"></div>
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block mb-4 px-4 py-2 rounded-full bg-rose-100 text-rose-700 text-sm font-semibold">Blog & Updates</div>
            <h1 class="text-5xl sm:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Tips, updates, and <span class="text-transparent bg-clip-text bg-gradient-to-r from-rose-600 to-orange-600">stories</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Learn productivity tips, hear about new features, and read stories from our community.
            </p>
        </div>
    </section>

    {{-- Featured Post --}}
    <section class="py-12">
        <div class="max-w-5xl mx-auto">
            <a href="#" class="group block bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl border border-indigo-200 overflow-hidden hover:shadow-2xl transition-all duration-300 hover:scale-102">
                <div class="grid md:grid-cols-5 gap-0">
                    <div class="md:col-span-2 bg-gradient-to-br from-indigo-400 to-purple-400 flex items-center justify-center p-8 md:p-12 group-hover:scale-110 transition-transform duration-300">
                        <span class="text-7xl md:text-8xl">📝</span>
                    </div>
                    <div class="md:col-span-3 p-8 md:p-10 flex flex-col justify-center">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-xs font-bold px-3 py-1 rounded-full">✨ FEATURED</span>
                            <span class="text-xs text-gray-500 font-medium">Feb 15, 2026 · 5 min read</span>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors duration-300">
                            How We Built TaskMaster in a Weekend
                        </h2>
                        <p class="text-gray-600 leading-relaxed">
                            From frustrated developers to 1,200+ users. Here's the story of how TaskMaster came to life in just 48 hours, and the lessons we learned along the way.
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </section>

    {{-- Article Grid --}}
    <section class="py-20">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-12">Latest Articles</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    [
                        'emoji' => '🎯',
                        'category' => 'Productivity',
                        'color' => 'from-green-500 to-emerald-500',
                        'bg' => 'from-green-50 to-emerald-50',
                        'date' => 'Feb 12, 2026',
                        'time' => '3 min',
                        'title' => '5 Simple Habits to Get More Done',
                        'excerpt' => 'Small daily changes that lead to dramatic productivity boosts.',
                    ],
                    [
                        'emoji' => '🚀',
                        'category' => 'Product',
                        'color' => 'from-purple-500 to-indigo-500',
                        'bg' => 'from-purple-50 to-indigo-50',
                        'date' => 'Feb 8, 2026',
                        'time' => '2 min',
                        'title' => 'New: Advanced Filters & CSV Export',
                        'excerpt' => 'Filter smarter and export your data with our latest update.',
                    ],
                    [
                        'emoji' => '💡',
                        'category' => 'Tips',
                        'color' => 'from-yellow-500 to-amber-500',
                        'bg' => 'from-yellow-50 to-amber-50',
                        'date' => 'Feb 3, 2026',
                        'time' => '4 min',
                        'title' => 'The Art of Writing Good Task Titles',
                        'excerpt' => 'Clear task titles save time and reduce confusion later.',
                    ],
                    [
                        'emoji' => '📊',
                        'category' => 'Insights',
                        'color' => 'from-blue-500 to-cyan-500',
                        'bg' => 'from-blue-50 to-cyan-50',
                        'date' => 'Jan 28, 2026',
                        'time' => '6 min',
                        'title' => 'Why Most To-Do Lists Fail',
                        'excerpt' => 'Research shows 41% of tasks never get done. Here\'s why.',
                    ],
                    [
                        'emoji' => '🔒',
                        'category' => 'Security',
                        'color' => 'from-red-500 to-pink-500',
                        'bg' => 'from-red-50 to-pink-50',
                        'date' => 'Jan 20, 2026',
                        'time' => '3 min',
                        'title' => 'How We Keep Your Data Private',
                        'excerpt' => 'Behind the scenes with our authorization & encryption.',
                    ],
                    [
                        'emoji' => '🧑‍🤝‍🧑',
                        'category' => 'Community',
                        'color' => 'from-orange-500 to-red-500',
                        'bg' => 'from-orange-50 to-red-50',
                        'date' => 'Jan 14, 2026',
                        'time' => '4 min',
                        'title' => 'Meet Our First 1,000 Users',
                        'excerpt' => 'Stories from freelancers, startups, and everything in between.',
                    ],
                ] as $post)
                    <a href="#" class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-br {{ $post['color'] }} rounded-2xl blur-lg opacity-0 group-hover:opacity-30 transition-all duration-300 -z-10"></div>
                        <div class="h-full bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col">
                            <div class="h-40 bg-gradient-to-br {{ $post['bg'] }} flex items-center justify-center group-hover:scale-110 transition-transform duration-300 overflow-hidden">
                                <span class="text-6xl">{{ $post['emoji'] }}</span>
                            </div>
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold text-white bg-gradient-to-r {{ $post['color'] }}">
                                        {{ $post['category'] }}
                                    </span>
                                </div>
                                <h3 class="font-bold text-lg text-gray-900 mb-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r {{ $post['color'] }} transition-all duration-300">
                                    {{ $post['title'] }}
                                </h3>
                                <p class="text-sm text-gray-600 mb-4 flex-grow leading-relaxed">{{ $post['excerpt'] }}</p>
                                <p class="text-xs text-gray-400 font-medium">{{ $post['date'] }} · {{ $post['time'] }} read</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Newsletter Signup --}}
    <section class="py-24 bg-gradient-to-br from-slate-900 to-slate-800 text-white">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Stay in the loop</h2>
            <p class="text-xl text-gray-300 mb-10">Get the latest articles and product updates straight to your inbox.</p>
            <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                <input type="email" placeholder="you@example.com" required
                       class="flex-1 bg-white text-gray-900 border-0 rounded-xl px-4 py-3 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-300">
                <button type="button"
                        class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-3 rounded-xl text-sm font-semibold hover:shadow-lg transition-all duration-300 whitespace-nowrap">
                    Subscribe
                </button>
            </form>
            <p class="text-xs text-gray-400 mt-4">✓ No spam, ever. Unsubscribe anytime.</p>
        </div>
    </section>

</x-landing-layout>
