<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6 space-y-6 bg-white dark:bg-gray-900 rounded-lg shadow">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ route('destinations.index') }}" class="block p-6 bg-blue-100 rounded-lg shadow hover:bg-blue-200 transition">
                <h3 class="text-xl font-bold">All Destinations</h3>
                <p class="mt-2 text-gray-700">Browse all travel destinations</p>
            </a>

            <a href="{{ route('destinations.liked') }}" class="block p-6 bg-green-100 rounded-lg shadow hover:bg-green-200 transition">
                <h3 class="text-xl font-bold">Liked</h3>
                <p class="mt-2 text-gray-700">See destinations you liked</p>
            </a>

            <a href="{{ route('destinations.disliked') }}" class="block p-6 bg-red-100 rounded-lg shadow hover:bg-red-200 transition">
                <h3 class="text-xl font-bold">Disliked</h3>
                <p class="mt-2 text-gray-700">Review your dislikes</p>
            </a>
        </div>
    </div>
</x-app-layout>
