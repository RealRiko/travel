@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
            <h1 class="text-3xl font-extrabold text-center mb-6 text-indigo-600">Create New Destination</h1>

            @if (session('success'))
                <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="space-y-6">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-lg font-semibold text-gray-800">City</label>
                        <input type="text" name="name" id="name" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div>
                        <label for="description" class="block text-lg font-semibold text-gray-800">Description</label>
                        <textarea name="description" id="description" rows="5" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Country Field -->
                    <div>
                        <label for="country" class="block text-lg font-semibold text-gray-800">Country</label>
                        <input type="text" name="country" id="country" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('country') border-red-500 @enderror" value="{{ old('country') }}">
                        @error('country')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                  
                    <!-- Activity Type Field -->
                    <div>
                        <label for="activity_type" class="block text-lg font-semibold text-gray-800">Activity Type</label>
                        <input type="text" name="activity_type" id="activity_type" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('activity_type') border-red-500 @enderror" value="{{ old('activity_type') }}">
                        @error('activity_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Field -->
                    <div>
                        <label for="image" class="block text-lg font-semibold text-gray-800">Image</label>
                        <input type="file" name="image" id="image" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('image') border-red-500 @enderror">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- YouTube Video URL Field -->
                    <div>
                        <label for="youtube_video" class="block text-lg font-semibold text-gray-800">YouTube Video URL (Embed link)</label>
                        <input type="url" name="youtube_video" id="youtube_video" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('youtube_video') border-red-500 @enderror" value="{{ old('youtube_video') }}">
                        @error('youtube_video')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Create Destination
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection