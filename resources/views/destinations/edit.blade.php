@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Edit Destination</h1>

        <!-- Edit Form -->
        <form action="{{ route('destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6 mb-6">
            @csrf
            @method('PATCH')

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $destination->name) }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" required
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $destination->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Country -->
            <div class="mb-4">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" name="country" id="country" value="{{ old('country', $destination->country) }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('country')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Activity Type -->
            <div class="mb-4">
                <label for="activity_type" class="block text-sm font-medium text-gray-700">Activity Type</label>
                <input type="text" name="activity_type" id="activity_type" value="{{ old('activity_type', $destination->activity_type) }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('activity_type')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @if($destination->image)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">Current Image:</p>
                        <img src="{{ asset('storage/' . $destination->image) }}" alt="Current Image" class="mt-2 max-w-xs">
                    </div>
                @endif
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- YouTube Video -->
            <div class="mb-4">
                <label for="youtube_video" class="block text-sm font-medium text-gray-700">YouTube Video URL</label>
                <input type="url" name="youtube_video" id="youtube_video" value="{{ old('youtube_video', $destination->youtube_video) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @if($destination->youtube_video)
                    <div class="mt-2">
                        <p class="text-sm text-gray-600">Current Video:</p>
                        <a href="{{ $destination->youtube_video }}" target="_blank" class="text-blue-500 hover:underline">{{ $destination->youtube_video }}</a>
                    </div>
                @endif
                @error('youtube_video')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    Update Destination
                </button>
            </div>
        </form>

        <!-- Delete Form -->
        <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this destination?')" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                Delete Destination
            </button>
        </form>
    </div>
@endsection