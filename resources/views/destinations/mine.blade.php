@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-3xl font-bold mb-6">My Destinations</h1>

    @if($destinations->isEmpty())
        <p class="text-gray-600">You haven’t added any destinations yet.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($destinations as $destination)
                <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                    <a href="{{ route('destinations.show', $destination->id) }}">
                        <img src="{{ asset($destination->image) }}"
                             alt="{{ $destination->name }}"
                             class="w-full h-48 object-cover rounded mb-4">
                        <h2 class="text-lg font-semibold">{{ $destination->name }}</h2>
                        <p class="text-sm mb-2">{{ Str::limit($destination->description, 100) }}</p>
                        <p class="text-xs text-gray-500 mb-4"><strong>Location:</strong> {{ $destination->country }}</p>
                    </a>

                    <div class="flex justify-between">
                        <a  href="{{ route('destinations.edit', $destination->id) }}"
                            class="inline-block px-3 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">
                            Edit
                        </a>

                        <form action="{{ route('destinations.destroy', $destination->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this destination?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
