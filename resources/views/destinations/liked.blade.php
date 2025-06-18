@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold mb-6">Your Liked Destinations</h1>

        @if($likedDestinations->isEmpty())
            <p class="text-center text-gray-500">You haven't liked any destinations yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($likedDestinations as $destination)
                    <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                        <a href="{{ route('destinations.show', $destination->id) }}">
<img src="{{ asset($destination->image) }}" alt="{{ $destination->name }}" class="w-full h-48 object-cover rounded mb-4">
                            <h2 class="text-lg font-semibold">{{ $destination->name }}</h2>
                            <p class="text-sm mb-1">{{ Str::limit($destination->description, 100) }}</p>
                            <p><strong>Location:</strong> {{ $destination->country }}</p>
                            <p><strong>Activity Type:</strong> {{ $destination->activity_type }}</p>
                            <p class="text-sm text-green-600 mt-2">❤️ Liked</p>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
