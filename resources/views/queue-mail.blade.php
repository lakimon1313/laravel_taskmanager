<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Queue Mail</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4">
            @if (session('ok'))
                <div class="mb-4 rounded-lg bg-green-50 px-4 py-3 text-green-800">
                    Queued.
                </div>
            @endif

            <form method="POST" action="{{ url('/queue-mail') }}">
                @csrf
                <x-primary-button>
                    Queue test email
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>