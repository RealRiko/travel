@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
            <h1 class="text-3xl font-extrabold text-center mb-4 text-indigo-600">{{ $destination->name }}</h1>
            
            <img src="{{ asset($destination->image) }}" alt="{{ $destination->name }}" class="w-full max-w-2xl h-auto object-cover rounded-lg mb-6 shadow-md mx-auto">

            <div class="space-y-4">
                <p class="text-lg text-gray-700">{{ $destination->description }}</p>
                <p><strong class="text-xl text-gray-800">Location:</strong>{{ $destination->country }}</p>
                <p><strong class="text-xl text-gray-800">Activity Type:</strong> {{ $destination->activity_type }}</p>
            </div>

            <!-- Like/Dislike Section -->
            <div class="mt-6 flex items-center space-x-4">
                <div>
                    <span class="text-lg font-semibold text-gray-800">Likes: {{ $destination->likes_count }}</span>
                </div>
                <div>
                    <span class="text-lg font-semibold text-gray-800">Dislikes: {{ $destination->dislikes_count }}</span>
                </div>
            </div>

            @auth
                <div class="mt-4 flex space-x-4">
                    <form action="{{ route('destinations.like', $destination->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 {{ $destination->userHasLiked(auth()->id()) ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $destination->userHasLiked(auth()->id()) ? 'disabled' : '' }}>
                            Like
                        </button>
                    </form>
                    <form action="{{ route('destinations.dislike', $destination->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 {{ $destination->userHasDisliked(auth()->id()) ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $destination->userHasDisliked(auth()->id()) ? 'disabled' : '' }}>
                            Dislike
                        </button>
                    </form>
                </div>
            @else
                <div class="mt-4 text-gray-600">
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Log in</a> to like or dislike this destination.
                </div>
            @endauth

            @if(session('success'))
                <div class="mt-4 alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mt-4 alert alert-danger bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    {{ session('error') }}
                </div>
            @endif

            @if($destination->youtube_video)
                <div class="mt-8">
                    <h3 class="text-2xl font-semibold mb-4 text-indigo-600">Watch a Video about {{ $destination->name }}</h3>
                    <div class="relative" style="padding-top: 56.25%">
                        <iframe class="absolute top-0 left-0 w-full h-full"
                                src="{{ $destination->youtube_video }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                onerror="this.parentElement.innerHTML='<p class=\"text-red-600\">Sorry, this video cannot be embedded. It may be private or have embedding disabled.</p>';">
                        </iframe>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection