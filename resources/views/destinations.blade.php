<!-- resources/views/destinations/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Explore Destinations</h1>
        
        @if($destinations->isEmpty())
            <p>No destinations found.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($destinations as $destination)
                    <div class="bg-white p-4 rounded shadow">
                        <img src="{{ $destination->image }}" alt="{{ $destination->name }}" class="w-full h-32 object-cover rounded">
                        <h2 class="mt-2 text-lg font-semibold">{{ $destination->name }}</h2>
                        <p>{{ $destination->description }}</p>
                        <p><strong>Location:</strong> {{ $destination->city }}, {{ $destination->country }}</p>
                        <p><strong>Activity Type:</strong> {{ $destination->activity_type }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
