{{--
|--------------------------------------------------------------------------
| CONTACT PAGE — Professional, Welcoming Design
|--------------------------------------------------------------------------
--}}
<x-landing-layout>
    <x-slot name="title">Contact — TaskMaster</x-slot>

    {{-- Hero Section --}}
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-violet-50 via-white to-purple-50 -z-10"></div>
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block mb-4 px-4 py-2 rounded-full bg-violet-100 text-violet-700 text-sm font-semibold">Get in Touch</div>
            <h1 class="text-5xl sm:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Let's <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-purple-600">talk</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Have questions, feedback, or just want to say hi? We're always happy to hear from you.
            </p>
        </div>
    </section>

    {{-- Contact Content --}}
    <section class="py-24">
        <div class="max-w-6xl mx-auto grid lg:grid-cols-3 gap-12">

            {{-- Contact Info Cards --}}
            <div class="space-y-8">
                {{-- Email --}}
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-2xl blur-lg opacity-0 group-hover:opacity-20 transition-all duration-300 -z-10"></div>
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl transition-all duration-300">
                        <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-xl mb-4">
                            <span class="text-2xl">📧</span>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Email</h3>
                        <p class="text-gray-600 mb-3">hello@taskmaster.app</p>
                        <p class="text-sm text-gray-500">We'll reply within 24 hours</p>
                    </div>
                </div>

                {{-- Location --}}
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-400 to-teal-400 rounded-2xl blur-lg opacity-0 group-hover:opacity-20 transition-all duration-300 -z-10"></div>
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl transition-all duration-300">
                        <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-xl mb-4">
                            <span class="text-2xl">📍</span>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Location</h3>
                        <p class="text-gray-600 mb-1">Remote-first company</p>
                        <p class="text-sm text-gray-500">Based in Kyiv, Ukraine</p>
                    </div>
                </div>

                {{-- Social --}}
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-pink-400 rounded-2xl blur-lg opacity-0 group-hover:opacity-20 transition-all duration-300 -z-10"></div>
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl transition-all duration-300">
                        <div class="inline-flex items-center justify-center w-14 h-14 bg-gradient-to-br from-purple-100 to-pink-100 rounded-xl mb-4">
                            <span class="text-2xl">💬</span>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-4">Follow Us</h3>
                        <div class="flex gap-3">
                            @foreach([
                                ['name' => 'Twitter', 'url' => '#', 'icon' => '𝕏'],
                                ['name' => 'GitHub', 'url' => '#', 'icon' => '⚙️'],
                                ['name' => 'LinkedIn', 'url' => '#', 'icon' => '💼'],
                            ] as $social)
                                <a href="{{ $social['url'] }}" class="flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 hover:bg-gradient-to-br hover:from-purple-500 hover:to-pink-500 hover:text-white transition-all duration-300 font-semibold text-gray-700">
                                    {{ $social['icon'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-2">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl blur-2xl opacity-20 -z-10"></div>
                    <form class="bg-white border border-gray-200 rounded-2xl p-10 shadow-xl">
                        <h2 class="text-2xl font-bold text-gray-900 mb-8">Send us a message</h2>

                        {{-- Name & Email Row --}}
                        <div class="grid sm:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">Your Name</label>
                                <input type="text" placeholder="John Doe"
                                       class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-300">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-2">Email Address</label>
                                <input type="email" placeholder="you@example.com"
                                       class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-300">
                            </div>
                        </div>

                        {{-- Subject --}}
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Subject</label>
                            <select class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-300 cursor-pointer">
                                <option selected>General inquiry</option>
                                <option>Bug report</option>
                                <option>Feature request</option>
                                <option>Billing question</option>
                                <option>Partnership</option>
                                <option>Other</option>
                            </select>
                        </div>

                        {{-- Message --}}
                        <div class="mb-8">
                            <label class="block text-sm font-semibold text-gray-900 mb-2">Message</label>
                            <textarea rows="5" placeholder="Tell us what's on your mind..."
                                      class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-300 resize-none"></textarea>
                        </div>

                        {{-- Submit Button --}}
                        <button type="button"
                                class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105 active:scale-95">
                            Send Message
                        </button>

                        <p class="text-xs text-gray-500 text-center mt-4">
                            💡 This is a demo form. In a production app, this would connect to your backend.
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </section>

    {{-- Response Time Highlight --}}
    <section class="py-16 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-br from-indigo-600 to-purple-600 text-white text-2xl mb-4">
                ⚡
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Quick Response Time</h3>
            <p class="text-gray-600">We typically respond to inquiries within 24 hours. For urgent matters, email us directly at hello@taskmaster.app</p>
        </div>
    </section>

    {{-- Additional Help Links --}}
    <section class="py-24">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Other Ways We Can Help</h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['icon' => '📚', 'title' => 'Documentation', 'desc' => 'Browse our full knowledge base and guides.', 'link' => '#'],
                    ['icon' => '❓', 'title' => 'FAQ', 'desc' => 'Find answers to frequently asked questions.', 'link' => route('faq')],
                    ['icon' => '💡', 'title' => 'Feature Requests', 'desc' => 'Suggest features and vote on ideas.', 'link' => '#'],
                ] as $item)
                    <a href="{{ $item['link'] }}" class="group relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-400 to-purple-400 rounded-xl blur-lg opacity-0 group-hover:opacity-20 transition-all duration-300 -z-10"></div>
                        <div class="bg-white border border-gray-200 rounded-xl p-8 text-center hover:shadow-lg transition-all duration-300">
                            <div class="text-4xl mb-3">{{ $item['icon'] }}</div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">{{ $item['title'] }}</h3>
                            <p class="text-gray-600 text-sm">{{ $item['desc'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

</x-landing-layout>
