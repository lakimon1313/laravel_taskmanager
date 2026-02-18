{{--
|--------------------------------------------------------------------------
| FAQ PAGE — Interactive, Well-Organized
|--------------------------------------------------------------------------
--}}
<x-landing-layout>
    <x-slot name="title">FAQ — TaskMaster</x-slot>

    {{-- Hero Section --}}
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-cyan-50 via-white to-blue-50 -z-10"></div>
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block mb-4 px-4 py-2 rounded-full bg-cyan-100 text-cyan-700 text-sm font-semibold">Support</div>
            <h1 class="text-5xl sm:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Frequently Asked <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-600 to-blue-600">Questions</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Find quick answers to common questions about TaskMaster.
            </p>
        </div>
    </section>

    {{-- FAQ Sections --}}
    <section class="py-24">
        <div class="max-w-3xl mx-auto space-y-16">

            {{-- General Section --}}
            <div>
                <div class="flex items-center gap-3 mb-8">
                    <span class="text-3xl">💬</span>
                    <h2 class="text-3xl font-bold text-gray-900">General</h2>
                </div>
                <div class="space-y-4">
                    @foreach([
                        ['q' => 'What is TaskMaster?', 'a' => 'TaskMaster is a simple, beautiful task management app designed for people who want to stay organized without complexity. We focus on core features and strip away everything else.'],
                        ['q' => 'Is TaskMaster free?', 'a' => 'Yes! The Free plan gives you 25 tasks with full access to all core features. Paid plans unlock unlimited tasks and advanced features.'],
                        ['q' => 'Do I need to install anything?', 'a' => 'Nope. TaskMaster runs entirely in your browser. Just sign up and start using it on any device — no installation, no setup, no hassle.'],
                    ] as $item)
                        <div x-data="{ open: false }" class="group">
                            <button @click="open = !open" class="w-full flex items-center justify-between p-5 bg-gradient-to-r from-cyan-50 to-blue-50 hover:from-cyan-100 hover:to-blue-100 rounded-xl border border-cyan-200 group-hover:border-cyan-300 text-left transition-all duration-300">
                                <span class="font-semibold text-gray-900">{{ $item['q'] }}</span>
                                <span class="text-cyan-600 text-2xl transform transition-transform duration-300 group-hover:scale-125" :class="open && 'rotate-45'">+</span>
                            </button>
                            <div x-show="open" x-collapse class="bg-white border border-t-0 border-cyan-200 rounded-b-xl px-5 py-4">
                                <p class="text-gray-600 leading-relaxed">{{ $item['a'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Account Section --}}
            <div>
                <div class="flex items-center gap-3 mb-8">
                    <span class="text-3xl">👤</span>
                    <h2 class="text-3xl font-bold text-gray-900">Account</h2>
                </div>
                <div class="space-y-4">
                    @foreach([
                        ['q' => 'How do I create an account?', 'a' => 'Click "Get Started" on any page, enter your name, email, and password, and you\'re in. Seriously, it takes about 30 seconds.'],
                        ['q' => 'Can I change my email?', 'a' => 'Yes. Go to Profile, update your email, and we\'ll send a verification link. You\'ll need to verify it before the change takes effect.'],
                        ['q' => 'How do I delete my account?', 'a' => 'Go to Profile → Settings and scroll to "Delete Account." This permanently removes all your data. Once deleted, it cannot be recovered.'],
                        ['q' => 'I forgot my password. Help!', 'a' => 'Click "Forgot password?" on the login page and we\'ll email you a reset link. The link expires in 60 minutes for security.'],
                    ] as $item)
                        <div x-data="{ open: false }" class="group">
                            <button @click="open = !open" class="w-full flex items-center justify-between p-5 bg-gradient-to-r from-purple-50 to-pink-50 hover:from-purple-100 hover:to-pink-100 rounded-xl border border-purple-200 group-hover:border-purple-300 text-left transition-all duration-300">
                                <span class="font-semibold text-gray-900">{{ $item['q'] }}</span>
                                <span class="text-purple-600 text-2xl transform transition-transform duration-300 group-hover:scale-125" :class="open && 'rotate-45'">+</span>
                            </button>
                            <div x-show="open" x-collapse class="bg-white border border-t-0 border-purple-200 rounded-b-xl px-5 py-4">
                                <p class="text-gray-600 leading-relaxed">{{ $item['a'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Tasks Section --}}
            <div>
                <div class="flex items-center gap-3 mb-8">
                    <span class="text-3xl">📋</span>
                    <h2 class="text-3xl font-bold text-gray-900">Tasks</h2>
                </div>
                <div class="space-y-4">
                    @foreach([
                        ['q' => 'How many tasks can I have?', 'a' => 'Free plan: 25 tasks. Pro plan: unlimited. Team plan: unlimited. Delete old tasks anytime to make room for new ones.'],
                        ['q' => 'Are my tasks private?', 'a' => 'Completely. Your tasks are 100% private. Even other logged-in users cannot see, edit, or delete your tasks.'],
                        ['q' => 'What task statuses are available?', 'a' => 'Three: Pending (not started), In Progress (actively working), and Completed (done). Switch between them anytime.'],
                        ['q' => 'Can I filter my tasks?', 'a' => 'Yes! Filter by status (pending, in progress, completed) or by due date (today, this week, overdue). You can combine filters too.'],
                    ] as $item)
                        <div x-data="{ open: false }" class="group">
                            <button @click="open = !open" class="w-full flex items-center justify-between p-5 bg-gradient-to-r from-emerald-50 to-teal-50 hover:from-emerald-100 hover:to-teal-100 rounded-xl border border-emerald-200 group-hover:border-emerald-300 text-left transition-all duration-300">
                                <span class="font-semibold text-gray-900">{{ $item['q'] }}</span>
                                <span class="text-emerald-600 text-2xl transform transition-transform duration-300 group-hover:scale-125" :class="open && 'rotate-45'">+</span>
                            </button>
                            <div x-show="open" x-collapse class="bg-white border border-t-0 border-emerald-200 rounded-b-xl px-5 py-4">
                                <p class="text-gray-600 leading-relaxed">{{ $item['a'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Billing Section --}}
            <div>
                <div class="flex items-center gap-3 mb-8">
                    <span class="text-3xl">💳</span>
                    <h2 class="text-3xl font-bold text-gray-900">Billing</h2>
                </div>
                <div class="space-y-4">
                    @foreach([
                        ['q' => 'How does billing work?', 'a' => 'Paid plans are billed monthly. You can cancel anytime and keep using the service until your billing period ends.'],
                        ['q' => 'Can I get a refund?', 'a' => 'Yes! If you\'re not satisfied within 14 days, we\'ll refund your entire payment — no questions, no fuss.'],
                        ['q' => 'Do you offer annual billing?', 'a' => 'Yes! Annual billing saves you 20% compared to monthly. Contact us to switch to an annual plan.'],
                        ['q' => 'Can I pause my subscription?', 'a' => 'Not directly, but you can downgrade to the Free plan and upgrade again later without losing your tasks.'],
                    ] as $item)
                        <div x-data="{ open: false }" class="group">
                            <button @click="open = !open" class="w-full flex items-center justify-between p-5 bg-gradient-to-r from-orange-50 to-amber-50 hover:from-orange-100 hover:to-amber-100 rounded-xl border border-orange-200 group-hover:border-orange-300 text-left transition-all duration-300">
                                <span class="font-semibold text-gray-900">{{ $item['q'] }}</span>
                                <span class="text-orange-600 text-2xl transform transition-transform duration-300 group-hover:scale-125" :class="open && 'rotate-45'">+</span>
                            </button>
                            <div x-show="open" x-collapse class="bg-white border border-t-0 border-orange-200 rounded-b-xl px-5 py-4">
                                <p class="text-gray-600 leading-relaxed">{{ $item['a'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    {{-- Contact CTA --}}
    <section class="py-24 bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-2xl">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Still have questions?</h2>
            <p class="text-xl text-gray-300 mb-10">We're here to help. Reach out and we'll get back to you within 24 hours.</p>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                Contact Us
                <span class="ml-2">→</span>
            </a>
        </div>
    </section>

</x-landing-layout>
