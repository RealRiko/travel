@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold mb-6">Explore Destinations</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($destinations as $destination)
                <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                    <a href="{{ route('destinations.show', $destination->id) }}">
                        <img src="{{ asset($destination->image) }}" alt="{{ $destination->name }}" class="w-full h-48 object-cover rounded mb-4">
                        <h2 class="text-lg font-semibold">{{ $destination->name }}</h2>
                        <p class="text-sm">{{ $destination->description }}</p>
                        <p><strong>Location:</strong>{{ $destination->country }}</p>
                        <p><strong>Activity Type:</strong> {{ $destination->activity_type }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
