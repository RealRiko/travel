<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string|max:100',
           
            'activity_type' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_video' => 'nullable|url',
        ]);

        $destination = new Destination($validated);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinations', 'public');
            $destination->image = $imagePath;
        }

        $destination->save();

        return redirect()->route('destinations.index')->with('success', 'Destination created successfully');
    }

    public function show($id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.show', compact('destination'));
    }

    public function like($id)
    {
        $destination = Destination::findOrFail($id);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to like a destination.');
        }

        $existingLike = $destination->likes()->where('user_id', $user->id)->first();

        if ($existingLike) {
            if ($existingLike->value == 1) {
                $existingLike->delete(); // Remove like if already liked
            } elseif ($existingLike->value == -1) {
                $existingLike->update(['value' => 1]); // Change dislike to like
            }
        } else {
            $destination->likes()->create([
                'user_id' => $user->id,
                'value' => 1,
            ]);
        }

        return redirect()->route('destinations.show', $id)->with('success', 'Destination liked!');
    }

    public function dislike($id)
    {
        $destination = Destination::findOrFail($id);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to dislike a destination.');
        }

        $existingLike = $destination->likes()->where('user_id', $user->id)->first();

        if ($existingLike) {
            if ($existingLike->value == -1) {
                $existingLike->delete(); // Remove dislike if already disliked
            } elseif ($existingLike->value == 1) {
                $existingLike->update(['value' => -1]); // Change like to dislike
            }
        } else {
            $destination->likes()->create([
                'user_id' => $user->id,
                'value' => -1,
            ]);
        }

        return redirect()->route('destinations.show', $id)->with('success', 'Destination disliked!');
    }
}