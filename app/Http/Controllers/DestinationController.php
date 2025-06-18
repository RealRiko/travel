<?php

     namespace App\Http\Controllers;

     use App\Models\Destination;
     use Illuminate\Http\Request;
     use Illuminate\Support\Facades\Auth;
     use Illuminate\Support\Facades\Storage;

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
             $destination->user_id = Auth::id();

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

         public function edit($id)
         {
             $destination = Destination::findOrFail($id);
             if ($destination->user_id !== Auth::id()) {
                 abort(403, 'Unauthorized action.');
             }
             return view('destinations.edit', compact('destination'));
         }

         public function update(Request $request, $id)
         {
             $destination = Destination::findOrFail($id);

             if ($destination->user_id !== Auth::id()) {
                 abort(403, 'Unauthorized action.');
             }

             $validated = $request->validate([
                 'name' => 'required|string|max:255',
                 'description' => 'required|string',
                 'country' => 'required|string|max:100',
                 'activity_type' => 'required|string|max:100',
                 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                 'youtube_video' => 'nullable|url',
             ]);

             $destination->fill($validated);

             if ($request->hasFile('image')) {
                 if ($destination->image) {
                     Storage::disk('public')->delete($destination->image);
                 }
                 $imagePath = $request->file('image')->store('destinations', 'public');
                 $destination->image = $imagePath;
             }

             $destination->save();

             return redirect()->route('destinations.show', $destination->id)->with('success', 'Destination updated successfully');
         }

         public function destroy($id)
         {
             $destination = Destination::findOrFail($id);
             if ($destination->user_id !== Auth::id()) {
                 abort(403, 'Unauthorized action.');
             }
             $destination->delete();
             return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully');
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
                     $existingLike->delete();
                 } elseif ($existingLike->value == -1) {
                     $existingLike->update(['value' => 1]);
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
                     $existingLike->delete();
                 } elseif ($existingLike->value == 1) {
                     $existingLike->update(['value' => -1]);
                 }
             } else {
                 $destination->likes()->create([
                     'user_id' => $user->id,
                     'value' => -1,
                 ]);
             }

             return redirect()->route('destinations.show', $id)->with('success', 'Destination disliked!');
         }

         public function liked()
         {
             $user = Auth::user();

             $liked = $user->likes()
                 ->where('likeable_type', Destination::class)
                 ->where('value', 1)
                 ->with('likeable')
                 ->get();

             $likedDestinations = $liked->pluck('likeable')->filter();

             return view('destinations.liked', compact('likedDestinations'));
         }

         public function disliked()
         {
             $user = Auth::user();

             $dislikedDestinations = $user->likes()
                 ->where('value', -1)
                 ->where('likeable_type', Destination::class)
                 ->with('likeable')
                 ->get()
                 ->map(function ($like) {
                     return $like->likeable;
                 });

             return view('destinations.disliked', ['destinations' => $dislikedDestinations]);
         }

         public function mine()
         {
             $destinations = Auth::user()->destinations()->latest()->get();
             return view('destinations.mine', compact('destinations'));
         }
     }