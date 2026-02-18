{{--
|--------------------------------------------------------------------------
| LANDING LAYOUT
|--------------------------------------------------------------------------
|
| This layout is for public marketing pages (About, Pricing, Features, etc.)
| Unlike the guest layout (small centered card for auth forms), this one
| is full-width with a proper navbar and footer.
|
| Usage in a page:   <x-landing-layout>  ...your content...  </x-landing-layout>
|
| Optional slots:
|   - $title  → sets the <title> tag
|
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'TaskMaster') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-white">

    {{-- ── NAVBAR ────────────────────────────────────────────────────── --}}
    @include('layouts.navigation')

    {{-- ── PAGE CONTENT ─────────────────────────────────────────────── --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    {{-- ── FOOTER ───────────────────────────────────────────────────── --}}
    <footer class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 border-t border-slate-700 mt-24 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">

                {{-- Brand --}}
                <div>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400 font-bold text-lg">✅ TaskMaster</span>
                    <p class="text-sm text-gray-400 mt-3 leading-relaxed">The simplest way to manage your tasks and get things done.</p>
                </div>

                {{-- Product --}}
                <div>
                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest">Product</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('features') }}" class="text-sm text-gray-400 hover:text-indigo-400 transition-colors duration-300">Features</a></li>
                        <li><a href="{{ route('pricing') }}" class="text-sm text-gray-400 hover:text-indigo-400 transition-colors duration-300">Pricing</a></li>
                        <li><a href="{{ route('blog') }}" class="text-sm text-gray-400 hover:text-indigo-400 transition-colors duration-300">Blog</a></li>
                    </ul>
                </div>

                {{-- Company --}}
                <div>
                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('about') }}" class="text-sm text-gray-400 hover:text-indigo-400 transition-colors duration-300">About</a></li>
                        <li><a href="{{ route('contact') }}" class="text-sm text-gray-400 hover:text-indigo-400 transition-colors duration-300">Contact</a></li>
                        <li><a href="{{ route('faq') }}" class="text-sm text-gray-400 hover:text-indigo-400 transition-colors duration-300">FAQ</a></li>
                    </ul>
                </div>

                {{-- Social --}}
                <div>
                    <h4 class="text-sm font-bold text-white mb-4 uppercase tracking-widest">Connect</h4>
                    <div class="flex gap-3">
                        @foreach([
                            ['name' => 'Twitter', 'url' => '#', 'icon' => '𝕏'],
                            ['name' => 'GitHub', 'url' => '#', 'icon' => '⚙️'],
                            ['name' => 'YouTube', 'url' => '#', 'icon' => '▶️'],
                        ] as $social)
                            <a href="{{ $social['url'] }}" class="w-10 h-10 rounded-lg bg-slate-700 hover:bg-gradient-to-br hover:from-indigo-600 hover:to-purple-600 flex items-center justify-center transition-all duration-300 text-sm font-semibold">
                                {{ $social['icon'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="border-t border-slate-700 mt-12 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-xs text-gray-500">&copy; {{ date('Y') }} TaskMaster. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="text-xs text-gray-500 hover:text-gray-300 transition-colors duration-300">Privacy Policy</a>
                    <a href="#" class="text-xs text-gray-500 hover:text-gray-300 transition-colors duration-300">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
