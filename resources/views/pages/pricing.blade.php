{{--
|--------------------------------------------------------------------------
| PRICING PAGE — Clean, Conversion-Focused Design
|--------------------------------------------------------------------------
--}}
<x-landing-layout>
    <x-slot name="title">Pricing — TaskMaster</x-slot>

    {{-- Hero Section --}}
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-white to-teal-50 -z-10"></div>
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block mb-4 px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 text-sm font-semibold">Pricing</div>
            <h1 class="text-5xl sm:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Simple pricing, <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-600">no surprises</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Start free. Upgrade when you need more. Cancel anytime.
            </p>
        </div>
    </section>

    {{-- Pricing Cards --}}
    <section class="py-20">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Free Plan --}}
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-all duration-300 -z-10"></div>
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 h-full flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Free</h3>
                        <p class="text-gray-600 mb-6">Perfect for getting started</p>
                        <div class="mb-8">
                            <span class="text-5xl font-bold text-gray-900">$0</span>
                            <span class="text-gray-600">/month</span>
                        </div>
                        <ul class="space-y-4 mb-8 flex-grow">
                            @foreach(['Up to 25 tasks', 'Due date reminders', 'Basic filters', 'Mobile friendly', 'Email support'] as $feature)
                                <li class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></path></svg>
                                    <span class="text-gray-700">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('register') }}"
                           class="block w-full text-center px-6 py-3 rounded-xl border-2 border-gray-200 text-gray-600 font-semibold hover:border-blue-300 hover:text-blue-600 transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>

                {{-- Pro Plan (Featured) --}}
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl blur-2xl opacity-30 group-hover:opacity-50 transition-all duration-300 -z-10"></div>
                    <div class="relative bg-gradient-to-br from-indigo-50 to-purple-50 border-2 border-indigo-600 rounded-2xl p-8 shadow-2xl hover:shadow-2xl transition-all duration-300 h-full flex flex-col transform group-hover:scale-105">
                        <div class="absolute -top-4 left-1/2 -translate-x-1/2">
                            <span class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-xs font-bold px-4 py-1 rounded-full">
                                🌟 MOST POPULAR
                            </span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2 mt-2">Pro</h3>
                        <p class="text-gray-700 mb-6">For power users</p>
                        <div class="mb-8">
                            <span class="text-5xl font-bold text-gray-900">$9</span>
                            <span class="text-gray-700">/month</span>
                        </div>
                        <ul class="space-y-4 mb-8 flex-grow">
                            @foreach(['Unlimited tasks', 'Priority labels', 'Advanced filters', 'Email notifications', 'CSV export', 'API access', 'Priority support'] as $feature)
                                <li class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-indigo-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></path></svg>
                                    <span class="text-gray-700 font-medium">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('register') }}"
                           class="block w-full text-center px-6 py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            Start Free Trial
                        </a>
                    </div>
                </div>

                {{-- Team Plan --}}
                <div class="group relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-400 to-pink-400 rounded-2xl blur-xl opacity-0 group-hover:opacity-20 transition-all duration-300 -z-10"></div>
                    <div class="bg-white border border-gray-200 rounded-2xl p-8 hover:shadow-xl transition-all duration-300 h-full flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Team</h3>
                        <p class="text-gray-600 mb-6">For small teams</p>
                        <div class="mb-8">
                            <span class="text-5xl font-bold text-gray-900">$24</span>
                            <span class="text-gray-600">/month</span>
                        </div>
                        <ul class="space-y-4 mb-8 flex-grow">
                            @foreach(['Everything in Pro', 'Up to 10 members', 'Shared boards', 'Team analytics', 'Admin controls', 'Custom roles'] as $feature)
                                <li class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></path></svg>
                                    <span class="text-gray-700">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('register') }}"
                           class="block w-full text-center px-6 py-3 rounded-xl border-2 border-gray-200 text-gray-600 font-semibold hover:border-orange-300 hover:text-orange-600 transition-all duration-300">
                            Start Free Trial
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Comparison Table --}}
    <section class="py-24 bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-4xl font-bold text-gray-900 text-center mb-16">Detailed Comparison</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-gray-300">
                            <th class="text-left px-6 py-4 font-bold text-gray-900">Feature</th>
                            <th class="text-center px-6 py-4 font-bold text-gray-900">Free</th>
                            <th class="text-center px-6 py-4 font-bold text-indigo-600">Pro</th>
                            <th class="text-center px-6 py-4 font-bold text-gray-900">Team</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach([
                            ['feature' => 'Task Limit', 'free' => '25', 'pro' => 'Unlimited', 'team' => 'Unlimited'],
                            ['feature' => 'Filters', 'free' => 'Basic', 'pro' => 'Advanced', 'team' => 'Advanced'],
                            ['feature' => 'Team Members', 'free' => '1', 'pro' => '1', 'team' => 'Up to 10'],
                            ['feature' => 'API Access', 'free' => false, 'pro' => true, 'team' => true],
                            ['feature' => 'CSV Export', 'free' => false, 'pro' => true, 'team' => true],
                            ['feature' => 'Analytics', 'free' => false, 'pro' => false, 'team' => true],
                            ['feature' => 'Support', 'free' => 'Email', 'pro' => 'Priority', 'team' => 'Priority 24/7'],
                        ] as $row)
                            <tr class="hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-6 py-4 font-semibold text-gray-900">{{ $row['feature'] }}</td>
                                <td class="text-center px-6 py-4 text-gray-700">
                                    @if(is_bool($row['free']))
                                        <span class="{{ $row['free'] ? 'text-emerald-600' : 'text-gray-400' }}">{{ $row['free'] ? '✓' : '—' }}</span>
                                    @else
                                        {{ $row['free'] }}
                                    @endif
                                </td>
                                <td class="text-center px-6 py-4 text-gray-700 font-semibold">
                                    @if(is_bool($row['pro']))
                                        <span class="{{ $row['pro'] ? 'text-emerald-600' : 'text-gray-400' }}">{{ $row['pro'] ? '✓' : '—' }}</span>
                                    @else
                                        {{ $row['pro'] }}
                                    @endif
                                </td>
                                <td class="text-center px-6 py-4 text-gray-700">
                                    @if(is_bool($row['team']))
                                        <span class="{{ $row['team'] ? 'text-emerald-600' : 'text-gray-400' }}">{{ $row['team'] ? '✓' : '—' }}</span>
                                    @else
                                        {{ $row['team'] }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-24">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-4xl font-bold text-gray-900 text-center mb-16">Pricing FAQ</h2>
            <div class="space-y-6">
                @foreach([
                    ['q' => 'Can I switch plans later?', 'a' => 'Absolutely! Upgrade or downgrade at any time. Changes take effect on your next billing cycle.'],
                    ['q' => 'Is there a free trial for paid plans?', 'a' => 'Yes, all paid plans include a 14-day free trial with full access. No credit card required.'],
                    ['q' => 'What happens when I hit the task limit?', 'a' => 'On Free plan, you can still view and complete existing tasks, but can\'t create new ones until you upgrade or delete old tasks.'],
                    ['q' => 'Do you offer annual billing?', 'a' => 'Yes! Annual plans save you 20% compared to monthly. Contact us for details.'],
                    ['q' => 'Do you offer refunds?', 'a' => 'If you\'re not satisfied within 14 days, we\'ll give you a full refund — no questions asked.'],
                ] as $item)
                    <div x-data="{ open: false }" class="group">
                        <button @click="open = !open" class="w-full flex items-center justify-between px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 hover:from-gray-100 hover:to-gray-200 rounded-xl border border-gray-200 text-left transition-all duration-300">
                            <span class="font-semibold text-gray-900">{{ $item['q'] }}</span>
                            <span class="text-indigo-600 text-2xl transform transition-transform duration-300" :class="open && 'rotate-45'">+</span>
                        </button>
                        <div x-show="open" x-collapse class="bg-white border border-t-0 border-gray-200 rounded-b-xl px-6 py-4">
                            <p class="text-gray-600 leading-relaxed">{{ $item['a'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section class="py-24 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Start your free trial today</h2>
            <p class="text-xl text-indigo-100 mb-10">No credit card required. Upgrade whenever you're ready.</p>
            <a href="{{ route('register') }}"
               class="inline-flex items-center justify-center px-8 py-4 bg-white text-indigo-600 font-semibold rounded-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                Create Free Account
                <span class="ml-2">→</span>
            </a>
        </div>
    </section>

</x-landing-layout>
